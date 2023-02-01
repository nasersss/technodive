<!-- our expertise Start -->
<div class="container-xxl px-0">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="section-title bg-white text-center text-primary px-3">{{ __('navbar.certificates') }}</h1>
        </div>
        <div class="nav nav-tabs nav-tabs-cef" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home1"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                {{ __('certificates.all') }}</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile"
                aria-selected="false">{{ __('certificates.Qualifications_certificates') }}</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact"
                aria-selected="false">{{ __('certificates.Appreciation_certificates') }}</button>
        </div>
        </nav>
        <div class="tab-content py-4" id="nav-tabContent">

            <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="row g-4">
                        @foreach ($certificates as $certificate)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="effect-4">
                                        <div class="effect-img">
                                            @isset($certificate->image)
                                                <img src="{{ asset('storage/images/' . $certificate->image) }}"
                                                    alt="Team Image">
                                            @endisset
                                        </div>
                                        <div class="effect-text">
                                            <div class="effect-text-inner">
                                                @isset($certificate->type)
                                                    <h2>{{ $certificate->type }}</h2>
                                                @endisset
                                                @isset($certificate->description)
                                                    <p>{{ $certificate->description }}</p>
                                                @endisset
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                </div>
            </div>


            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row g-4">
                    @foreach ($certificates as $certificate)
                        @if ($certificate->getTranslations('type')['ar'] == 'مؤهل')
                            <div class="col-lg-4 col-md-6 fadeInUp" >
                                <div class="effect-4">
                                    <div class="effect-img">
                                        @isset($certificate->image)
                                            <img src="{{ asset('storage/images/' . $certificate->image) }}"
                                                alt="Team Image">
                                        @endisset
                                    </div>
                                    <div class="effect-text">
                                        <div class="effect-text-inner">
                                            @isset($certificate->type)
                                                <h2>{{ $certificate->type }}</h2>
                                            @endisset
                                            @isset($certificate->description)
                                                <p>{{ $certificate->description }}</p>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>


            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row g-4">
                    @foreach ($certificates as $certificate)
                        @if ($certificate->type == 'Appreciation' || $certificate->type == 'تقدير')
                            <div class="col-lg-4 col-md-6 fadeInUp" >
                                <div class="effect-4">
                                    <div class="effect-img">
                                        @isset($certificate->image)
                                            <img src="{{ asset('storage/images/' . $certificate->image) }}"
                                                alt="Team Image">
                                        @endisset
                                    </div>
                                    <div class="effect-text">
                                        <div class="effect-text-inner">
                                            @isset($certificate->type)
                                                <h2>{{ $certificate->type }}</h2>
                                            @endisset
                                            @isset($certificate->description)
                                                <p>{{ $certificate->description }}</p>
                                            @endisset
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>

    </div>
    <!-- our expertise End -->
