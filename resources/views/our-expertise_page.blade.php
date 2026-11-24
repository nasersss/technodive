@extends('landing.layout')

@section('title', __('landing.certificates') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/ta5.jpg'),
        'title' => __('landing.certificates'),
        'text' => __('landing.page_certificates_text'),
    ])

    @if ($certificates->isNotEmpty())
        @include('landing.partials.certificates', ['withHead' => false])
    @endif

    @include('landing.partials.cta')
@endsection
