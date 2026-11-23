# النشر التلقائي للبرودكشن (CI/CD)

كل merge إلى `main` يشغّل `.github/workflows/deploy-production.yml`:

1. **Checks:** تثبيت الحزم، فحص صياغة PHP، وتجميع views و routes و config للتأكد إن التطبيق يقلع.
2. **Deploy:** يدخل السيرفر عبر SSH ويشغّل `scripts/deploy.sh`، وهذا يسوي التالي:
   وضع الصيانة ← `git reset` على `origin/main` ← `composer install --no-dev` ← `migrate --force` ← تحديث الكاش ← إلغاء وضع الصيانة.
3. **Smoke test:** يتأكد إن الصفحة الرئيسية ترجع 200 (لو تم ضبط `PRODUCTION_URL`).

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

**Settings ← Environments ← New environment** باسم `production`. وتقدر تضيف **Required reviewers** لو تبغى موافقة يدوية قبل كل نشر.

**Secrets** (داخل environment `production`):

| الاسم | القيمة |
|---|---|
| `SSH_HOST` | IP السيرفر |
| `SSH_PORT` | `65002` |
| `SSH_USER` | `u123456789` |
| `SSH_PRIVATE_KEY` | محتوى الملف `technodive_deploy` (المفتاح الخاص كامل) |
| `DEPLOY_PATH` | `/home/u123456789/domains/technodive-ye.com/public_html` |
| `SSH_KNOWN_HOSTS` | ناتج `ssh-keyscan` (اختياري لكنه مستحسن) |

**Variables** (اختيارية):

| الاسم | القيمة |
|---|---|
| `PRODUCTION_URL` | `https://technodive-ye.com` (لاختبار الصفحة بعد النشر) |
| `PHP_BIN` | لو `php -v` على السيرفر أقدم من 8.0.2، مثلاً `/opt/alt/php81/usr/bin/php` |
| `COMPOSER_BIN` | لو أمر composer مختلف، مثلاً `composer2` |

---

## ملاحظات

- السكربت **يرفض النشر** لو فيه تعديلات مباشرة على السيرفر في ملفات git، عشان ما تضيع. اعملها commit في المستودع أو احذفها.
- `.env` والصور المرفوعة (`storage/app/public`) و `public/assets/img` ما يلمسها السكربت.
- لو فشلت خطوة، الموقع يرجع من وضع الصيانة والـ job يظهر أحمر في GitHub.
- الرجوع لنسخة سابقة: اعمل `git revert` للـ commit واعمل merge إلى `main`.
