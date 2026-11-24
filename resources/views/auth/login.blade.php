@extends('auth.layout')

@section('title', 'تسجيل الدخول')

@section('content')
    <div>
        <h1 class="td-auth__title">تسجيل الدخول</h1>
        <p class="td-auth__lead">أدخل بياناتك للوصول إلى لوحة تحكم الموقع.</p>
    </div>

    @if (session('error'))
        <p class="td-auth-alert td-auth-alert--error" role="alert">{{ session('error') }}</p>
    @elseif (session('success'))
        <p class="td-auth-alert td-auth-alert--success" role="status">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('login') }}" class="td-auth__form" data-disable-on-submit>
        @csrf
        @include('auth.partials.field', [
            'name' => 'username', 'label' => 'اسم المستخدم', 'icon' => 'user',
            'value' => old('username'), 'placeholder' => 'اكتب اسم المستخدم',
            'autocomplete' => 'username', 'autofocus' => ! old('username'),
        ])
        @include('auth.partials.field', [
            'name' => 'password', 'label' => 'كلمة المرور', 'icon' => 'lock', 'type' => 'password',
            'placeholder' => 'اكتب كلمة المرور', 'autocomplete' => 'current-password', 'autofocus' => (bool) old('username'),
        ])
        <button type="submit" class="td-btn td-btn--amber td-btn--lg td-btn--block">
            تسجيل الدخول @include('landing.partials.icon', ['name' => 'arrow', 'size' => 18])
        </button>
    </form>

    <a href="{{ route('index') }}" class="td-link td-auth__back">
        @include('landing.partials.icon', ['name' => 'arrow', 'size' => 16, 'class' => 'td-auth__back-icon']) العودة إلى الموقع
    </a>
@endsection
