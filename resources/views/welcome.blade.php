@extends('admin.layouts.master')

@section('title')
    لوحة التحكم
@endsection

@section('first-css')
@endsection

@section('header-content')
    لوحة التحكم
@endsection

@section('content-body')
    <!--**********************************
                Content body start
            ***********************************-->
            @include('massages')

    <!-- row -->
    <div class="container-fluid">
        <div class="row invoice-card-row">
            {{-- @include('dash-accountant') --}}

            <!-- <div class="col-xl-3 col-xxl-6 col-sm-6">
                            <div class="card bg-warning invoice-card">
                                <div class="card-body d-flex">
                                    <div class="icon ms-3">
                                        <svg  width="33px" height="32px">
                                            <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                  d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-white invoice-num">2478</h2>
                                        <span class="text-white fs-18">إجمالي جميع الفوتير</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->
            <!-- <div class="col-xl-3 col-xxl-6 col-sm-6">
                            <div class="card bg-success invoice-card">
                                <div class="card-body d-flex">
                                    <div class="icon ms-3">
                                        <svg width="35px" height="34px">
                                            <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                  d="M32.482,9.730 C31.092,6.789 28.892,4.319 26.120,2.586 C22.265,0.183 17.698,-0.580 13.271,0.442 C8.843,1.458 5.074,4.140 2.668,7.990 C0.255,11.840 -0.509,16.394 0.514,20.822 C1.538,25.244 4.224,29.008 8.072,31.411 C10.785,33.104 13.896,34.000 17.080,34.000 L17.286,34.000 C20.456,33.960 23.541,33.044 26.213,31.358 C26.991,30.866 27.217,29.844 26.725,29.067 C26.234,28.291 25.210,28.065 24.432,28.556 C22.285,29.917 19.799,30.654 17.246,30.687 C14.627,30.720 12.067,29.997 9.834,28.609 C6.730,26.671 4.569,23.644 3.752,20.085 C2.934,16.527 3.546,12.863 5.486,9.763 C9.488,3.370 17.957,1.418 24.359,5.414 C26.592,6.808 28.360,8.793 29.477,11.157 C30.568,13.460 30.993,16.016 30.707,18.539 C30.607,19.448 31.259,20.271 32.177,20.371 C33.087,20.470 33.911,19.820 34.011,18.904 C34.363,15.764 33.832,12.591 32.482,9.730 L32.482,9.730 Z"/>
                                            <path fill-rule="evenodd"  fill="rgb(255, 255, 255)"
                                                  d="M22.593,11.237 L14.575,19.244 L11.604,16.277 C10.952,15.626 9.902,15.626 9.250,16.277 C8.599,16.927 8.599,17.976 9.250,18.627 L13.399,22.770 C13.725,23.095 14.150,23.254 14.575,23.254 C15.001,23.254 15.427,23.095 15.753,22.770 L24.940,13.588 C25.592,12.937 25.592,11.888 24.940,11.237 C24.289,10.593 23.238,10.593 22.593,11.237 L22.593,11.237 Z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h2 class="text-white invoice-num">983</h2>
                                        <span class="text-white fs-18">المدفوع من الفوتير</span>
                                    </div>
                                </div>
                            </div>
                        </div> -->.

	   <!--**********************************
                    Content Modals start
                ***********************************-->

				{{-- @include('draws.modals.new') --}}
                {{-- @include('buying.modals.new') --}}

                <!--**********************************
                            Content Modals end
                        ***********************************-->
        <div class="row invoice-card-row">
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card bg-info invoice-card">
                    <div class="card-body d-flex">
                        <div class="icon ms-3">
                            <svg width="35px" height="34px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                    d="M33.002,9.728 C31.612,6.787 29.411,4.316 26.638,2.583 C22.781,0.179 18.219,-0.584 13.784,0.438 C9.356,1.454 5.585,4.137 3.178,7.989 C0.764,11.840 -0.000,16.396 1.023,20.825 C2.048,25.247 4.734,29.013 8.584,31.417 C11.297,33.110 14.409,34.006 17.594,34.006 L17.800,34.006 C20.973,33.967 24.058,33.050 26.731,31.363 C27.509,30.872 27.735,29.849 27.243,29.072 C26.751,28.296 25.727,28.070 24.949,28.561 C22.801,29.922 20.314,30.660 17.761,30.693 C15.141,30.726 12.581,30.002 10.346,28.614 C7.241,26.675 5.080,23.647 4.262,20.088 C3.444,16.515 4.056,12.850 5.997,9.748 C10.001,3.353 18.473,1.401 24.876,5.399 C27.110,6.793 28.879,8.779 29.996,11.143 C31.087,13.447 31.513,16.004 31.227,18.527 C31.126,19.437 31.778,20.260 32.696,20.360 C33.607,20.459 34.432,19.809 34.531,18.892 C34.884,15.765 34.352,12.591 33.002,9.728 L33.002,9.728 Z" />
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                    d="M23.380,11.236 C22.728,10.585 21.678,10.585 21.026,11.236 L17.608,14.656 L14.190,11.243 C13.539,10.592 12.488,10.592 11.836,11.243 C11.184,11.893 11.184,12.942 11.836,13.593 L15.254,17.006 L11.836,20.420 C11.184,21.071 11.184,22.120 11.836,22.770 C12.162,23.096 12.588,23.255 13.014,23.255 C13.438,23.255 13.864,23.096 14.190,22.770 L17.608,19.357 L21.026,22.770 C21.352,23.096 21.777,23.255 22.203,23.255 C22.629,23.255 23.054,23.096 23.380,22.770 C24.031,22.120 24.031,21.071 23.380,20.420 L19.962,17.000 L23.380,13.587 C24.031,12.936 24.031,11.887 23.380,11.236 L23.380,11.236 Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-white invoice-num">
                                @isset($oilPrice->petrol_price)
                                    {{ $oilPrice->petrol_price }}ر.ي</h2>
                            @endisset
                            <span class="text-white fs-18"> سعر لتر البترول </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-xxl-6 col-sm-6">
                <div class="card bg-secondary invoice-card">
                    <div class="card-body d-flex">
                        <div class="icon ms-3">
                            <svg width="33px" height="32px">
                                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"
                                    d="M31.963,30.931 C31.818,31.160 31.609,31.342 31.363,31.455 C31.175,31.538 30.972,31.582 30.767,31.583 C30.429,31.583 30.102,31.463 29.845,31.243 L25.802,27.786 L21.758,31.243 C21.502,31.463 21.175,31.583 20.837,31.583 C20.498,31.583 20.172,31.463 19.915,31.243 L15.872,27.786 L11.829,31.243 C11.622,31.420 11.370,31.534 11.101,31.572 C10.832,31.609 10.558,31.569 10.311,31.455 C10.065,31.342 9.857,31.160 9.710,30.931 C9.565,30.703 9.488,30.437 9.488,30.167 L9.488,17.416 L2.395,17.416 C2.019,17.416 1.658,17.267 1.392,17.001 C1.126,16.736 0.976,16.375 0.976,16.000 L0.976,6.083 C0.976,4.580 1.574,3.139 2.639,2.076 C3.703,1.014 5.146,0.417 6.651,0.417 L26.511,0.417 C28.016,0.417 29.459,1.014 30.524,2.076 C31.588,3.139 32.186,4.580 32.186,6.083 L32.186,30.167 C32.186,30.437 32.109,30.703 31.963,30.931 ZM9.488,6.083 C9.488,5.332 9.189,4.611 8.657,4.080 C8.125,3.548 7.403,3.250 6.651,3.250 C5.898,3.250 5.177,3.548 4.645,4.080 C4.113,4.611 3.814,5.332 3.814,6.083 L3.814,14.583 L9.488,14.583 L9.488,6.083 ZM29.348,6.083 C29.348,5.332 29.050,4.611 28.517,4.080 C27.985,3.548 27.263,3.250 26.511,3.250 L11.559,3.250 C12.059,4.111 12.324,5.088 12.325,6.083 L12.325,27.092 L14.950,24.840 C15.207,24.620 15.534,24.500 15.872,24.500 C16.210,24.500 16.537,24.620 16.794,24.840 L20.837,28.296 L24.880,24.840 C25.137,24.620 25.463,24.500 25.802,24.500 C26.140,24.500 26.467,24.620 26.724,24.840 L29.348,27.092 L29.348,6.083 ZM25.092,20.250 L16.581,20.250 C16.205,20.250 15.844,20.101 15.578,19.835 C15.312,19.569 15.162,19.209 15.162,18.833 C15.162,18.457 15.312,18.097 15.578,17.831 C15.844,17.566 16.205,17.416 16.581,17.416 L25.092,17.416 C25.469,17.416 25.829,17.566 26.096,17.831 C26.362,18.097 26.511,18.457 26.511,18.833 C26.511,19.209 26.362,19.569 26.096,19.835 C25.829,20.101 25.469,20.250 25.092,20.250 ZM25.092,14.583 L16.581,14.583 C16.205,14.583 15.844,14.434 15.578,14.168 C15.312,13.903 15.162,13.542 15.162,13.167 C15.162,12.791 15.312,12.430 15.578,12.165 C15.844,11.899 16.205,11.750 16.581,11.750 L25.092,11.750 C25.469,11.750 25.829,11.899 26.096,12.165 C26.362,12.430 26.511,12.791 26.511,13.167 C26.511,13.542 26.362,13.903 26.096,14.168 C25.829,14.434 25.469,14.583 25.092,14.583 ZM25.092,8.916 L16.581,8.916 C16.205,8.916 15.844,8.767 15.578,8.501 C15.312,8.236 15.162,7.875 15.162,7.500 C15.162,7.124 15.312,6.764 15.578,6.498 C15.844,6.232 16.205,6.083 16.581,6.083 L25.092,6.083 C25.469,6.083 25.829,6.232 26.096,6.498 C26.362,6.764 26.511,7.124 26.511,7.500 C26.511,7.875 26.362,8.236 26.096,8.501 C25.829,8.767 25.469,8.916 25.092,8.916 Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-white invoice-num">
                                @isset($oilPrice->diesel_price)
                                    {{ $oilPrice->diesel_price }}ر.ي
                                @endisset
                            </h2>
                            <span class="text-white fs-18">سعر لتر الديزل</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="col-xl-3 col-xxl-6">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div>
                            <h4 class="card-title mb-2">خزنات البترول</h4>
                            <!--									<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>-->
                        </div>
                    </div>
                    @php
                        $p = 0;
                        $d = 0;
                    @endphp
                    <div class="card-body">
                        @isset($tanks)
                            @foreach ($tanks as $tank)
                                @if ($tank->type == 0)
                                    <div class="progress default-progress mt-4">
                                        <div class="progress-bar bg-gradient-{{ ++$p }} progress-animated"
                                            style="width:@if(isset($tank->capacity) && isset($tank->capacity)){{($tank->quantity / $tank->capacity) * 100}}@endif%; height:20px;"
                                            role="progressbar">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                        <span>خزان رقم @isset($tank->id)
                                                {{ $tank->id }}
                                            @endisset
                                        </span>
                                        <span class="fs-18"><span class="text-black pe-2">
                                                @isset($tank->quantity)
                                                    {{ $tank->quantity }}
                                                @endisset لتر
                                            </span>/@isset($tank->capacity)
                                                {{ $tank->capacity }}
                                            @endisset لتر</span>
                                    </div>
                                @endif
                            @endforeach
                        @endisset
                    </div>

                </div>
            </div>
            <div class="col-xl-3 col-xxl-6">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <div>
                            <h4 class="card-title mb-2">خزنات الديزل</h4>
                            <!--									<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>-->
                        </div>
                       
                    </div>
                    <div class="card-body">
                        @isset($tanks)
                            @foreach ($tanks as $tank)
                                @if ($tank->type == 1)
                                    <div class="progress default-progress mt-4">
                                        <div class="progress-bar bg-gradient-{{ ++$d }} progress-animated"
                                            style="width:@if(isset($tank->capacity) && isset($tank->capacity)) {{($tank->quantity / $tank->capacity) * 100}}@endif%; height:20px;"
                                            role="progressbar">
                                            <span class="sr-only">45% Complete</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end mt-2 pb-3 justify-content-between">
                                        <span>خزان رقم @isset($tank->id)
                                                {{ $tank->id }}
                                            @endisset
                                        </span>
                                        <span class="fs-18"><span class="text-black pe-2">
                                                @isset($tank->quantity)
                                                    {{ $tank->quantity }}
                                                @endisset لتر
                                            </span>/@isset($tank->capacity)
                                                {{ $tank->capacity }}
                                            @endisset لتر</span>
                                    </div>
                                @endif
                            @endforeach
                        @endisset
                    </div>

                </div>
            </div>

            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header d-block d-sm-flex border-0">
                        <div class="me-3">
                            <h4 class="card-title mb-2">الحركة اليومية</h4>
                            <!--									<span class="fs-12">Lorem ipsum dolor sit amet, consectetur</span>-->
                        </div>
                        <div class="card-tabs mt-3 mt-sm-0">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#draws"
                                        role="tab">المسحوبات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#transfers"
                                        role="tab">الحوالات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#coupons" role="tab">القسائم</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#supplies"
                                        role="tab">التوريدات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#exchanges"
                                        role="tab">التبديلات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#buys" role="tab">المشتريات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#daily" role="tab">الجرد
                                        اليومي</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body tab-content p-3">
                        {{-- @include('dashboard_tables.draws')
                        @include('dashboard_tables.daily')
                        @include('dashboard_tables.transfers')
                        @include('dashboard_tables.coupons')
                        @include('dashboard_tables.supplies')
                        @include('dashboard_tables.exchanges')
                        @include('dashboard_tables.buys') --}}
                    </div>
                </div>
            </div>


            <!-- <div class="col-xl-6 col-xxl-12">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="card progress-card">
                                        <div class="card-body d-flex">
                                            <div class="ms-auto">
                                            <h4 class="card-title">أجمالي الحركة المالية</h4>
                                                <div class="d-flex align-items-center">
                                                    <h2 class="fs-38 mb-0">98k</h2>
                                                    <div class="text-success transaction-caret">
                                                        <i class="fa fa-sort-asc"></i>
                                                        <p class="mb-0">+0.5%</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                                <div class="progress-bar bg-primary" style="width:10px; height:40%;" role="progressbar">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                                <div class="progress-bar bg-primary" style="width:10px; height:55%;" role="progressbar">
                                                    <span class="sr-only">55% Complete</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                                <div class="progress-bar bg-primary" style="width:10px; height:80%;" role="progressbar">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                            <div class="progress progress-vertical-bottom" style="min-height:110px;min-width:10px;">
                                                <div class="progress-bar bg-primary" style="width:10px; height:50%;" role="progressbar">
                                                    <span class="sr-only">50% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title">الفوتير المتبقية</h4>
                                            <div class="d-flex align-items-center">
                                                <div class="ms-auto">
                                                    <div class="progress mt-4" style="height:10px;">
                                                        <div class="progress-bar bg-primary progress-animated" style="width: 45%; height:10px;" role="progressbar">
                                                            <span class="sr-only">60% Complete</span>
                                                        </div>
                                                    </div>
                                                    <p class="fs-16 mb-0 mt-2"><span class="text-danger">-0,8% </span>من الشهر الماضي</p>
                                                </div>
                                                <h2 class="fs-38">854</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title mt-2">الفوتير المدفوعة</h4>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                                <h2 class="fs-38 mb-0 me-3">456</h2>
                                                <span class="badge badge-success badge-xl">+0.5%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="card">
                                        <div class="card-body">
                                        <h4 class="card-title mt-2">الفوتير غير المدفوعة</h4>
                                            <div class="d-flex align-items-center mt-3 mb-2">
                                                <h2 class="fs-38 mb-0 me-3">1467</h2>
                                                <span class="badge badge-danger badge-xl">-6.4%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
        </div>
    </div>
    <!--**********************************
                Content body end
            ***********************************-->


@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('table.display').DataTable();
    });
</script>
    <script src="{{ asset('/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/js/plugins-init/datatables.init.js') }}"></script>
@endsection
