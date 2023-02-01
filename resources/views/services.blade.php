<!-- Service Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="section-title bg-white text-center text-primary px-3">{{ __('navbar.services') }}</h1>
            <!-- <h1 class="display-6 mb-4">We Focuse On Making The Best In All Sectors</h1> -->
        </div>
        <div class="row g-4">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a class="service-item d-block rounded text-center h-100 p-4" href="{{ asset('storage/images/' . $service->image) }}">
                        @isset($service->image)
                        <img class="img-fluid rounded mb-4" src="{{ asset('storage/images/' . $service->image) }}"
                        style="width:300px ;height:240px">
                        @endisset
                        @isset($service->description)
                        <h4 class="mb-0">{{$service->description}}</h4>
                        @endisset
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Service End -->
