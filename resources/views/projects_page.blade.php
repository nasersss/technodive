@extends('landing.layout')

@section('title', __('landing.page_works_title') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/wo1.jpg'),
        'title' => __('landing.page_works_title'),
        'crumb' => __('landing.works'),
        'text' => __('landing.page_works_text'),
    ])

    <section class="td-section td-works-page">
        <div class="td-container">
            <div class="td-tabs" role="tablist" aria-label="{{ __('landing.works_filter') }}" data-reveal>
                <button type="button" role="tab" class="td-tab is-active" aria-selected="true" data-work-filter="all">{{ __('landing.filter_all') }}</button>
                @foreach (\App\Models\Work::CATEGORIES as $category)
                    <button type="button" role="tab" class="td-tab" aria-selected="false" data-work-filter="{{ $category }}">{{ __('landing.category_' . $category) }}</button>
                @endforeach
            </div>

            @if ($works->isNotEmpty())
                @include('landing.partials.work-card', ['work' => $works->first(), 'wide' => true])
            @endif

            @if ($works->count() > 1)
                <div class="td-works__cards">
                    @foreach ($works->slice(1) as $work)
                        @include('landing.partials.work-card', ['work' => $work])
                    @endforeach
                </div>
            @endif

            <p class="td-empty" data-filter-empty="data-work-filter" @if ($works->isNotEmpty()) hidden @endif>{{ __('landing.no_works') }}</p>
        </div>
    </section>

    <section class="td-section">
        <div class="td-container">
            @include('landing.partials.stats')
        </div>
    </section>

    @include('landing.partials.cta')
@endsection
