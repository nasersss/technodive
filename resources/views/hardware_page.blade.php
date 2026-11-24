@extends('landing.layout')

@section('title', __('navbar.hardware') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/se1.jpg'),
        'title' => __('navbar.hardware'),
        'text' => __('landing.page_equipment_text'),
    ])

    @if ($equipments->isNotEmpty())
        @include('landing.partials.equipment', ['withHead' => false, 'layout' => 'rows'])
    @endif

    @if ($customers->isNotEmpty())
        @include('landing.partials.testimonials')
    @endif

    @include('landing.partials.cta')
@endsection
