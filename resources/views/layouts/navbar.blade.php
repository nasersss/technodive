 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">MENU</a>
    <button type="button" class="navbar-toggler me-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0 w-100">
            <a href="{{ route('index') }}" class="nav-item nav-link active">الرائيسية</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">من نحن</a>
            <a href="{{ route('services') }}" class="nav-item nav-link">الخدمات</a>
            <a href="{{ route('projects') }}" class="nav-item nav-link">الاعمال</a>
            <!-- <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu border-0 rounded-0 rounded-bottom m-0">
                    <a href="feature.html" class="dropdown-item">Features</a>
                    <a href="team.html" class="dropdown-item">فريقنا</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                    <a href="404.html" class="dropdown-item">404 Page</a>
                </div>
            </div> -->
            <a href="#" class="nav-item nav-link">المعدات</a>
            <a href="{{ route('team') }}" class="nav-item nav-link">فريقنا</a>
            <a href="#" class="nav-item nav-link">الشهادات</a>
            <a href="{{ route('testimonial') }}" class="nav-item nav-link">اراء العملاء</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">اتصل بنا</a>
        </div>
        <img class="img-fluid" src="{{asset('/assets/img/logo.jpg')}}" alt="Image" style="width: 66px;">
    </div>
</nav>
<!-- Navbar End -->
