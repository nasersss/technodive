 <!-- Navbar Start -->
 <nav class="navbar navbar-expand-lg bg-primary navbar-dark sticky-top py-lg-0 px-lg-5 wow fadeIn" data-wow-delay="0.1s">
    <a href="#" class="navbar-brand ms-3 d-lg-none">
        <img class="img-fluid" src="{{asset('/assets/img/logo.jpg')}}" alt="Image" style="width: 66px;">
    </a>
    <button type="button" class="navbar-toggler ms-3" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav me-auto p-3 p-lg-0 w-100 navbar-nav-english">
            <a href="{{ route('index') }}" class="nav-item nav-link active"> {{__('navbar.home')}}</a>
            <a href="{{ route('about') }}" class="nav-item nav-link">{{__('navbar.about')}}</a>
            <a href="{{ route('services') }}" class="nav-item nav-link">{{__('navbar.services')}}</a>
            <a href="{{ route('projects') }}" class="nav-item nav-link">{{__('navbar.works')}}</a>
            <a href="{{ route('hardware') }}" class="nav-item nav-link">{{__('navbar.hardware')}}</a>
            {{-- <a href="{{ route('team') }}" class="nav-item nav-link">{{__('navbar.team')}}</a> --}}
            <a href="{{ route('ourExpertise') }}" class="nav-item nav-link">{{__('navbar.certificates')}}</a>
            <a href="{{ route('contact') }}" class="nav-item nav-link">{{__('navbar.contact')}}</a>
        </div>
        <div class="nav-item dropdown">

            @foreach (config('locales.languages') as $key => $val)
            @if ($key != app()->getLocale())
                <a href="{{ route('change.language', $key) }}"  class="nav-link dropdown-toggle">
                    {{ $val['name'] }}
                    {{-- <i class="fa-solid fa-language"></i> --}}
                </a>
            @endif
           @endforeach
        </div>

        <img class="img-fluid" src="{{asset('/assets/img/logo.jpg')}}" alt="Image" style="width: 66px;">
    </div>
</nav>
<!-- Navbar End -->
