<!DOCTYPE html>
<html {{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ config('locales.languages')[app()->getLocale()]['rtl_support'] }}">
<head>
    @include('layouts.header.head')
</head>
<body>
  @include('layouts.navbar')
  {{-- @include('about') --}}

  @yield('content')

  @include('layouts.footer.footer')
</body>
</html>
