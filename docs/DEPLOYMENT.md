# النشر التلقائي (CI/CD)

ملف واحد `.github/workflows/deploy.yml` يخدم البيئتين:

| الفرع | البيئة في GitHub | الموقع |
|---|---|---|
| `develop` | `staging` | `technodive.goupdev.net` |
| `main` | `production` | `technodive-ye.com` |

كل push أو merge على أحد الفرعين يشغّل:

1. **Checks:** تثبيت الحزم، فحص صياغة PHP، وتجميع views و routes و config للتأكد إن التطبيق يقلع.
2. **Deploy:** يدخل السيرفر عبر SSH ويشغّل `scripts/deploy.sh`، وهذا يسوي التالي:
   وضع الصيانة ← `git reset` على `origin/main` ← `composer install --no-dev` ← `migrate --force` ← تحديث الكاش ← إلغاء وضع الصيانة.
3. **Smoke test:** يتأكد إن الصفحة الرئيسية ترجع 200، أو 401 لو الموقع محمي بكلمة مرور (لو تم ضبط `SITE_URL`).

تقدر تشغّله يدوياً من تبويب **Actions ← Deploy production ← Run workflow**.

---

## الإعداد لأول مرة

### 1. مفتاح SSH للنشر

على جهازك:

```bash
ssh-keygen -t ed25519 -C "github-deploy-technodive" -f technodive_deploy -N ""
```

- في hPanel ← **Advanced ← SSH Access ← SSH keys**: أضف محتوى `technodive_deploy.pub`.
- خذ من نفس الصفحة: IP السيرفر، المنفذ (غالباً `65002`)، واسم المستخدم (`u123456789`).

بصمة السيرفر، عشان GitHub يتأكد إنه يتصل بالسيرفر الصحيح:

```bash
ssh-keyscan -p 65002 IP_السيرفر
```

### 2. السيرفر لازم يكون نسخة git من المستودع

الموقع الحالي في Hostinger مرفوع كملفات. حوّله لنسخة git **مرة واحدة** (بعد أخذ نسخة احتياطية):

```bash
cd ~/domains/technodive-ye.com            # عدّل حسب دومينك
mv public_html public_html_backup
git clone -b main https://github.com/nasersss/technodive.git public_html
cp public_html_backup/.env public_html/.env
cp -r public_html_backup/storage/app/public/. public_html/storage/app/public/
cp -r public_html_backup/public/assets/img public_html/public/assets/   # الصور غير موجودة في git
ln -s ~/domains/technodive-ye.com/public_html/storage/app/public \
      ~/domains/technodive-ye.com/public_html/public/storage
cd public_html && DEPLOY_PATH=$PWD bash scripts/deploy.sh
```

> ملف `.htaccess` في جذر المشروع يحوّل الطلبات إلى مجلد `public`، فوجود المشروع كامل داخل `public_html` آمن. ملف `.env` ما يُفتح من المتصفح.

### 3. Secrets و Variables في GitHub

أنشئ من **Settings ← Environments** بيئتين: `staging` و `production`. كل وحدة لها نفس أسماء الـ secrets بقيم سيرفرها. وتقدر تضيف **Required reviewers** لو تبغى موافقة يدوية قبل كل نشر.

**Secrets** (في كل environment):

| الاسم | القيمة |
|---|---|
| `SSH_HOST` | IP السيرفر |
| `SSH_PORT` | `65002` |
| `SSH_USER` | `u123456789` |
| `SSH_PRIVATE_KEY` | محتوى الملف `technodive_deploy` (المفتاح الخاص كامل) |
| `DEPLOY_PATH` | staging: `/home/u123456789/domains/technodive.goupdev.net/app` · production: `/home/u123456789/domains/technodive-ye.com/public_html` |
| `SSH_KNOWN_HOSTS` | ناتج `ssh-keyscan` (اختياري لكنه مستحسن) |

**Variables** (اختيارية):

| الاسم | القيمة |
|---|---|
| `SITE_URL` | رابط الموقع لاختبار الصفحة بعد النشر |
| `PHP_BIN` | لو `php -v` على السيرفر أقدم من 8.0.2، مثلاً `/opt/alt/php81/usr/bin/php` |
| `COMPOSER_BIN` | لو أمر composer مختلف، مثلاً `composer2` |

---

## ملاحظات

- السكربت **يرفض النشر** لو فيه تعديلات مباشرة على السيرفر في ملفات git، عشان ما تضيع. اعملها commit في المستودع أو احذفها.
- `.env` والصور المرفوعة (`storage/app/public`) و `public/assets/img` ما يلمسها السكربت.
- لو فشلت خطوة، الموقع يرجع من وضع الصيانة والـ job يظهر أحمر في GitHub.
- الرجوع لنسخة سابقة: اعمل `git revert` للـ commit واعمل merge إلى `main`.

---

## نسخ قاعدة بيانات البرودكشن إلى staging

لما يكون الموقعان على نفس حساب Hostinger، شغّل هذا الأمر على السيرفر عبر SSH:

```bash
bash ~/domains/technodive.goupdev.net/app/scripts/copy-production-db.sh \
     ~/domains/technodive-ye.com/public_html \
     ~/domains/technodive.goupdev.net/app \
     'Staging@2026'
```

السكربت يقرأ بيانات الاتصال من ملف `.env` حق كل موقع، وما يغيّر شي في البرودكشن. خطواته:
1. نسخة احتياطية من قاعدة staging الحالية في `~/db-backups`.
2. `mysqldump` لقاعدة البرودكشن.
3. يفرّغ قاعدة staging ويستورد النسخة فيها.
4. ينسخ الصور المرفوعة.
5. يشغّل `migrate`، ثم **يغيّر كلمات مرور كل المستخدمين** عبر `php artisan staging:reset-passwords`.

يرفض يكمل لو القاعدتين نفس الاسم، أو لو `.env` حق staging فيه `APP_ENV=production`.

## تغيير كلمات مرور كل المستخدمين

```bash
php artisan staging:reset-passwords --password='Staging@2026'   # نفس كلمة المرور للكل
php artisan staging:reset-passwords                               # كلمة عشوائية لكل مستخدم تُطبع مرة واحدة
```

الأمر **يرفض يشتغل** لو `APP_ENV=production`، ويلغي جلسات "تذكرني" لكل المستخدمين.
