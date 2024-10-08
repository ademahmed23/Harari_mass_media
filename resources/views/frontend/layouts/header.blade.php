@php
    $languages = \App\Models\Language::where('status', 1)->get();
    $FeaturedCategories = \App\Models\Category::where([
        'status' => 1,
        'language' => getLangauge(),
        'show_at_nav' => 1,
    ])->get();
    $categories = \App\Models\Category::where(['status' => 1, 'language' => getLangauge(), 'show_at_nav' => 0])->get();
@endphp

<header class="bg-light">
    <!-- Navbar Top -->
    <div class="topbar d-none d-sm-block">
        <div class="container">
            <div class="row">
                <div class="col-sm-1 col-md-6">
                    <div class="topbar-left topbar-right d-flex">
                        <ul class="topbar-sosmed p-0">
                            @foreach ($socialLinks as $link)
                                <li>
                                    <a href="{{ $link->url }}"><i class="{{ $link->icon }}"></i></a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="topbar-text">
                            {{ date('l, F j, Y') }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="list-unstyled topbar-right d-flex align-items-center justify-content-end">
                        <div class="topbar_language">
                            <select id="site-language">
                                @foreach ($languages as $language)
                                    <option value="{{ $language->lang }}"
                                        {{ getLangauge() === $language->lang ? 'selected' : '' }}>{{ $language->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <ul class="topbar-link">
                            @if (!auth()->check())
                                <li><a href="{{ route('login') }}">{{ __('frontend.Login') }}</a></li>
                                <li><a href="{{ route('register') }}">{{ __('frontend.Register') }}</a></li>
                            @else
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a onclick="event.preventDefault(); this.closest('form').submit();"
                                            href="{{ route('register') }}">{{ __('frontend.Logout') }}</a></li>
                                </form>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar Top -->

    <!-- Navbar -->
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <figure class="mb-0">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset($settings['site_logo']) }}" alt="Logo" class="img-fluid logo">
                    </a>
                </figure>
                {{-- <h4 style="color: rgba(14, 192, 165, 0.92)">Harari TV</h4> --}}


                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </div>

    <style>
        .logo-container {
            display: flex;
            align-items: center;
        }

        .logo-container figure {
            margin-right: 10px;
            /* Adjust as needed */
        }

        .offcanvas-header {
            margin-left: ;
            /* Ensures it is aligned to the right */
        }

        .home-link {
            color: white;
            text-decoration: none;
            /* Optional: Remove underline */
        }

        .home-link:hover {
            color: #ffcc00;
            /* Change to the desired color on hover */
        }

        .navbar-nav .nav-link:hover {
            color: black;
        }

        .circular-img {
            border-radius: 5%;
            /* object-fit: cover; */
        }

        .hidden {
            display: none;
        }
    </style>

    <div class="navigation-wrap navigation-shadow">
        <nav class="navbar navbar-hover navbar-expand-md navbar-soft" style="background-color: #2ea8b4;">
            <div class="container">

                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">


                    <ul class="navbar-nav ml-auto" style="margin-left: auto;">
                        <li class="nav-item">
                            <a class="nav-link home-link" href="{{ route('aboutindex') }}"
                                style="color: white;">{{ __('frontend.Home') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}"
                                style="color: white;">{{ __('frontend.News') }}</a>
                        </li>
                        @foreach ($FeaturedCategories as $category)
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ route('news', ['category' => $category->slug]) }}"
                                    style="color: white;">{{ $category->name }}</a>
                            </li>
                        @endforeach
                        @if (count($categories) > 0)
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                    style="color: white;">{{ __('More News') }}</a>
                                <ul class="dropdown-menu dropdown-menu-right animate fade-up">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a class="dropdown-item icon-arrow"
                                                href="{{ route('news', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                style="color: white;">{{ __('Harari') }}</a>
                            <ul class="dropdown-menu dropdown-menu-right animate fade-up">
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="{{ route('aboutindex') }}">{{ __('About Harari People') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="{{ route('chef') }}">{{ __('Our Journalist') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="{{ route('index') }}">{{ __('frontend.Faqs') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="https://www.visitharar.org.et/">{{ __('Visit Harari') }}</a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
                                style="color: white;">{{ __('frontend.More') }}</a>
                            <ul class="dropdown-menu dropdown-menu-right animate fade-up">
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="{{ route('privacy-policy') }}">{{ __('Privacy Policies') }}</a>
                                </li>
                                <li>
                                    <a class="dropdown-item icon-arrow"
                                        href="{{ route('terms-and-condition') }}">{{ __('Terms And Condition') }}</a>
                                </li>
                                {{-- <li>
                                    <a class="dropdown-item icon-arrow" href="{{route('about')}}">{{__('City Mayor')}}</a>
                                </li> --}}
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}"
                                style="color: white;">{{ __('frontend.About Us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}"
                                style="color: white;">{{ __('frontend.contact') }}</a>
                        </li>
                    </ul>

                    <!-- Search bar -->
                    <ul class="navbar-nav">
                        <li class="nav-item search hidden-xs hidden-sm">
                            <a class="nav-link" href="#"><i class="fa fa-search"
                                    style="color: white;"></i></a>
                        </li>
                    </ul>

                    <!-- Search content bar -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group">
                                <form action="{{ route('news') }}" method="GET">
                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Search"
                                                id="example-search-input4" name="search">
                                        </div>
                                        <div class="col-auto">
                                            <button type="submit"
                                                class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Search content bar -->
                </div>
            </div>
        </nav>
    </div>

    <!-- Navbar sidebar menu for mobile -->
    <div class="modal fade left" id="modal_aside_left" tabindex="-1" role="dialog"
        aria-labelledby="modal_aside_left_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('frontend.menu') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="nav flex-column">
                        <a class="nav-item nav-link active" href="{{ url('/') }}">{{ __('frontend.Home') }}</a>
                        <a class="nav-item nav-link" href="{{ route('about') }}">{{ __('frontend.About Us') }}</a>
                        <a class="nav-item nav-link" href="{{ route('contact') }}">{{ __('frontend.contact') }}</a>
                        @foreach ($FeaturedCategories as $category)
                            <a class="nav-item nav-link"
                                href="{{ route('news', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        @endforeach
                        @foreach ($categories as $category)
                            <a class="nav-item nav-link"
                                href="{{ route('news', ['category' => $category->slug]) }}">{{ $category->name }}</a>
                        @endforeach
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar sidebar menu -->

    <!-- Include jQuery, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom script to ensure dropdowns work on mobile -->
    <script>
        $(document).ready(function() {
            $('.navbar .dropdown').on('show.bs.dropdown', function() {
                var $dropdownMenu = $(this).find('.dropdown-menu');
                if ($(window).width() < 992) {
                    $dropdownMenu.css('top', '0');
                } else {
                    $dropdownMenu.css('top', '');
                }
            });

            $('.navbar .dropdown').on('hide.bs.dropdown', function() {
                $(this).find('.dropdown-menu').css('top', '');
            });

            // Additional script to ensure dropdowns work on mobile
            $('.dropdown-toggle').click(function() {
                var $el = $(this).next('.dropdown-menu');
                var isVisible = $el.is(':visible');
                $('.dropdown-menu').not($el).hide();
                if (isVisible) {
                    $el.hide();
                } else {
                    $el.show();
                }
            });

            $(document).click(function(e) {
                if (!$(e.target).closest('.dropdown').length) {
                    $('.dropdown-menu').hide();
                }
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var figure = document.getElementById('logo-figure');
            var lastScrollTop = 0;
            var scrollingUp = false;

            window.addEventListener('scroll', function() {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

                if (scrollTop > lastScrollTop) {
                    // Scrolling down
                    if (scrollingUp) {
                        figure.classList.remove('hidden');
                        scrollingUp = true;
                    }

                } else {
                    // Scrolling up
                    figure.classList.add('hidden');
                    scrollingUp = true;
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
            });
        });
    </script>
</header>
