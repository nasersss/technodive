@extends('auth.layout')

@section('title', 'تغيير بيانات الدخول')

@section('content')
    <div>
        <h1 class="td-auth__title">تغيير بيانات الدخول</h1>
        <p class="td-auth__lead">غيّر اسم المستخدم وكلمة المرور. بعد الحفظ يتم تسجيل خروجك لتدخل بالبيانات الجديدة.</p>
    </div>

    @if (session('error'))
        <p class="td-auth-alert td-auth-alert--error" role="alert">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('resetPassword') }}" class="td-auth__form" data-disable-on-submit>
        @csrf
        <input type="hidden" name="username" value="{{ Auth::user()->username }}">
        @include('auth.partials.field', [
            'name' => 'newUsername', 'label' => 'اسم المستخدم', 'icon' => 'user',
            'value' => old('newUsername', Auth::user()->username), 'autocomplete' => 'username',
        ])
        @include('auth.partials.field', [
            'name' => 'password', 'label' => 'كلمة المرور الجديدة', 'icon' => 'lock', 'type' => 'password',
            'placeholder' => '5 أحرف على الأقل', 'autocomplete' => 'new-password', 'autofocus' => true,
        ])
        @include('auth.partials.field', [
            'name' => 'password_confirmation', 'label' => 'تأكيد كلمة المرور الجديدة', 'icon' => 'lock', 'type' => 'password',
            'placeholder' => 'اكتبها مرة أخرى', 'autocomplete' => 'new-password',
        ])
        <button type="submit" class="td-btn td-btn--amber td-btn--lg td-btn--block">حفظ التغييرات</button>
    </form>

    <a href="{{ route('home') }}" class="td-link td-auth__back">
        @include('landing.partials.icon', ['name' => 'arrow', 'size' => 16, 'class' => 'td-auth__back-icon']) العودة إلى لوحة التحكم
    </a>
@endsection
