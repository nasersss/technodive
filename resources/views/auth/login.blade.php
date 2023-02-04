

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">


	<!-- PAGE TITLE HERE -->
	<title> تكنو دايف</title>

	<!-- FAVICONS ICON -->
	{{-- <link rel="shortcut icon" type="image/png" href="images/favicon.png" /> --}}
    <link href="{{asset('/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/css/toastr/toastr.css')}}" rel="stylesheet" type="text/css">


</head>
{{-- @if(session()->has('success'))
<div >
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('success') }}</strong>
</div>
@elseif(session()->has('error'))
<div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <strong>{{ session()->get('error') }}</strong>
</div>
@endif --}}

<body style="direction: rtl;" class="vh-100">
    {{-- <div  style="display: none;">
        @error('username')
        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
            role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <strong id="errorm">{{$message}}</strong>
        </div>
        @enderror
    </div> --}}
    {{-- @include('massages') --}}


    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div style="width: 60%">
                    @if (session()->has('success'))
                        <div data-success="success" class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                            role="alert">           
                            <strong style="margin-right: 50px;" id="successm" >{{session()->get('success')}}</strong>
                        </div>
                        
                    @elseif(session()->has('error'))
            
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong style="margin-right: 50px;" id="errorm">{{session()->get('error')}}</strong>
                        </div>
                    @endif

                    @error('username')
                        <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                            role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong style="margin-right: 50px;" id="errorm">{{ $message }}</strong>
                        </div>
                        
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    
									<div class="text-center mb-3">
										<a href="index.html"><img src="{{asset('/images/logo-full.png')}}" alt=""></a>
									</div>
                                    <h4 class="text-center mb-4">قم بتسجيل الدخول إلى حسابك</h4>
                                    
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>اسم المسنخدم</strong></label>
                                            <input type="text" class="form-control" value="" name="username" id="username" placeholder="ادخل اسم المستخدم هنا">
                                            
                                        </div>
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>كلمة المرور</strong></label>
                                            <input type="password" class="form-control" value="" type="password" name="password" id="password" placeholder="ادخل كلمة المرور هنا">
                                            
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            {{-- <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
													<input type="checkbox" class="form-check-input" id="basic_checkbox_1">
													<label class="form-check-label" for="basic_checkbox_1">تذكرني</label>
												</div>
                                            </div> --}}
                                            <div class="mb-3">
                                                <a href="page-forgot-password.html">هل نسيت كلمة السر؟</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">تسجيل الدخول</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>ليس لديك حساب؟ <a class="text-primary" href="#">اشتراك</a></p>
                                    </div> --}}
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

    <!-- Toastr -->
    <script src="{{asset('/js/toastr/toastr.min.js')}}"></script>

    <!-- All init script -->
    <script src="{{asset('/js/toastr/toastr-init.js')}}"></script>


    <script src="{{asset('/js/custom.min.js ')}}"></script>
    <script src="{{asset('/js/dlabnav-init.js ')}}"></script>

    
</body>
</html>
