@extends('frontend.layouts.master1')
@section('content')

@include('frontend.home-components.why-choose')

    @include('frontend.home-components.counter')
    @include('frontend.pages.chefs')
    @include('frontend.pages.menu-item')


    
@endsection