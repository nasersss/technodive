<!-- Project Start -->
    <div class="container-xxl py-5 direction-ltr">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="section-title bg-white text-center text-primary px-3">{{__('navbar.works')}}</h1>
                <!-- <h1 class="display-6 mb-4">Learn More About Our Complete </h1> -->
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.1s">
                @foreach ($works as $work)
                <div class="project-item border rounded h-100 p-4 direction-rtl" data-dot="01">
                    @isset($work->workImages[0]->image)
                    <a href="{{route('singleProjects',$work->id)}}">

                        {{-- if this image work  --}}
                        {{-- <div class="position-relative mb-4 ">
                            <img class="img-fluid rounded" src="{{ asset('storage/images/' . $work->workImages[0]->image) }}" style="width:200px ;height:170px ;">
                            <a href="{{ asset('storage/images/' . $work->workImages[0]->image) }}" data-lightbox="project"></a>
                        </div> --}}

                        {{-- if this video work  --}}
                        <div class="position-relative mb-4 video works-btn-play">
                            <button type="button" class="btn-play works-btn-play">
                                <span></span>
                            </button>
                            <img class="img-fluid rounded" src="{{ asset('assets/img/pan1.png') }}" style="width:200px ;height:170px ;">
                            <a href="{{ asset('storage/images/' . $work->workImages[0]->image) }}" data-lightbox="project"></a>
                        </div>

                    </a>
                    @endisset
                    @isset($work->title)
                       <a href="{{route('singleProjects',$work->id)}}" target="_blank" rel="noopener noreferrer">
                        <h6>{{$work->title}}</h6></a>
                    @endisset
                    @isset($work->description)
                        <span class="descripton-work">{{$work->description}}</span>
                    @endisset
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Project End -->
