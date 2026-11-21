<section class="td-section td-about" id="about">
    <div class="td-container td-about__grid">
        <div class="td-about__media" data-reveal>
            <figure class="td-about__main">
                <img src="{{ asset('/assets/img/ta6.jpg') }}" alt="{{ __('landing.about_title_1') }}" loading="lazy" width="1440" height="1080">
            </figure>
            <figure class="td-about__sub">
                <img src="{{ asset('/assets/img/ta5.jpg') }}" alt="" loading="lazy" width="960" height="720">
            </figure>
            <div class="td-about__badge">
                <strong>2007</strong>
                <span>{{ __('landing.office_opened') }}</span>
            </div>
        </div>

        <div class="td-about__body">
            <div data-reveal>
                <p class="td-eyebrow">{{ __('landing.about_eyebrow') }}</p>
                <h2 class="td-title">{{ __('landing.about_title_1') }}<br>{{ __('landing.about_title_2') }}</h2>
                <p class="td-lead">{{ __('landing.about_p1') }}</p>
                <p class="td-lead">{{ __('landing.about_p2') }}</p>
            </div>

            @php
                $features = [
                    ['icon' => 'shield', 'title' => __('landing.feature_license'), 'text' => __('landing.feature_license_text')],
                    ['icon' => 'gear', 'title' => __('landing.feature_equipment'), 'text' => __('landing.feature_equipment_text')],
                    ['icon' => 'award', 'title' => __('landing.feature_record'), 'text' => __('landing.feature_record_text')],
                ];
            @endphp
            <ul class="td-features">
                @foreach ($features as $feature)
                    <li class="td-feature" data-reveal>
                        <span class="td-feature__icon">@include('landing.partials.icon', ['name' => $feature['icon'], 'size' => 20])</span>
                        <span class="td-feature__text">
                            <strong>{{ $feature['title'] }}</strong>
                            <span>{{ $feature['text'] }}</span>
                        </span>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('about') }}" class="td-btn td-btn--amber td-btn--lg">{{ __('landing.read_more_about') }}</a>
        </div>
    </div>
</section>
