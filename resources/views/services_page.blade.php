@extends('landing.layout')

@section('title', __('landing.services_eyebrow') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/ta10.jpg'),
        'title' => __('landing.services_eyebrow'),
        'crumb' => __('navbar.services'),
        'text' => __('landing.page_services_text'),
    ])

    @if ($services->isNotEmpty())
        @include('landing.partials.services', ['page' => true])
    @endif

    @if ($equipments->isNotEmpty())
        @include('landing.partials.equipment', ['layout' => 'two'])
    @endif

    @include('landing.partials.cta')
@endsection
