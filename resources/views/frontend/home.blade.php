@extends('frontend.layouts.master')

@section('content')
    <!-- breaking news  carousel-->
    {{-- @include('frontend.pages.menu-item') --}}
    @include('frontend.home-components.breaking-news')
    <!-- End breaking news carousel -->

    <!-- Hero news Secion-->
    @include('frontend.home-components.hero-slider')
    {{-- @include('frontend.pages.about') --}}

    <!-- End Hero news Section-->
    @if ($ad->home_top_bar_ad_status == 1)
    <a href="{{ $ad->home_top_bar_ad_url }}">
        <div class="large_add_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="large_add_banner_img">
                            <img src="{{ $ad->home_top_bar_ad }}" alt="adds">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
    @endif 
    <!-- Popular news category -->
    @include('frontend.home-components.main-news')
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css"> --}}
    <script>
        var botmanWidget = {
            aboutText: 'Start the conversation with Hi',
            introMessage: "WELCOME TO ALL ABOUT LARAVEL"
        };
    </script>
   
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    

  
@endsection
