{{-- resources/views/home.blade.php --}}
@extends('layouts.app')

@section('title', 'Home | Shepherd Adventure Trekking')

@section('content')

    @include('includes.carousel')
    @include('includes.booking')
    @include('includes.about')
    @include('includes.feature')
    @include('includes.destination')
    @include('includes.service')
    @include('includes.packages')
    @include('includes.registration')
    @include('includes.team')
    @include('includes.testimonial')
    @include('includes.blog')

@endsection
