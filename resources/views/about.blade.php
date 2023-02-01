 <!-- About Start -->
 <div class="container-xxl py-5">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="img-border">
                    <img class="img-fluid" src="{{asset('/assets/img/ta6.jpg')}}" alt="Image">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp text-english-align" data-wow-delay="0.5s">
                <div class="h-100">
                    <h1 class="section-title bg-white text-start text-primary ps-3 section-title-about text-english-align">{{__('navbar.about')}}</h1>
                    <h4 class="display-6 mb-4 text-english-align">
                        {{__('about.title')}}
                         <span class="text-primary">
                            {{__('about.spcelTitle')}}
                         </span>
                        </h4>
                    <p class="text-english-align">
                        {{__('about.sentenceOne')}}
                     </p>
                    <p class="mb-4 text-english-align">
                        {{__('about.sentenceTow')}}
                    </p>
                    <a class="btn btn-primary rounded-pill py-3 px-5" href="{{ route('about') }}">
                        {{__('about.buttonTitle')}}
                    </a>
                </div>
            </div>
        </div>
    </div>
 </div>
<!-- About End -->
