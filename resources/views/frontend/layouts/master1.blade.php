<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@hasSection('title') @yield('title') @else {{ $settings['site_seo_title'] }} @endif </title>
    <meta name="description" content="@hasSection('meta_description') @yield('meta_description') @else {{ $settings['site_seo_description'] }} @endif " />
    <meta name="keywords" content="{{ $settings['site_seo_keywords'] }}" />

    <meta name="og:title" content="@yield('meta_og_title')" />
    <meta name="og:description" content="@yield('meta_og_description')" />
    <meta name="og:image" content="@hasSection('meta_og_image') @yield('meta_og_image') @else {{ asset($settings['site_logo']) }} @endif" />
    <meta name="twitter:title" content="@yield('meta_tw_title')" />
    <meta name="twitter:description" content="@yield('meta_tw_description')" />
    <meta name="twitter:image" content="@yield('meta_tw_image')" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset($settings['site_favicon']) }}" type="image/png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="icon" type="image/png" href="{{ asset(config('settings.favicon')) }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <style>
        :root {
            --colorPrimary: {{ $settings['site_color'] }};
        }
    </style>
</head>

<body>

    <!-- Global Variables -->
    @php
        $socialLinks = \App\Models\SocialLink::where('status', 1)->get();
        $footerInfo = \App\Models\FooterInfo::where('language', getLangauge())->first();
        $footerGridOne = \App\Models\FooterGridOne::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridTwo = \App\Models\FooterGridTwo::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridThree = \App\Models\FooterGridThree::where(['status' => 1, 'language' => getLangauge()])->get();
        $footerGridOneTitle = \App\Models\FooterTitle::where(['key' => 'grid_one_title', 'language' => getLangauge()])->first();
        $footerGridTwoTitle = \App\Models\FooterTitle::where(['key' => 'grid_two_title', 'language' => getLangauge()])->first();
        $footerGridThreeTitle = \App\Models\FooterTitle::where(['key' => 'grid_three_title', 'language' => getLangauge()])->first();
    @endphp

    <!-- Header news -->
    @include('frontend.layouts.header2')
    <!-- End Header news -->

    {{-- @yield('content') --}}
    @yield('content')


    <!-- Footer Section -->
    @include('frontend.layouts.footer')
    <!-- End Footer Section -->


    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
    @include('sweetalert::alert')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        })


        // Add csrf token in ajax request
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            /** change language **/
            $('#site-language').on('change', function() {
                let languageCode = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('language') }}",
                    data: {
                        language_code: languageCode
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            window.location.href = "{{ url('/') }}";
                        }
                    },
                    error: function(data) {
                        console.error(data);
                    }
                })
            })

            /** Subscribe Newsletter**/
            $('.newsletter-form').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: "{{ route('subscribe-newsletter') }}",
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.newsletter-button').text('loading...');
                        $('.newsletter-button').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            Toast.fire({
                                icon: 'success',
                                title: data.message
                            })
                            $('.newsletter-form')[0].reset();
                            $('.newsletter-button').text('sign up');

                            $('.newsletter-button').attr('disabled', false);
                        }
                    },
                    error: function(data) {
                        $('.newsletter-button').text('sign up');
                        $('.newsletter-button').attr('disabled', false);

                        if (data.status === 422) {
                            let errors = data.responseJSON.errors;
                            $.each(errors, function(index, value) {
                                Toast.fire({
                                    icon: 'error',
                                    title: value[0]
                                })
                            })
                        }
                    }
                })
            })
        })
    </script>

</div>
<!--=============================
SCROLL BUTTON END
==============================-->


<div class="fp__scroll_btn">
    go to top
</div>
<!--=============================
SCROLL BUTTON END
==============================-->


<!--jquery library js-->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!--bootstrap js-->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!--font-awesome js-->
<script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
<!-- slick slider -->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!-- isotop js -->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<!-- simplyCountdownjs -->
<script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
<!-- counter up js -->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
<!-- nice select js -->
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<!-- venobox js -->
<script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
<!-- sticky sidebar js -->
<script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
<!-- wow js -->
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<!-- ex zoom js -->
<script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>

<script src="{{ asset('frontend/js/toastr.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--main/custom js-->
<script src="{{ asset('frontend/js/main.js') }}"></script>

<!-- show dynamic validation message-->
<script>
    toastr.options.progressBar = true;

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    // Set csrf at ajax header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('.button-click').click();
    })
</script>

<!-- Load global js -->
{{-- @include('frontend.layouts.global-scripts') --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    toastr.options.progressBar = true;

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}")
        @endforeach
    @endif

    // Set csrf at ajax header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function(){
        $('.button-click').click();
    })
</script>

<!-- Load global js -->

@stack('scripts')

    @stack('content')

</body>

</html>
