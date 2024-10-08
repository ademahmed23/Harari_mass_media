@extends('admin.layouts.master1')
@section('title')
    {{__('messages.rss_feed.edit_rss_feed')}}
@endsection

@section('content')

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-end mb-5">
            <h1>@yield('title')</h1>
            <a class="btn btn-outline-primary float-end"
               href="{{ route('rss-feed.index') }}">{{ __('messages.common.back') }}</a>
        </div>
        @include('layouts.errors')
        @include('flash::message')
        {{ Form::hidden('rssFeedIsEdit',true,['id' => 'rssFeedIsEdit']) }}
        {{ Form::hidden('rssFeedCategoryId',$rssFeed->category_id ,['id' => 'EditRssFeedCategoryId']) }}
        {{ Form::hidden('rssFeedSubcategoryId',$rssFeed->subcategory_id ,['id' => 'EditRssFeedSubcategoryId']) }}
        {{ Form::hidden('rssFeedLanguageId',$rssFeed->language_id ,['id' => 'EditRssFeedLanguageId']) }}
        <div class="card">
            <div class="card-body">
                {{ Form::open(['route' => ['rss-feed.update',$rssFeed->id], 'method' => 'PUT']) }}
                @include('rss_feed.fields')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
