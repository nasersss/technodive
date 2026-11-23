#!/usr/bin/env bash
# Copy the PRODUCTION database (and uploaded images) into STAGING, then replace
# every user password in the staging copy. Run ON THE SERVER over SSH, when both
# sites are on the same Hostinger account:
#
#   bash scripts/copy-production-db.sh <production_path> <staging_path> [staging_password]
#
#   bash ~/domains/technodive.goupdev.net/app/scripts/copy-production-db.sh \
#        ~/domains/technodive-ye.com/public_html \
#        ~/domains/technodive.goupdev.net/app \
#        'Staging@2026'
#
# Database credentials are read from each site's .env file. Production is only
# READ (mysqldump); nothing on production is changed.
# Without a staging_password every user gets a random password, printed at the end.

set -euo pipefail

PROD_PATH="${1:?usage: copy-production-db.sh <production_path> <staging_path> [staging_password]}"
STAGING_PATH="${2:?usage: copy-production-db.sh <production_path> <staging_path> [staging_password]}"
STAGING_PASSWORD="${3:-}"
PHP="${PHP_BIN:-php}"
BACKUP_DIR="${BACKUP_DIR:-$HOME/db-backups}"

log() { printf '\n\033[1;36m==> %s\033[0m\n' "$*"; }
die() { printf '\033[1;31mERROR: %s\033[0m\n' "$*" >&2; exit 1; }

# Read KEY from a .env file (handles quotes and Windows line endings).
env_get() {
    local file="$1" key="$2" value
    value=$(grep -E "^${key}=" "$file" | tail -n1 | cut -d= -f2- | tr -d '\r') || true
    value="${value%\"}"; value="${value#\"}"; value="${value%\'}"; value="${value#\'}"
    printf '%s' "$value"
}

# Write a private MySQL client config so passwords never appear in `ps` output.
client_cnf() {
    local env_file="$1" cnf
    cnf=$(mktemp); chmod 600 "$cnf"
    {
        echo "[client]"
        echo "host=$(env_get "$env_file" DB_HOST)"
        echo "port=$(env_get "$env_file" DB_PORT)"
        echo "user=$(env_get "$env_file" DB_USERNAME)"
        echo "password=\"$(env_get "$env_file" DB_PASSWORD)\""
        echo "default-character-set=utf8mb4"
    } > "$cnf"
    sed -i '/^port=$/d' "$cnf"
    printf '%s' "$cnf"
}

PROD_ENV="$PROD_PATH/.env"
STAGING_ENV="$STAGING_PATH/.env"
[ -f "$PROD_ENV" ] || die "not found: $PROD_ENV"
[ -f "$STAGING_ENV" ] || die "not found: $STAGING_ENV"

PROD_DB=$(env_get "$PROD_ENV" DB_DATABASE)
STAGING_DB=$(env_get "$STAGING_ENV" DB_DATABASE)
STAGING_APP_ENV=$(env_get "$STAGING_ENV" APP_ENV)

# ---- safety checks ----
[ -n "$PROD_DB" ] && [ -n "$STAGING_DB" ] || die "DB_DATABASE is empty in one of the .env files"
[ "$PROD_DB" != "$STAGING_DB" ] || die "staging and production use the same database ($PROD_DB)"
[ "$STAGING_APP_ENV" != "production" ] || die "staging .env has APP_ENV=production; set APP_ENV=staging first"
[ "$(cd "$PROD_PATH" && pwd -P)" != "$(cd "$STAGING_PATH" && pwd -P)" ] || die "the two paths are the same folder"

PROD_CNF=$(client_cnf "$PROD_ENV")
STAGING_CNF=$(client_cnf "$STAGING_ENV")
trap 'rm -f "$PROD_CNF" "$STAGING_CNF"' EXIT

echo "Production DB : $PROD_DB   (read only)"
echo "Staging DB    : $STAGING_DB   (will be REPLACED)"
read -r -p "Type the staging database name to continue: " answer
[ "$answer" = "$STAGING_DB" ] || die "cancelled"

mkdir -p "$BACKUP_DIR"; chmod 700 "$BACKUP_DIR"
STAMP=$(date +%Y%m%d-%H%M%S)
DUMP_OPTS=(--single-transaction --quick --no-tablespaces --skip-lock-tables --default-character-set=utf8mb4)

log "1/5 Backing up current staging database"
mysqldump --defaults-extra-file="$STAGING_CNF" "${DUMP_OPTS[@]}" "$STAGING_DB" | gzip > "$BACKUP_DIR/staging-$STAGING_DB-$STAMP.sql.gz"
echo "Saved $BACKUP_DIR/staging-$STAGING_DB-$STAMP.sql.gz"

log "2/5 Dumping production database"
PROD_DUMP="$BACKUP_DIR/production-$PROD_DB-$STAMP.sql.gz"
mysqldump --defaults-extra-file="$PROD_CNF" "${DUMP_OPTS[@]}" "$PROD_DB" | gzip > "$PROD_DUMP"
echo "Saved $PROD_DUMP ($(du -h "$PROD_DUMP" | cut -f1))"

log "3/5 Emptying staging database and importing the production copy"
TABLES=$(mysql --defaults-extra-file="$STAGING_CNF" -N -B -e \
    "SELECT GROUP_CONCAT(CONCAT('\`', table_name, '\`')) FROM information_schema.tables WHERE table_schema = DATABASE();" "$STAGING_DB")
if [ -n "$TABLES" ] && [ "$TABLES" != "NULL" ]; then
    mysql --defaults-extra-file="$STAGING_CNF" -e "SET FOREIGN_KEY_CHECKS=0; DROP TABLE $TABLES; SET FOREIGN_KEY_CHECKS=1;" "$STAGING_DB"
fi
gunzip -c "$PROD_DUMP" | mysql --defaults-extra-file="$STAGING_CNF" "$STAGING_DB"

log "4/5 Copying uploaded images (storage/app/public)"
mkdir -p "$STAGING_PATH/storage/app/public"
if command -v rsync >/dev/null 2>&1; then
    rsync -a --delete "$PROD_PATH/storage/app/public/" "$STAGING_PATH/storage/app/public/"
else
    cp -a "$PROD_PATH/storage/app/public/." "$STAGING_PATH/storage/app/public/"
fi
if [ -d "$PROD_PATH/public/assets/img" ]; then   # not tracked in git
    mkdir -p "$STAGING_PATH/public/assets/img"
    cp -a "$PROD_PATH/public/assets/img/." "$STAGING_PATH/public/assets/img/"
fi

log "5/5 Migrations + replacing all user passwords on staging"
cd "$STAGING_PATH"
"$PHP" artisan migrate --force
if [ -n "$STAGING_PASSWORD" ]; then
    "$PHP" artisan staging:reset-passwords --force --password="$STAGING_PASSWORD"
else
    "$PHP" artisan staging:reset-passwords --force
fi
"$PHP" artisan optimize:clear >/dev/null

log "Done. Staging now has a copy of production with new passwords."
echo "The production dump is kept in $PROD_DUMP. Delete it when you no longer need it:"
echo "  rm $PROD_DUMP"
