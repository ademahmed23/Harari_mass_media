@php
    $abouts = \App\Models\About::first();
@endphp
<section>
    <!-- Popular news  header-->
    <div class="popular__news-header">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-8 ">
                    <div class="card__post-carousel">
                        @foreach ($heroSlider as $slider)
                        @if ($loop->index <= 4)
                            <div class="item">
                                <!-- Post Article -->
                                <div class="card__post">
                                    <div class="card__post__body">
                                        <a href="{{ route('news-details', $slider->slug) }}">
                                            <img src="{{ asset($slider->image) }}" class="img-fluid" alt="">
                                        </a>
                                        <div class="card__post__content bg__post-cover">
                                            <div class="card__post__category">
                                                {{ $slider->category->name }}
                                            </div>
                                            <div class="card__post__title">
                                                <h2>
                                                    <a href="{{ route('news-details', $slider->slug) }}">
                                                        {!! truncate($slider->title, 100) !!}
                                                    </a>
                                                </h2>
                                            </div>
                                            <div class="card__post__author-info">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:;">
                                                            {{ __('frontend.by') }} {{ $slider->auther->name }}
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span>

                                                            {{ date('M d, Y', strtotime($slider->created_at)) }}
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="popular__news-right">
                        <!-- Post Article -->
                        @foreach ($heroSlider as $slider)
                        @if ($loop->index > 4 && $loop->index <= 6)
                        <div class="card__post ">
                            <div class="card__post__body card__post__transition">
                                <a href="{{ route('news-details', $slider->slug) }}">
                                    <img src="{{ asset($slider->image) }}" class="img-fluid" alt="">
                                </a>
                                <div class="card__post__content bg__post-cover">
                                    <div class="card__post__category">
                                        {{ $slider->category->name }}
                                    </div>
                                    <div class="card__post__title">
                                        <h5>
                                            <a href="{{ route('news-details', $slider->slug) }}">
                                                {!! truncate($slider->title, 100) !!}
                                            </a>
                                        </h5>
                                    </div>
                                    <div class="card__post__author-info">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript:;">
                                                    by {{ $slider->auther->name }}
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    {{ date('M d, Y', strtotime($slider->created_at)) }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <section class="section">

        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="fp__about_video_bg" style="background: url({{ getYtThumbnail(@$about->video_link, 'high') }});">
                <div class="fp__about_video_overlay">
                    <div class="row">
                        <div class="col-12">
                            <div class="fp__about_video_text">
                                <p>Watch Videos</p>
                                <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                    href="{{ @$about->video_link }}">
                                    <i class=" fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- <div class="container" data-wow-duration="1s">
        <div class="row widget__form-subscribe bg__card-shadow">
            @foreach ($videoss as $item)
                <div class="video" style="margin-left: 10px">
                    <h4>{{ $item->caption }}</h4>
                    <iframe width="300" height="315"
                        src="https://www.youtube.com/embed/{{ $item->video_id }}"
                        frameborder="0" style="border-radius: 6px"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @endforeach
        </div> --}}
        {{-- <div class="row widget__form-subscribe bg__card-shadow">

            @foreach ($videoss as $item)

                <div class="video" style="margin-left: 30px; align-content:center">
                    <h4>{{ $item->caption }}</h4>
                    <iframe width="250" height="315"
                        src="https://www.youtube.com/embed/{{ $item->video_id }}"
                        frameborder="0" style="border-radius: 6px"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>

            @endforeach
        </div> --}}
    </div>

    <!-- End Popular news header-->
    <!-- Popular news carousel -->
    {{-- <div class="popular__news-header-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="top__news__slider">
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="C:/xampp/htdocs/News/public/uploads/15hX00iGwEM9GDHHeSycWoLed8wztz.jpg" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by david hall
                                                </span>,
                                            </li>

                                            <li class="list-inline-item">
                                                <span>
                                                    descember 09, 2016
                                                </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/newsimage6.png" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by david hall
                                                </span>,
                                            </li>

                                            <li class="list-inline-item">
                                                <span>
                                                    descember 09, 2016
                                                </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/newsimage7.png" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by david hall
                                                </span>,
                                            </li>

                                            <li class="list-inline-item">
                                                <span>
                                                    descember 09, 2016
                                                </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/newsimage8.png" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by david hall
                                                </span>,
                                            </li>

                                            <li class="list-inline-item">
                                                <span>
                                                    descember 09, 2016
                                                </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <!-- Post Article -->
                                <div class="article__entry">
                                    <div class="article__image">
                                        <a href="#">
                                            <img src="images/newsimage8.png" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="article__content">
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <span class="text-primary">
                                                    by david hall
                                                </span>,
                                            </li>

                                            <li class="list-inline-item">
                                                <span>
                                                    descember 09, 2016
                                                </span>
                                            </li>
                                        </ul>
                                        <h5>
                                            <a href="#">
                                                Proin eu nisl et arcu iaculis placerat sollicitudin ut est.
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div> --}}
    <!-- End Popular news carousel -->
</section>
