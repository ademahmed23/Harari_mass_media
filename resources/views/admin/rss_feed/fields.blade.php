<div class="row">
    <div class="col-6">
        {{ Form::label('feed_name', __('Feed Name').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::text('feed_name', isset($rssFeed) ? $rssFeed->feed_name : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('Feed Name'), 'required']) }}
    </div>
    <div class="col-6">
        {{ Form::label('feed_url', __('Feed Url').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::url('feed_url', isset($rssFeed) ? $rssFeed->feed_url : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('Feed Url'), 'required']) }}
    </div>
    <div class="col-6">
        {{ Form::label('no_post', __('Nubmer of Posts').':', ['class' => 'required fs-5  form-label mb-2']) }}
        {{ Form::number('no_post', isset($rssFeed) ? $rssFeed->no_post : null, ['class' => 'form-control form-control-solid mb-3', 'placeholder' => __('Number of Posts'), 'required']) }}
    </div>
    <div class="form-group col-lg-6">
        <label for="">{{ __('admin.Language') }}</label>
        <select name="language" id="language-select" class="form-control select2">
            <option value="">--{{ __('admin.Select') }}--</option>
            @foreach ($languages as $lang)
                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
            @endforeach
        </select>
        {{-- @error('language')
            <p class="text-danger">{{ $message }}</p>
        @enderror --}}
    </div>
    <div class="form-group">
        <label for="">{{ __('admin.Category') }}</label>
        <select name="category" id="category" class="form-control select2">
            <option value="">--{{ __('admin.Select') }}---</option>

        </select>
        @error('category')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
   
    <div class="col-6 mb-3">
        <div class="mb-5">
            {{ Form::label('tags', __('messages.post.tag').':', ['class' => 'form-label required']) }}
            <div class="mb-5">
                <input class="form-control" name="tags" id="rssPostTag"
                       value="{{ isset($rssFeed) ? html_entity_decode($rssFeed->tags) : (old('tags') ? old('tags') : "") }}"/>
            </div>
        </div>
    </div>
    {{-- <div class="col-6 mb-3">
        <div class="mb-5">

            {{ Form::label('tags', __('messages.rss_feed.scheduled_post_delete').':', ['class' => 'form-label']) }}
            <input type="text" name="scheduled_delete_post_time" id="scheduledRssPostDeleteTime"  class="form-control {{(getLogInUser()->dark_mode) ? 'bg-light' : 'bg-white'}}" autocomplete="off" placeholder="{{__('messages.post.pick_date')}}" value="{{isset($rssFeed) ? $rssFeed->scheduled_delete_post_time : null}}">
        </div>
    </div> --}}

    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('auto_update', __('Auto Update').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="auto_update" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}"
                               {{isset($rssFeed) ? ($rssFeed->auto_update  == \App\Models\RssFeed::YES ? 'checked' : '') : 'checked'}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('Yes') }}
                    </label>
                </div>

                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="auto_update" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}"  {{ isset($rssFeed) ? ($rssFeed->auto_update  == \App\Models\RssFeed::NO ? 'checked' : '') : null}}>
                        {{--                                   value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('No') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('show_btn', __('Show').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="show_btn" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}"
                                {{isset($rssFeed) ? ($rssFeed->show_btn  == \App\Models\RssFeed::YES ? 'checked' : '') : 'checked'}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('Yes') }}
                    </label>
                </div>
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="show_btn" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}"
                                {{isset($rssFeed) ? ($rssFeed->show_btn  == \App\Models\RssFeed::NO ? 'checked' : '') : null}}>
                        {{--                                   value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('No') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-5">
            {{ Form::label('post_draft', __('Add Post').':', ['class' => 'form-label required']) }}
            <div class="d-flex justify-content-between align-self-center">
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="post_draft" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::YES}}"
                                {{isset($rssFeed) ? ($rssFeed->post_draft  == 0 ? 'checked' : '') : null}}>
                        {{--                                   value="{{ \App\Models\RssFeed::ORIGINAL}}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::ORIGINAL) ? 'checked' : '' }}>--}}
                        {{ __('Yes') }}
                    </label>
                </div>
                <div class="d-inline-block col-6">
                    <label class="form-check form-check-custom">
                        <input name="post_draft" class="form-check-input me-3" type="radio" value="{{\App\Models\RssFeed::NO}}"
                                {{isset($rssFeed) ? ($rssFeed->post_draft  == 1 ? 'checked' : '') : 'checked'}}>
                        {{--value="{{ \App\Models\RssFeed::MySERVER }}" {{ ($campaign->campaign_end_method == \App\Models\RssFeed::MySERVER) ? 'checked' : '' }}>--}}
                        {{ __('No') }}
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
    {{ Form::submit(__('Save'),['class' => 'btn btn-primary m-0',]) }}
        <a href="{{ route('rss-feed.index') }}" type="reset"
           class="btn btn-secondary my-0  me-0">{{__('Discard')}}</a>
    </div>
</div>

