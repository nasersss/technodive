@php
    $navLinks = [
        ['route' => 'index', 'label' => __('landing.home')],
        ['route' => 'about', 'label' => __('navbar.about')],
        ['route' => 'services', 'label' => __('navbar.services')],
        ['route' => 'projects', 'label' => __('landing.works'), 'also' => 'singleProjects'],
        ['route' => 'hardware', 'label' => __('navbar.hardware')],
        ['route' => 'ourExpertise', 'label' => __('landing.certificates')],
        ['route' => 'contact', 'label' => __('navbar.contact')],
    ];
    $otherLocales = collect(config('locales.languages'))->except(app()->getLocale());
    // On the home page the quote button scrolls to the contact form; elsewhere it opens the contact page
    $quoteUrl = request()->routeIs('index') ? '#contact' : route('contact');
@endphp
<header class="td-header" data-header>
    <div class="td-container td-header__bar">
        <a href="{{ route('index') }}" class="td-header__logo" aria-label="{{ __('landing.brand') }}">
            <img src="{{ asset('/assets/img/logo.jpg') }}" alt="{{ __('landing.brand_short') }}" width="48" height="48">
        </a>

        <nav class="td-nav" aria-label="{{ __('landing.menu') }}">
            <ul class="td-nav__list">
                @foreach ($navLinks as $link)
                    @php $active = request()->routeIs($link['route'], $link['also'] ?? $link['route']); @endphp
                    <li>
                        <a href="{{ route($link['route']) }}" @class(['td-nav__link', 'is-active' => $active])
                            @if ($active) aria-current="page" @endif>{{ $link['label'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <div class="td-header__actions">
            @foreach ($otherLocales as $key => $lang)
                <a href="{{ route('change.language', $key) }}" class="td-round-btn td-round-btn--text" hreflang="{{ $key }}" lang="{{ $key }}" title="{{ $lang['name'] }}">{{ $key === 'en' ? 'EN' : 'ع' }}</a>
            @endforeach
            <button type="button" class="td-round-btn td-theme-toggle" data-theme-toggle aria-label="{{ __('landing.toggle_theme') }}">
                @include('landing.partials.icon', ['name' => 'sun', 'class' => 'td-theme-toggle__sun', 'size' => 18])
                @include('landing.partials.icon', ['name' => 'moon', 'class' => 'td-theme-toggle__moon', 'size' => 18])
            </button>
            <a href="{{ $quoteUrl }}" class="td-btn td-btn--amber td-header__cta">{{ __('landing.request_quote') }}</a>
            <button type="button" class="td-round-btn td-round-btn--dark td-menu-btn" data-menu-open aria-controls="td-drawer" aria-expanded="false" aria-label="{{ __('landing.menu') }}">
                @include('landing.partials.icon', ['name' => 'menu', 'size' => 20])
            </button>
        </div>
    </div>
</header>

{{-- Mobile / tablet menu. Kept outside <header>: the header's backdrop-filter makes it the
     containing block of position:fixed children, which clipped the menu to the header's height. --}}
@include('landing.partials.drawer', ['navLinks' => $navLinks, 'quoteUrl' => $quoteUrl])
