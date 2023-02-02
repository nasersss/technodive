<!-- Team Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="section-title bg-white text-center text-primary px-3">{{ __('navbar.team') }}</h1>
            <!-- <h1 class="display-6 mb-4">We Are A Creative Team For Your Dream Project</h1> -->
        </div>
        <div class="row g-4">
            @foreach ($teams as $team)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item text-center p-4">
                        @isset($team->image)
                            <img class="img-fluid border rounded-circle  p-2 mb-4" style="width: 230px;height:30px ;"
                                src="{{ asset('storage/images/' . $team->image) }}" alt="">
                        @endisset
                        <div class="team-text">
                            <div class="">
                                @isset($team->name)
                                    <h6>{{ $team->name }}</h6>
                                @endisset
                                @isset($team->job)
                                    <span>{{ $team->job }}</span>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Team End -->
