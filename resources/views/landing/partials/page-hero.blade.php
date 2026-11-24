{{-- Inner page cover.
     $image: full URL of the background photo · $title · optional $text
     optional $crumb: label of the current page in the breadcrumb (defaults to $title)
     optional $crumbs: [['url' => ..., 'label' => ...]] between «Home» and the current page --}}
<section class="td-page-hero-wrap">
    <div class="td-container">
        <div class="td-page-hero">
            <img class="td-page-hero__img" src="{{ $image }}" alt="" fetchpriority="high">
            <div class="td-page-hero__content">
                <nav class="td-crumbs" aria-label="{{ __('landing.breadcrumb') }}">
                    <ol>
                        <li><a href="{{ route('index') }}">{{ __('landing.home') }}</a></li>
                        @foreach ($crumbs ?? [] as $link)
                            <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
                        @endforeach
                        <li aria-current="page">{{ $crumb ?? $title }}</li>
                    </ol>
                </nav>
                <h1 class="td-page-hero__title">{{ $title }}</h1>
                @isset($text)
                    <p class="td-page-hero__text">{{ $text }}</p>
                @endisset
            </div>
        </div>
    </div>
</section>
