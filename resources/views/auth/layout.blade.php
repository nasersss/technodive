{{-- Dashboard sign-in and change-password pages: the form beside a photo panel (desktop). --}}
<!DOCTYPE html>
<html lang="ar" dir="rtl" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="robots" content="noindex">
    <meta name="theme-color" content="#f4f7fa">
    <title>@yield('title') · تكنو دايف</title>
    <link rel="icon" href="{{ asset('/assets/img/logo.jpg') }}">
    <link rel="preload" href="{{ asset('/fonts/Cairo-VariableFont_wght.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="stylesheet" href="{{ asset('/assets/css/landing.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/auth.css') }}">
</head>
<body class="td td-auth">
    <main class="td-auth__grid">
        <section class="td-auth__panel">
            <div class="td-auth__card">
                <a href="{{ route('index') }}" class="td-auth__brand">
                    <img src="{{ asset('/assets/img/logo.jpg') }}" alt="" width="60" height="60">
                    <span>
                        <strong>تكنو دايف</strong>
                        <span>لخدمات الغوص التجاري</span>
                    </span>
                </a>

                @yield('content')
            </div>
            <p class="td-auth__copy">&copy; {{ date('Y') }} تكنو دايف لخدمات الغوص التجاري</p>
        </section>

        <aside class="td-auth__visual" aria-hidden="true">
            <img src="{{ asset('/assets/img/wo11.jpg') }}" alt="">
            <div class="td-auth__visual-text">
                <p class="td-eyebrow td-eyebrow--light">تكنو دايف لخدمات الغوص التجاري</p>
                <h2>لوحة التحكم</h2>
                <p>أدِر الخدمات والأعمال والمعدات والشهادات التي تظهر في الموقع من مكان واحد.</p>
                <ul class="td-auth__pills">
                    <li>الخدمات</li>
                    <li>الأعمال</li>
                    <li>المعدات</li>
                    <li>الشهادات</li>
                </ul>
            </div>
        </aside>
    </main>

    <script>
        // Show / hide password
        document.querySelectorAll('[data-password-toggle]').forEach(function (btn) {
            var input = document.getElementById(btn.getAttribute('aria-controls'));
            btn.addEventListener('click', function () {
                var show = input.type === 'password';
                input.type = show ? 'text' : 'password';
                btn.setAttribute('aria-pressed', show ? 'true' : 'false');
                btn.setAttribute('aria-label', show ? 'إخفاء كلمة المرور' : 'إظهار كلمة المرور');
                input.focus();
            });
        });
        // Prevent double submit
        document.querySelectorAll('form[data-disable-on-submit]').forEach(function (form) {
            form.addEventListener('submit', function () {
                var btn = form.querySelector('[type="submit"]');
                if (btn) btn.setAttribute('disabled', 'disabled');
            });
        });
    </script>
</body>
</html>
