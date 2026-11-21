<footer class="td-footer">
    <div class="td-container">
        <div class="td-footer__grid">
            <div class="td-footer__brand">
                <img src="{{ asset('/assets/img/logo.jpg') }}" alt="{{ __('landing.brand_short') }}" width="72" height="72" loading="lazy">
                <p>{{ __('landing.footer_about') }}</p>
                <ul class="td-socials">
                    <li><a href="#" aria-label="X">X</a></li>
                    <li><a href="#" aria-label="Facebook">f</a></li>
                    <li><a href="#" aria-label="YouTube">&#9654;</a></li>
                    <li><a href="#" aria-label="LinkedIn">in</a></li>
                </ul>
            </div>

            <div class="td-footer__col">
                <h2 class="td-footer__title">{{ __('landing.quick_links') }}</h2>
                <ul>
                    <li><a href="{{ route('index') }}">{{ __('landing.home') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('navbar.about') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('navbar.services') }}</a></li>
                    <li><a href="{{ route('projects') }}">{{ __('landing.works') }}</a></li>
                    <li><a href="{{ route('hardware') }}">{{ __('navbar.hardware') }}</a></li>
                    <li><a href="{{ route('ourExpertise') }}">{{ __('landing.certificates') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('navbar.contact') }}</a></li>
                </ul>
            </div>

            @if (isset($services) && count($services))
                <div class="td-footer__col">
                    <h2 class="td-footer__title">{{ __('landing.our_services') }}</h2>
                    <ul>
                        @foreach ($services->take(5) as $service)
                            <li><a href="{{ route('services') }}">{{ $service->title ?: $service->description }}</a></li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="td-footer__col">
                <h2 class="td-footer__title">{{ __('landing.contact_us') }}</h2>
                <ul>
                    <li>{{ __('landing.address') }}</li>
                    <li><a href="tel:+967733899087" dir="ltr">+967 733 899 087</a></li>
                    <li><a href="tel:+967777375652" dir="ltr">+967 777 375 652</a></li>
                    <li><a href="mailto:saeed78ba@yahoo.com">saeed78ba@yahoo.com</a></li>
                </ul>
                @if (isset($certificates) && count($certificates))
                    <div class="td-footer__thumbs">
                        @foreach ($certificates as $certificate)
                            @if ($certificate->image)
                                <a href="{{ route('ourExpertise') }}" aria-label="{{ __('landing.certificates') }}">
                                    <img src="{{ asset('storage/images/' . $certificate->image) }}" alt="" loading="lazy">
                                </a>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="td-footer__bottom">
            <p>&copy; {{ date('Y') }} {{ __('landing.copyright') }}</p>
            <p dir="ltr">{{ __('landing.tagline') }}</p>
        </div>
    </div>
</footer>
