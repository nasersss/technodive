@php
    $locale = app()->getLocale();
    $dir = config('locales.languages')[$locale]['rtl_support'] ?? 'rtl';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', $locale) }}" dir="{{ $dir }}" data-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <meta name="description" content="شركة تكنو دايف لخدمات الغوص التجاري في المكلا، اليمن: إنقاذ السفن، اللحام والقص تحت الماء، المراسي وخطوط الأنابيب، والمسوحات البحرية. Techno Dive commercial diving services in Mukalla, Yemen.">
    <meta name="keywords" content="غوصين في المكلا, تكنو دايف, انقاذ السفن, اصلاح السفن, اللحام تحت الماء, القص تحت الماء, مسوحات بحرية, Techno Dive, Commercial diving, Ship salvage, Underwater welding, Mukalla">
    <meta name="theme-color" content="#f4f7fa">
    <title>@yield('title', __('landing.meta_title'))</title>
    <link rel="icon" href="{{ asset('/assets/img/logo.jpg') }}">

    {{-- Light is the default; dark only when the visitor chose it. Applied before first paint to avoid a flash. --}}
    <script>
        (function () {
            try {
                if (localStorage.getItem('td-theme') === 'dark') {
                    document.documentElement.setAttribute('data-theme', 'dark');
                    document.querySelector('meta[name="theme-color"]').setAttribute('content', '#061826');
                }
            } catch (e) {}
        })();
    </script>

    <link rel="preload" href="{{ asset('/fonts/Cairo-VariableFont_wght.ttf') }}" as="font" type="font/ttf" crossorigin>
    <link rel="stylesheet" href="{{ asset('/assets/css/landing.css') }}">
    @yield('css')
</head>
<body class="td">
    <a class="td-skip" href="#main">{{ __('landing.home') }}</a>

    @include('landing.partials.header')

    <main id="main">
        @yield('content')
    </main>

    @include('landing.partials.footer')

    @if (session('success') || session('error'))
        <div class="td-toast {{ session('success') ? 'is-success' : 'is-error' }}" role="status" data-toast>
            <span>{{ session('success') ?? session('error') }}</span>
            <button type="button" class="td-toast__close" data-toast-close aria-label="×">×</button>
        </div>
    @endif

    <script src="{{ asset('/assets/js/landing.js') }}" defer></script>
    @yield('js')
</body>
</html>
