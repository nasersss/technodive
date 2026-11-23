
@extends('master')

@section('title')
{{__('navbar.certificates')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s"
style='visibility: visible;
animation-delay: 0.1s;
animation-name: fadeIn;
background: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url("{{asset('/assets/img/paner2.png')}}") center center no-repeat;
background-size: cover;
'>
    <div class="container text-center py-5">
        <h1 class="display-4 text-white  slideInDown mb-3">{{__('navbar.certificates')}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a class="text-white" href="{{ route('index') }}">{{__('navbar.home')}}</a></li>
                {{-- <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li> --}}
                <li class="breadcrumb-item text-primary active" aria-current="page">{{__('navbar.certificates')}}</li>
            </ol>
        </nav>
    </div>
</div>
@include('our-expertise')
{{-- @include('testimonial') --}}
@endsection
