<!-- Testimonial Start -->
<div class="container-xxl py-5 direction-ltr">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="section-title bg-white text-center text-primary px-3">{{ __('navbar.testimonials') }}</h1>
            <!-- <h1 class="display-6 mb-4">ماذا قال عنا العملاء !</h1> -->
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
            @foreach ($customers as $customer)
                <div class="testimonial-item bg-light rounded p-4 direction-rtl">
                    <div class="d-flex align-items-center mb-4">
                        @isset($customer->image)
                            <img class="flex-shrink-0 rounded-circle border p-1" style="width: 60px;height:60px ;"
                                src="{{ asset('storage/images/' . $customer->image) }}" alt="">
                        @endisset
                        <div class="me-4 me-english-image">
                            @isset($customer->name)
                                <h6>{{ $customer->name }}</h6>
                            @endisset
                            @isset($customer->job)
                                <span>{{ $customer->job }}</span>
                            @endisset
                        </div>
                    </div>
                    @isset($customer->description)
                        <p class="mb-0">{{$customer->description}}</p>
                    @endisset

                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Testimonial End -->
