@extends('landing.layout')

@section('title', __('navbar.contact') . ' · ' . __('landing.brand_short'))

@section('content')
    @include('landing.partials.page-hero', [
        'image' => asset('/assets/img/ta11.jpg'),
        'title' => __('navbar.contact'),
        'text' => __('landing.page_contact_text'),
    ])

    @include('landing.partials.contact', ['withMap' => true])
@endsection
