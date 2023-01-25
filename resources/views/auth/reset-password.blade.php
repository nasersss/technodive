
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- PAGE TITLE HERE -->
	<title>محطة حُنيش |اعادة تعيين كلمة المرور</title>

	<!-- FAVICONS ICON -->
	{{-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> --}}
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">

</head>
@if(session()->has('success'))
<div >
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('success') }}</strong>
</div>
@elseif(session()->has('error'))
<div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('error') }}</strong>
</div>
@endif

{{-- @include('massages') --}}

<body style="direction: rtl;" class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <a href="{{route('home')}}" style="padding-right: 10px;">الرئيسية ></a>
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{asset('/images/logo-full.png')}}" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">اعادة تعيين كلمة المرور</h4>
                                    <form method="POST" action={{ route('resetPassword') }}>
                                        @csrf
                                        {{-- <input type="hidden" name="token" value="{{ $token }}"> --}}
                                        <input type="hidden" name="username" value="{{Auth::user()->username}}">
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>اسم المسنخدم</strong></label>
                                            <input type="text" class="form-control" value="{{Auth::user()->username}}" required autofocus name="newUsername" id="username" placeholder="ادخل اسم المستخدم هنا">
                                            @error('newUsername')
                                            <span style="color: deeppink" class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>كلمة المرور</strong></label>
                                            <input type="password" class="form-control" value="{{ $password ?? old('password') }}" type="password" name="password" id="password" placeholder="ادخل كلمة المرور السابقة هنا">
                                            @error('password')
                                            <span style="color: deeppink" class="" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="mb-3">
                                            <label class="mb-1"><strong>كلمة المرور الجديدة</strong></label>
                                            <input type="password" class="form-control" value="" type="password" name="password_confirmation" id="password" placeholder="ادخل كلمة المرور الجديدة هنا">
                                        </div> --}}
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>كلمة المرور مرة اخرى</strong></label>
                                            <input type="password" class="form-control" value="{{ $password_confirmation ?? old('password_confirmation') }}" type="password" name="password_confirmation" id="password" placeholder="ادخل كلمة المرور الجديدة مرة اخرى هنا">
                                            @error('password_confirmation')
                                            <span class="" style="color: deeppink" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('/js/custom.min.js ')}}"></script>
    <script src="{{asset('/js/dlabnav-init.js ')}}"></script>

</body>
</html>

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
            {{-- </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
            {{-- </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
