@extends('frontend.layout.base')

@section('title', 'Home')
@section('content')
    @include('frontend.components.slider')
    {{--    Banner--}}
    @include('frontend.components.banner')
    <!-- Product -->
    @include('frontend.components.products')

@endsection
