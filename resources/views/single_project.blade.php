
@extends('master')

@section('title')
{{__('navbar.about')}}
@endsection

{{-- page css files or code  --}}
@section('css')

@endsection
{{-- page css files or code !!!! --}}

{{-- content of page  --}}
@section('content')
<div class="container-fluid py-5 mb-5 wow fadeIn" data-wow-delay="0.1s" >
    <div class="container  py-5">

        <!-- Carousel Start -->
            <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
                <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="w-100" src="{{asset('/assets/img/ta11.jpg')}}" alt="Image">

                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{asset('/assets/img/ta10.jpg')}}" alt="Image">

                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{asset('/assets/img/ta12.jpg')}}" alt="Image">

                        </div>
                        <div class="carousel-item">
                            <img class="w-100" src="{{asset('/assets/img/ta5.jpg')}}" alt="Image">

                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        <!-- Carousel End -->
            <h1 class="my-3">welcome to ggggggggggggggg</h1>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate itaque fugiat rem. Vero ducimus, provident facere debitis esse vel placeat dolorum nemo veniam enim dolor fuga suscipit a recusandae unde laboriosam adipisci ipsum vitae optio porro dignissimos ullam. Cupiditate reprehenderit animi incidunt totam aut dolor consequatur eius expedita est facere, quia et accusamus! Fugit necessitatibus ut dolorum laboriosam vero impedit animi consectetur molestiae culpa ad doloremque saepe debitis beatae itaque unde distinctio neque voluptas, ea quisquam iste consequatur voluptatibus. Recusandae nihil dolore maxime voluptatibus magnam ipsa provident laudantium ab maiores commodi, harum repudiandae veniam veritatis quibusdam blanditiis id reiciendis quae dolorem suscipit earum tempora, fugiat ratione velit. Quisquam placeat totam commodi, hic assumenda aperiam id corrupti, facere rerum officia debitis, laboriosam et unde! Eius fuga asperiores natus necessitatibus facere quidem sed earum. Blanditiis ad doloribus aliquam, assumenda sed architecto magni, omnis voluptatem veniam, fuga dolor officia. Quia ullam cumque culpa ipsum et impedit, optio, minima aperiam odit repudiandae a fugiat, vitae modi eius nesciunt laudantium velit itaque voluptas sapiente libero provident fugit eos! Veritatis eligendi possimus expedita fugit tempore ad corporis, architecto aliquam, qui eos id earum praesentium nostrum facilis soluta dicta tenetur mollitia consequatur ut cum, recusandae sed reprehenderit.</p>
    </div>
</div>

@endsection
