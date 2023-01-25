<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
<head>
    @include('admin.layouts.header.head')
</head>
<body>
  @include('admin.layouts.navbar')
  {{-- @include('about') --}}

  @yield('content')

  @include('admin.layouts.footer.footer')
</body>
</html>
