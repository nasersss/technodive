<section class="td-section td-works" id="works">
    <div class="td-container">
        @include('landing.partials.section-head', [
            'eyebrow' => __('landing.works_eyebrow'),
            'title1' => __('landing.works_title_1'),
            'title2' => __('landing.works_title_2'),
            'text' => __('landing.works_text'),
        ])

        @php
            $featured = $works->first();
            $others = collect($works->items())->slice(1);
        @endphp

        <div class="td-works__grid">
            @if ($featured)
                <article class="td-work td-work--featured" data-reveal>
                    <a href="{{ route('singleProjects', $featured->id) }}" class="td-work__media" tabindex="-1" aria-hidden="true">
                        @isset($featured->workImages[0])
                            <img src="{{ asset('storage/images/' . $featured->workImages[0]->image) }}" alt="" loading="lazy">
                        @endisset
                    </a>
                    <div class="td-work__body">
                        <h3 class="td-work__title"><a href="{{ route('singleProjects', $featured->id) }}">{{ $featured->title }}</a></h3>
                        @if ($featured->description)
                            <p class="td-work__text">{{ $featured->description }}</p>
                        @endif
                        <a href="{{ route('singleProjects', $featured->id) }}" class="td-link">
                            {{ __('landing.project_details') }} @include('landing.partials.icon', ['name' => 'arrow', 'size' => 16, 'class' => 'td-flip'])
                        </a>
                    </div>
                </article>
            @endif

            @if ($others->isNotEmpty())
                <div class="td-works__list">
                    @foreach ($others as $work)
                        <article class="td-work td-work--row" data-reveal>
                            <a href="{{ route('singleProjects', $work->id) }}" class="td-work__media" tabindex="-1" aria-hidden="true">
                                @isset($work->workImages[0])
                                    <img src="{{ asset('storage/images/' . $work->workImages[0]->image) }}" alt="" loading="lazy">
                                @endisset
                            </a>
                            <div class="td-work__body">
                                <h3 class="td-work__title"><a href="{{ route('singleProjects', $work->id) }}">{{ $work->title }}</a></h3>
                                @if ($work->description)
                                    <p class="td-work__text td-clamp-2">{{ $work->description }}</p>
                                @endif
                                <a href="{{ route('singleProjects', $work->id) }}" class="td-link">
                                    {{ __('landing.project_details') }} @include('landing.partials.icon', ['name' => 'arrow', 'size' => 16, 'class' => 'td-flip'])
                                </a>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</section>
