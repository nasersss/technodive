 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-body footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">{{__('navbar.contact')}}</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt ms-3 me-english-1"></i>{{__('footer.addrass')}}</p>
                <p class="mb-2"><i class="fa fa-phone-alt ms-3 me-english-1"></i>+967 733899087 |  +967 777375652</p>
                <p class="mb-2"><i class="fa fa-envelope ms-3 me-english-1"></i>saeed78ba@yahoo.com</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-1 ms-1-english " href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-1 " href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-1 " href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-outline-secondary rounded-circle ms-0 ms-0-english" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 direction-rtl">
                <h5 class="text-light mb-4">{{__('footer.title_links')}}</h5>
                <a href="{{ route('about') }}" class="btn btn-link">{{__('navbar.about')}}</a>
                <a href="{{ route('services') }}" class="btn btn-link">{{__('navbar.services')}}</a>
                <a href="{{ route('projects') }}" class="btn btn-link">{{__('navbar.works')}}</a>
                <a href="{{ route('hardware') }}" class="btn btn-link">{{__('navbar.hardware')}}</a>
                <a href="{{ route('team') }}" class="btn btn-link">{{__('navbar.team')}}</a>
                <a href="{{ route('ourExpertise') }}" class="btn btn-link">{{__('navbar.certificates')}}</a>
                <a href="{{ route('testimonial') }}" class="btn btn-link">{{__('navbar.testimonials')}}</a>

            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">{{__('navbar.certificates')}}</h5>
                <div class="row g-2">
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo1.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo2.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo3.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo3.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo2.jpg')}}" alt="Image">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded" src="{{asset('/assets/img/wo2.jpg')}}" alt="Image">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-light mb-4">{{__('footer.news')}}</h5>
                <p>{{__('footer.text')}}</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent border-secondary w-100 py-3  " type="text" placeholder="{{__('contact.email')}}">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 start-0 mt-2 ms-2 end-english">{{__('footer.Sign_Up')}}</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-end text-md-end-english mb-3 mb-md-0">
                    &copy; <a href="#"> {{__('footer.All_Right')}} </a>, {{__('sectionslider.nameCompany')}} .
                </div>
                <div class="col-md-6 text-center text-md-start text-md-start-english">
                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    {{__('footer.Designed')}}<a href="https://goupdev.net" > {{__('footer.Designed_by')}}</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/assets/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('/assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('/assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('/assets/lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('/assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('/assets/lib/lightbox/js/lightbox.min.js')}}"></script>
<script src="{{asset('/js/form/submit-disable.js')}}"> </script>

<!-- Template Javascript -->
<script src="{{asset('/assets/js/main.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('/js/toastr/toastr.min.js')}}"></script>

<!-- All init script -->
<script src="{{asset('/js/toastr/toastr-init.js')}}"></script>
</body>

</html>
