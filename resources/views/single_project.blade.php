
@extends('master')

@section('title')
@isset($work)
{{$work->title}}
@endisset
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<div class="container-fluid py-3  wow fadeIn" data-wow-delay="0.1s" >
    @isset($work)
    <div class="container mx-auto row py-0">
        <!-- Carousel Start -->
        <div class="col-sm-12 col-lg-4">
            <h1 class="my-3">
                {{$work->title}}
        </h1>
        <p>
            {{$work->description}}
        </p>
        </div>
            <div class="container-fluid p-0 wow fadeIn col-sm-12 col-lg-8 " data-wow-delay="0.1s">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner col-12" > 
                        
                        @foreach ($work->workImages as $image)
                       
                        <div class="carousel-item  @if($loop->iteration ==1) active @endif ">
                            <img class="img-fluid" src="{{asset('storage/images/'.$image->image)}}" alt="Image">
                        </div>
                        
                        @endforeach

                    </div>
                    <button class="carousel-control-prev bg-dark " type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon text-primary" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon text-primary" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        <!-- Carousel End -->
        
    </div>
    @endisset
</div>

@endsection
