<section class="pt-0 mt-5">
    <div class="popular__section-news">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="wrapper__list__article">
                        <h4 class="border_section">{{ __('frontend.recent post') }}</h4>
                    </div>
                    <div class="row ">
                        @foreach ($recentNews as $news)
                            @if ($loop->index <= 1)
                                <div class="col-sm-12 col-md-6 mb-4">
                                    <!-- Post Article -->
                                    <div class="card__post ">
                                        <div class="card__post__body card__post__transition">
                                            <a href="{{ route('news-details', $news->slug) }}">
                                                <img src="{{ asset($news->image) }}" class="img-fluid" alt="">
                                            </a>
                                            <div class="card__post__content bg__post-cover">
                                                <div class="card__post__category">
                                                    {{ $news->category->name }}
                                                </div>
                                                <div class="card__post__title">
                                                    <h5>
                                                        <a href="{{ route('news-details', $news->slug) }}">
                                                            {!! truncate($news->title) !!}
                                                        </a>
                                                    </h5>
                                                </div>
                                                <div class="card__post__author-info">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <a href="blog_details.html">
                                                                {{ __('frontend.by') }} {{ $news->auther->name }}
                                                            </a>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <span>

                                                                {{ date('M d, Y', strtotime($news->created_at)) }}
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
                    <div class="row ">
                        <div class="col-sm-12 col-md-6">
                            <div class="wrapp__list__article-responsive">
                                @foreach ($recentNews as $news)
                                    @if ($loop->index > 1 && $loop->index <= 3)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details', $news->slug) }}">
                                                        <img src="{{ asset($news->image) }}" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                </div>


                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        {{ __('frontend.by') }}
                                                                        {{ $news->auther->name }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ date('M d, Y', strtotime($news->created_at)) }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details', $news->slug) }}">
                                                                    {!! truncate($news->title) !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 ">
                            <div class="wrapp__list__article-responsive">
                                @foreach ($recentNews as $news)
                                    @if ($loop->index > 3 && $loop->index <= 5)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details', $news->slug) }}">
                                                        <img src="{{ asset($news->image) }}" class="img-fluid"
                                                            alt="">
                                                    </a>
                                                </div>


                                                <div class="card__post__body ">
                                                    <div class="card__post__content">

                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        {{ __('frontend.by') }}
                                                                        {{ $news->auther->name }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ date('M d, Y', strtotime($news->created_at)) }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a href="{{ route('news-details', $news->slug) }}">
                                                                    {!! truncate($news->title) !!}
                                                                </a>
                                                            </h6>
                                                        </div>
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


                <div class="col-md-12 col-lg-4">
                    <aside class="wrapper__list__article">
                        <h4 class="border_section">{{ __('frontend.popular post') }}</h4>
                        <div class="wrapper__list-number">

                            <!-- List Article -->
                            @foreach ($popularNews as $popularNews)
                                <div class="card__post__list">
                                    <div class="list-number">
                                        <span>
                                            {{ ++$loop->index }}
                                        </span>
                                    </div>
                                    <a href="#" class="category">
                                        {{ $popularNews->category->name }}
                                    </a>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <h5>
                                                <a href="{{ route('news-details', $popularNews->slug) }}">
                                                    {!! truncate($popularNews->title) !!}

                                                </a>
                                            </h5>
                                        </li>
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

    <!-- Post news carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{ @$categorySectionOne->first()->category->name }}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach ($categorySectionOne as $sectionOneNews)
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $sectionOneNews->slug) }}">
                                        <img src="{{ asset($sectionOneNews->image) }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{ __('frontend.by') }} {{ $sectionOneNews->auther->name }}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                {{ date('M d, Y', strtotime($sectionOneNews->created_at)) }}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details', $sectionOneNews->slug) }}">
                                            {!! truncate($sectionOneNews->title, 40) !!}
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Popular news category -->

    <!-- Post news carousel -->
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <aside class="wrapper__list__article">
                    <h4 class="border_section">{{ @$categorySectionTwo->first()->category->name }}</h4>
                </aside>
            </div>
            <div class="col-md-12">

                <div class="article__entry-carousel">
                    @foreach ($categorySectionTwo as $sectionTwoNews)
                        <div class="item">
                            <!-- Post Article -->
                            <div class="article__entry">
                                <div class="article__image">
                                    <a href="{{ route('news-details', $sectionTwoNews->slug) }}">
                                        <img src="{{ asset($sectionTwoNews->image) }}" alt=""
                                            class="img-fluid">
                                    </a>
                                </div>
                                <div class="article__content">
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <span class="text-primary">
                                                {{ __('frontend.by') }} {{ $sectionTwoNews->auther->name }}
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                {{ date('M d, Y', strtotime($sectionTwoNews->created_at)) }}
                                            </span>
                                        </li>

                                    </ul>
                                    <h5>
                                        <a href="{{ route('news-details', $sectionTwoNews->slug) }}">
                                            {!! truncate($sectionTwoNews->title, 40) !!}
                                        </a>
                                    </h5>

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div>
    <!-- End Popular news category -->


    <!-- Popular news category -->
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <aside class="wrapper__list__article mb-0">
                        <h4 class="border_section">{{ @$categorySectionThree->first()->category->name }}</h4>
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($categorySectionThree as $sectionThreeNews)
                                    @if ($loop->index <= 2)
                                        <div class="mb-4">
                                            <!-- Post Article -->
                                            <div class="article__entry">
                                                <div class="article__image">
                                                    <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                        <img src="{{ asset($sectionThreeNews->image) }}"
                                                            alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="article__content">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                {{ __('frontend.by') }}
                                                                {{ $sectionThreeNews->auther->name }}
                                                            </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <span>

                                                                {{ date('M d, Y', strtotime($sectionThreeNews->created_at)) }}
                                                            </span>
                                                        </li>

                                                    </ul>
                                                    <h5>
                                                        <a
                                                            href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                            {!! truncate($sectionThreeNews->title) !!}
                                                        </a>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                            <div class="col-md-6">
                                @foreach ($categorySectionThree as $sectionThreeNews)
                                    @if ($loop->index > 3 && $loop->index <= 7)
                                        <div class="mb-4">
                                            <!-- Post Article -->
                                            <div class="article__entry">
                                                <div class="article__image">
                                                    <a href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                        <img src="{{ asset($sectionThreeNews->image) }}"
                                                            alt="" class="img-fluid">
                                                    </a>
                                                </div>
                                                <div class="article__content">
                                                    <ul class="list-inline">
                                                        <li class="list-inline-item">
                                                            <span class="text-primary">
                                                                {{ __('frontend.by') }}
                                                                {{ $sectionThreeNews->auther->name }}
                                                            </span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <span>

                                                                {{ date('M d, Y', strtotime($sectionThreeNews->created_at)) }}
                                                            </span>
                                                        </li>

                                                    </ul>
                                                    <h5>
                                                        <a
                                                            href="{{ route('news-details', $sectionThreeNews->slug) }}">
                                                            {!! truncate($sectionThreeNews->title) !!}
                                                        </a>
                                                    </h5>

                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </aside>

                    @if ($ad->home_middle_ad_status == 1)
                        <div class="small_add_banner">
                            <div class="small_add_banner_img">
                                <a href="{{ $ad->home_middle_ad_url }}">
                                    <img src="{{ asset($ad->home_middle_ad) }}" alt="adds">
                                </a>
                            </div>
                        </div>
                    @endif

                    <aside class="wrapper__list__article mt-5">
                        <h4 class="border_section">{{ @$categorySectionFour->first()->category->name }}</h4>

                        <div class="wrapp__list__article-responsive">
                            @foreach ($categorySectionFour as $sectionFourNews)
                                <!-- Post Article List -->
                                <div class="card__post card__post-list card__post__transition mt-30">
                                    <div class="row ">
                                        <div class="col-md-5">
                                            <div class="card__post__transition">
                                                <a href="{{ route('news-details', $sectionFourNews->slug) }}">
                                                    <img src="{{ asset($sectionFourNews->image) }}"
                                                        class="img-fluid w-100" alt="">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 my-auto pl-0">
                                            <div class="card__post__body ">
                                                <div class="card__post__content  ">
                                                    <div class="card__post__category ">
                                                        {{ $sectionFourNews->category->name }}
                                                    </div>
                                                    <div class="card__post__author-info mb-2">
                                                        <ul class="list-inline">
                                                            <li class="list-inline-item">
                                                                <span class="text-primary">
                                                                    {{ __('frontend.by') }}
                                                                    {{ $sectionFourNews->auther->name }}
                                                                </span>
                                                            </li>
                                                            <li class="list-inline-item">
                                                                <span class="text-dark text-capitalize">

                                                                    {{ date('M d, Y', strtotime($sectionFourNews->created_at)) }}
                                                                </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="card__post__title">
                                                        <h5>
                                                            <a
                                                                href="{{ route('news-details', $sectionFourNews->slug) }}">
                                                                {!! truncate($sectionFourNews->title) !!}
                                                            </a>
                                                        </h5>
                                                        <p class="d-none d-lg-block d-xl-block mb-0">
                                                            {!! truncate($sectionFourNews->content, 100) !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </aside>
                </div>

                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.Most Viewed') }}</h4>
                            <div class="wrapper__list__article-small">

                                @foreach ($mostViewedPosts as $mostViewedNews)
                                    <!-- Post Article -->
                                    @if ($loop->index === 0)
                                        <div class="article__entry">
                                            <div class="article__image">
                                                <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                    <img src="{{ asset($mostViewedNews->image) }}" alt=""
                                                        class="img-fluid">
                                                </a>
                                            </div>
                                            <div class="article__content">
                                                <div class="article__category">
                                                    {{ $mostViewedNews->category->name }}
                                                </div>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            {{ __('frontend.by') }}
                                                            {{ $mostViewedNews->auther->name }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ date('M d, Y', strtotime($mostViewedNews->created_at)) }}
                                                        </span>
                                                    </li>

                                                </ul>
                                                <h5>
                                                    <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                        {{ truncate($mostViewedNews->title) }}
                                                    </a>
                                                </h5>
                                                <p>
                                                    {!! truncate($mostViewedNews->content, 100) !!}
                                                </p>
                                                <a href="{{ route('news-details', $mostViewedNews->slug) }}"
                                                    class="btn btn-outline-primary mb-4 text-capitalize">
                                                    {{ __('frontend.read more') }}</a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                @foreach ($mostViewedPosts as $mostViewedNews)
                                    @if ($loop->index > 0)
                                        <div class="mb-3">
                                            <!-- Post Article -->
                                            <div class="card__post card__post-list">
                                                <div class="image-sm">
                                                    <a href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                        <img src="{{ asset($mostViewedNews->image) }}"
                                                            class="img-fluid" alt="">
                                                    </a>
                                                </div>

                                                <div class="card__post__body ">
                                                    <div class="card__post__content">
                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        {{ __('frontend.by') }}
                                                                        {{ $mostViewedNews->auther->name }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ date('M d, Y', strtotime($mostViewedNews->created_at)) }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h6>
                                                                <a
                                                                    href="{{ route('news-details', $mostViewedNews->slug) }}">
                                                                    {!! truncate($mostViewedNews->title) !!}
                                                                </a>
                                                            </h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </aside>


                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.stay conected') }}</h4>
                            <!-- widget Social media -->
                            <div class="wrap__social__media">
                                @foreach ($socialCounts as $socialCount)
                                    <a href="{{ $socialCount->url }}" target="_blank">
                                        <div class="social__media__widget mt-2"
                                            style="background-color:{{ $socialCount->color }}">
                                            <span class="social__media__widget-icon">
                                                <i class="{{ $socialCount->icon }}"></i>
                                            </span>
                                            <span class="social__media__widget-counter">
                                                {{ $socialCount->fan_count }} {{ $socialCount->fan_type }}
                                            </span>
                                            <span class="social__media__widget-name">
                                                {{ $socialCount->button_text }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach

                            </div>
                        </aside>

                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.tags') }}</h4>
                            <div class="blog-tags p-0">
                                <ul class="list-inline">
                                    @foreach ($mostCommonTags as $tag)
                                        <li class="list-inline-item">
                                            <a href="{{ route('news', ['tag' => $tag->name]) }}">
                                                #{{ $tag->name }} ({{ $tag->count }})
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </aside>
                        {{-- sdfghhhhhhhhhhhhhhhhhhhhhhh --}}
                        <aside>
                            <?php if(!empty($getPoll->count())): ?>
                            <section class="voting-poll-section">
                                <div class="section-heading border-0 mb-30 mt-5">
                                    <div class="row align-items-center">
                                        <div class="col-12 section-heading-left">
                                            <h2 class="text-black mb-0"><?php echo e(__('Poll Questions')); ?></h2>
                                        </div>
                                    </div>
                                </div>
                                <?php $styleCss = 'style'; ?>
                                <?php $__currentLoopData = $getPoll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $poll): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="voting-poll">
                                    <p class="text-black fw-6 fs-16 mb-20"><?php echo $poll['question']; ?></p>
                                    <form class="poll-vote-form" id="pollVoteForm">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" id="pollId" name="poll_id"
                                            value="<?php echo e($poll['id']); ?>">
                                        <div class="mb-2" id="pollOption<?php echo e($poll->id); ?>">
                                            <?php $__currentLoopData = $getOption; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty($poll->$option)): ?>
                                            <div class="form-check ">
                                                <input class="form-check-input me-3 poll-answer" type="radio"
                                                    name="answer"
                                                    id="pollAnswer-<?php echo e($option); ?>-<?php echo e($poll['id']); ?>"
                                                    value="<?php echo e($poll[$option]); ?>">
                                                <label class="form-check-label fs-14"
                                                    for="pollAnswer-<?php echo e($option); ?>-<?php echo e($poll['id']); ?>"><?php echo $poll[$option]; ?></label>
                                            </div>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <div
                                                class="vote d-flex justify-content-between align-items-center pt-2 mb-md-4 mb-4 mb-1">
                                                <button type="submit" class="btn btn-primary poll-submit-btn"
                                                    data-id="<?php echo e($poll['id']); ?>"><?php echo e(__('Submit')); ?></button>
                                                <a href="javascript:void(0);"
                                                    class="fs-14 text-gray fw-6 view-statistic"
                                                    data-id="<?php echo e($poll->id); ?>"><?php echo e(__('View Result')); ?></a>
                                            </div>
                                            <span id="voteError<?php echo e($poll->id); ?>"></span>
                                        </div>
                                    </form>
                                    <div id="pollStatistic<?php echo e($poll->id); ?>" class="mb-2 d-none">
                                        <?php $vote = getPollStatistics($poll->id); ?>
                                        <?php $__currentLoopData = $vote['optionAns']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pollName => $statistic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <p class="mt-0 mb-2 fs-14"><?php echo e($pollName); ?></p>
                                        <div class="progress mb-3">
                                            <div class="progress-bar progress-bar-striped"
                                                <?php echo e($styleCss); ?>="width: <?php echo e($statistic); ?>%;"
                                                role="progressbar" aria-valuenow="<?php echo e($statistic); ?>"
                                                aria-valuemin="0" aria-valuemax="100">
                                                <span><?php echo e($statistic); ?>%</span>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <div
                                            class="vote d-flex justify-content-between align-items-center pt-2 mb-md-2 mb-1">
                                            <span
                                                class="text-black fs-14 fw-6"><?php echo e(__('messages.poll.total_vote')); ?>:<?php echo e($vote['totalPollResults']); ?></span>
                                            <a href="javascript:void(0);" class="view-option fs-14 text-gray fw-6"
                                                data-id="<?php echo e($poll->id); ?>"><?php echo e(__('messages.details.view_options')); ?> </a>
                                        </div>
                                        <span id="voteSuccess<?php echo e($poll->id); ?>">
                                            <p> </p>
                                        </span>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </section>
                            <?php endif; ?>
                        </aside>
                        {{-- fffffffffffffffffffffffff --}}
                        <aside>

                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('Live-poll') }}</h4>
                            <div class="widget">
                                <div class="poll-heading">
                                </div>
                                <div class="poll">
                                    <div class="question">
                                        @php
                                            $online_poll_data = \App\Models\OnlinePoll::orderBy('id', 'desc')
                                                ->where('language', 'en')
                                                ->first();
                                        @endphp
                                        {{ $online_poll_data->question }}
                                    </div>

                                    @php
                                        $total_vote = $online_poll_data->yes_vote + $online_poll_data->no_vote;
                                        if ($online_poll_data->yes_vote == 0) {
                                            $total_yes_percentage = 0;
                                        } else {
                                            $total_yes_percentage = ($online_poll_data->yes_vote * 100) / $total_vote;
                                            $total_yes_percentage = ceil($total_yes_percentage);
                                        }

                                        if ($online_poll_data->no_vote == 0) {
                                            $total_no_percentage = 0;
                                        } else {
                                            $total_no_percentage = ($online_poll_data->no_vote * 100) / $total_vote;
                                            $total_no_percentage = ceil($total_no_percentage);
                                        }
                                    @endphp

                                    @if (session()->get('current_poll_id') == $online_poll_data->id)
                                        <div class="poll-result">
                                            <div class="table-responsive">
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td style="width:100px;">{{ __('YES') }}
                                                            ({{ $online_poll_data->yes_vote }})</td>
                                                        <td>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-success"
                                                                    role="progressbar"
                                                                    style="width: {{ $total_yes_percentage }}%"
                                                                    aria-valuenow="{{ $total_yes_percentage }}"
                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                    {{ $total_yes_percentage }}%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>{{ __('NO') }} ({{ $online_poll_data->no_vote }})
                                                        </td>
                                                        <td>
                                                            <div class="progress">
                                                                <div class="progress-bar bg-danger" role="progressbar"
                                                                    style="width: {{ $total_no_percentage }}%"
                                                                    aria-valuenow="{{ $total_no_percentage }}"
                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                    {{ $total_no_percentage }}%</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <a href="{{ route('poll_previous') }}" class="btn btn-primary old"
                                                style="margin-top:0;">{{ __('OLD_RESULTS') }}</a>
                                        </div>
                                    @endif

                                    @if (session()->get('current_poll_id') != $online_poll_data->id)
                                        <div class="answer-option">
                                            <form action="{{ route('poll_submit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id"
                                                    value="{{ $online_poll_data->id }}">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vote"
                                                        id="poll_id_1" value="Yes" checked>
                                                    <label class="form-check-label"
                                                        for="poll_id_1">{{ __('YES') }}</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="vote"
                                                        id="poll_id_2" value="No">
                                                    <label class="form-check-label"
                                                        for="poll_id_2">{{ __('NO') }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit"
                                                        class="btn btn-primary">{{ __('SUBMIT') }}</button>
                                                    <a href="{{ route('poll_previous') }}"
                                                        class="btn btn-primary old">{{ __('OLD_RESULTS') }}</a>
                                                </div>
                                            </form>
                                        </div>
                                    @endif



                                </div>
                            </div>
                        </aside>



                        @if ($ad->side_bar_ad_status == 1)
                            <aside class="wrapper__list__article">
                                <h4 class="border_section">{{ __('frontend.Advertise') }}</h4>
                                <a href="{{ $ad->side_bar_ad_url }}">
                                    <figure>
                                        <img src="{{ asset($ad->side_bar_ad) }}" alt="" class="img-fluid">
                                    </figure>
                                </a>
                            </aside>
                        @endif
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('Live') }}</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                @foreach ($videos as $item)
                                    <div class="video">
                                        <h4>{{ $item->caption }}</h4>
                                        <iframe width="400" height="315"
                                            src="https://www.youtube.com/embed/{{ $item->video_id }}"
                                            frameborder="0" style="border-radius: 6px"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">{{ __('frontend.newsletter') }}</h4>
                            <!-- Form Subscribe -->
                            <div class="widget__form-subscribe bg__card-shadow">
                                <h6>
                                    {{ __('frontend.The most important world news and events of the day') }}.
                                </h6>
                                <p><small>{{ __('frontend.Get magzrenvi daily newsletter on your inbox') }}.</small>
                                </p>
                                <form action="" class="newsletter-form">
                                    <div class="input-group ">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="Your email address">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary newsletter-button"
                                                type="submit">{{ __('frontend.sign up') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </aside>
                    </div>
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
