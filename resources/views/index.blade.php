@extends('master')

@section('content')

@include('carousel')
@include('facts')
@include('about')
@include('video')
@isset($services)
@include('services')
@endisset
@isset($works)
@include('projects')
@endisset
@isset($equipments)
@include('hardware')
@endisset
@isset($teams)
@include('team')
@endisset
@isset($certificates)
@include('our-expertise')
@endisset
@isset($customers)
@include('testimonial')
@endisset
@include('contact')
@endsection
