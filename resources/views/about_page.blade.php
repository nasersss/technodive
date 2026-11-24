@extends('landing.layout')

@section('title', __('navbar.about') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/ta6.jpg'),
        'title' => __('navbar.about'),
        'text' => __('landing.page_about_text'),
    ])

    @include('landing.partials.about', ['showMore' => false])

    <section class="td-section">
        <div class="td-container">
            @include('landing.partials.stats')
        </div>
    </section>

    @if ($teams->isNotEmpty())
        @include('landing.partials.team')
    @endif

    @if ($customers->isNotEmpty())
        @include('landing.partials.testimonials')
    @endif

    @include('landing.partials.cta')
@endsection
