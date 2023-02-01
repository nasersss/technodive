<!-- Contact Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
            <h1 class="section-title bg-white text-center text-primary px-3">{{__('navbar.contact')}}</h1>
        </div>
        <div class="row g-0 justify-content-center">
            <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                <form method="POST" action="{{ route('contact_us_store') }}" id="form"class="form-disable" >
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control"name="name" id="name" placeholder="{{__('contact.name')}}">
                                <label for="name">{{__('contact.name')}}</label>
                            </div>
                            @error('name')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="email" class="form-control"name="email" id="email" placeholder="{{__('contact.email')}}">
                                <label for="email">{{__('contact.email')}}</label>
                                @error('email')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control"name="subject" id="subject" placeholder="{{__('contact.subject')}}">
                                <label for="subject">{{__('contact.subject')}}</label>
                                @error('subject')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" name="message" id="message" style="height: 200px"></textarea>
                                <label for="message">{{__('contact.massege')}}</label>
                                @error('message')
                                <div class="text-danger px-2 showModalAdd ">
                                    {{ $message }}
                                </div>
                            @enderror
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-primary rounded-pill py-3 px-5 form-btn-disable" type="submit">{{__('contact.button')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
