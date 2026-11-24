@extends('landing.layout')

@section('title', $work->title . ' · ' . __('landing.brand_short'))

@php
    $photos = $work->workImages;
    $cover = $photos->isNotEmpty() ? asset('storage/images/' . $photos->first()->image) : asset('/assets/img/wo1.jpg');
    $paragraphs = array_filter(preg_split('/\R+/u', trim((string) $work->description)), 'filled');
    $facts = array_filter([
        __('landing.fact_client') => $work->client,
        __('landing.fact_location') => $work->location,
        __('landing.fact_service') => $work->categoryLabel(),
        __($work->category === 'salvage' ? 'landing.fact_duration_salvage' : 'landing.fact_duration') => $work->duration,
    ], 'filled');
@endphp

@section('content')
    @include('landing.partials.page-hero', [
        'image' => $cover,
        'title' => $work->title,
        'crumbs' => [['url' => route('projects'), 'label' => __('landing.works')]],
    ])

    <section class="td-section td-project">
        <div class="td-container td-project__grid">
            <div class="td-project__main">
                @if ($paragraphs)
                    <div class="td-project__story" data-reveal>
                        <p class="td-eyebrow">{{ __('landing.project_story') }}</p>
                        @foreach ($paragraphs as $paragraph)
                            <p class="td-lead">{{ $paragraph }}</p>
                        @endforeach
                    </div>
                @endif

                @if ($photos->isNotEmpty())
                    <div class="td-gallery" data-reveal>
                        @foreach ($photos as $photo)
                            <a href="{{ asset('storage/images/' . $photo->image) }}" class="td-gallery__item" target="_blank" rel="noopener">
                                <img src="{{ asset('storage/images/' . $photo->image) }}" alt="{{ __('landing.project_photo', ['number' => $loop->iteration]) }}" loading="lazy">
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <aside class="td-facts" data-reveal>
                @if ($facts)
                    <dl class="td-facts__list">
                        @foreach ($facts as $label => $value)
                            <div class="td-facts__row">
                                <dt>{{ $label }}</dt>
                                <dd>{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>
                @endif
                <a href="{{ route('contact', ['subject' => $work->categoryLabel() ?? $work->title]) }}#contact" class="td-btn td-btn--amber td-btn--block">{{ __('landing.request_similar') }}</a>
            </aside>
        </div>
    </section>

    @if ($others->isNotEmpty())
        <section class="td-section">
            <div class="td-container">
                <p class="td-eyebrow" data-reveal>{{ __('landing.other_projects') }}</p>
                <div class="td-works__cards td-works__cards--three">
                    @foreach ($others as $other)
                        @include('landing.partials.work-card', ['work' => $other, 'showText' => false])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @include('landing.partials.cta')
@endsection
