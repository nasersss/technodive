@extends('landing.layout')

@section('title', __('landing.meta_title'))

@section('content')
    @include('landing.partials.hero')
    @include('landing.partials.about')

    @if (isset($services) && count($services))
        @include('landing.partials.services')
    @endif

    @if (isset($works) && count($works))
        @include('landing.partials.works')
    @endif

    @if (isset($equipments) && count($equipments))
        @include('landing.partials.equipment')
    @endif

    @if (isset($teams) && count($teams))
        @include('landing.partials.team')
    @endif

    @if (isset($certificates) && count($certificates))
        @include('landing.partials.certificates')
    @endif

    @if (isset($customers) && count($customers))
        @include('landing.partials.testimonials')
    @endif

    @include('landing.partials.contact')
@endsection
