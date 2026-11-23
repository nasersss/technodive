#!/usr/bin/env bash
# Production deploy for Techno Dive (Hostinger shared hosting).
# Runs ON THE SERVER. The GitHub Actions workflow pipes it over SSH:
#   ssh user@host "DEPLOY_PATH=... bash -s" < scripts/deploy.sh
# It can also be run by hand from the project folder:
#   DEPLOY_PATH=$PWD bash scripts/deploy.sh
#
# Requirements: DEPLOY_PATH is a git checkout of this repository with a
# working .env file (the .env is never touched by this script).

set -euo pipefail

: "${DEPLOY_PATH:?DEPLOY_PATH is required}"
BRANCH="${DEPLOY_BRANCH:-main}"
PHP="${PHP_BIN:-php}"
COMPOSER="${COMPOSER_BIN:-composer}"

log() { printf '\n\033[1;36m==> %s\033[0m\n' "$*"; }

cd "$DEPLOY_PATH"

log "Deploying branch '$BRANCH' in $DEPLOY_PATH"
[ -d .git ] || { echo "ERROR: $DEPLOY_PATH is not a git checkout"; exit 1; }
[ -f .env ] || { echo "ERROR: .env is missing in $DEPLOY_PATH"; exit 1; }

# Refuse to overwrite edits made directly on the server (tracked files only).
if [ -n "$(git status --porcelain --untracked-files=no)" ]; then
    echo "ERROR: there are local changes on the server. Commit them to the repo or discard them first:"
    git status --short --untracked-files=no
    exit 1
fi

PREVIOUS=$(git rev-parse --short HEAD)

log "Maintenance mode on"
"$PHP" artisan down --retry=15 || true
# Always bring the site back up, even if a step below fails.
trap '"$PHP" artisan up || true' EXIT

log "Fetching code"
git fetch --prune origin "$BRANCH"
git checkout -q "$BRANCH" 2>/dev/null || git checkout -q -b "$BRANCH" "origin/$BRANCH"
git reset -q --hard "origin/$BRANCH"
if [ -n "${DEPLOY_SHA:-}" ] && ! git merge-base --is-ancestor "$DEPLOY_SHA" HEAD; then
    echo "WARNING: commit $DEPLOY_SHA is not on origin/$BRANCH yet"
fi
echo "Updated $PREVIOUS -> $(git rev-parse --short HEAD)"

log "Installing PHP dependencies"
"$COMPOSER" install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-progress

log "Running migrations"
"$PHP" artisan migrate --force

log "Refreshing caches"
"$PHP" artisan optimize:clear
"$PHP" artisan config:cache
"$PHP" artisan route:cache
"$PHP" artisan view:cache

log "Done: $(git log -1 --format='%h %s')"
