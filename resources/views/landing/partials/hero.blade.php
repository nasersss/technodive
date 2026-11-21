@php
    $slides = [
        ['image' => 'ta10.jpg', 'label' => __('sectionslider.setenceTow')],
        ['image' => 'wo1.jpg', 'label' => __('sectionslider.setenceThree')],
        ['image' => 'se1.jpg', 'label' => __('sectionslider.setenceOne')],
        ['image' => 'ta5.jpg', 'label' => __('sectionslider.setenceFour')],
    ];
    $latestWork = isset($works) ? $works->first() : null;
@endphp
<section class="td-hero-wrap" id="top">
    <div class="td-container">
        <div class="td-hero" data-hero>
            <div class="td-hero__media" aria-hidden="true">
                @foreach ($slides as $i => $slide)
                    <img src="{{ asset('/assets/img/' . $slide['image']) }}" alt="" @class(['td-hero__img', 'is-active' => $i === 0])
                        data-hero-slide="{{ $i }}" @if ($i > 0) loading="lazy" @endif fetchpriority="{{ $i === 0 ? 'high' : 'low' }}">
                @endforeach
            </div>

            {{-- decorative depth gauge (desktop) --}}
            <div class="td-hero__gauge" aria-hidden="true">
                <span>M 0</span><i></i><b data-hero-gauge></b><span>M 50</span>
            </div>

            <div class="td-hero__content">
                <p class="td-eyebrow td-eyebrow--light">{{ __('landing.hero_eyebrow') }}</p>
                <h1 class="td-hero__title">
                    {{ __('landing.hero_title_start') }}
                    <span class="td-hero__highlight">{{ __('landing.hero_title_highlight') }}</span><br>
                    {{ __('landing.hero_title_end') }}
                </h1>
                <p class="td-hero__text">{{ __('landing.hero_text') }}</p>
                <div class="td-hero__actions">
                    <a href="#contact" class="td-btn td-btn--amber td-btn--lg">{{ __('landing.request_quote') }}</a>
                    <a href="#works" class="td-btn td-btn--ghost-light td-btn--lg">{{ __('landing.see_works') }}</a>
                </div>
            </div>

            @if ($latestWork)
                <a href="{{ route('singleProjects', $latestWork->id) }}" class="td-hero__latest">
                    <span class="td-hero__latest-label">{{ __('landing.latest_work') }}</span>
                    <strong class="td-hero__latest-title">{{ $latestWork->title }}</strong>
                    <span class="td-hero__latest-body">
                        @if ($latestWork->description)
                            <span class="td-hero__latest-text">{{ \Illuminate\Support\Str::limit($latestWork->description, 70) }}</span>
                        @endif
                        @isset($latestWork->workImages[0])
                            <img src="{{ asset('storage/images/' . $latestWork->workImages[0]->image) }}" alt="" loading="lazy">
                        @endisset
                    </span>
                </a>
            @endif

            <div class="td-hero__chips" role="tablist" aria-label="{{ __('landing.hero_eyebrow') }}">
                @foreach ($slides as $i => $slide)
                    <button type="button" role="tab" @class(['td-chip', 'is-active' => $i === 0]) data-hero-chip="{{ $i }}"
                        aria-selected="{{ $i === 0 ? 'true' : 'false' }}" aria-label="{{ $slide['label'] }}">
                        <span class="td-num">{{ sprintf('%02d', $i + 1) }}</span>
                        <span class="td-chip__label">{{ $slide['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>

        {{-- Stats --}}
        <div class="td-stats">
            @php
                $stats = [
                    ['value' => 20, 'plus' => true, 'label' => __('landing.stat_years')],
                    ['value' => 11, 'plus' => false, 'label' => __('landing.stat_team')],
                    ['value' => 50, 'plus' => true, 'label' => __('landing.stat_clients')],
                    ['value' => 100, 'plus' => true, 'label' => __('landing.stat_works')],
                ];
            @endphp
            @foreach ($stats as $i => $stat)
                <div @class(['td-stat', 'td-stat--accent' => $i === 0]) data-reveal>
                    <p class="td-stat__value"><span data-count="{{ $stat['value'] }}">{{ $stat['value'] }}</span>@if ($stat['plus'])<span class="td-stat__plus">+</span>@endif</p>
                    <p class="td-stat__label">{{ $stat['label'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
