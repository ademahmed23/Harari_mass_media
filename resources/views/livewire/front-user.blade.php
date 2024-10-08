<div class="row">
@if($posts->count() > 0)
    @foreach($posts as $post)
        <div class="col-sm-6 mb-5 d-flex">
            <div class="card w-100 ">
                <a href="{{route('detailPage',$post->slug)}}"
                   class="w-100 h-100 d-flex flex-column">
                    <div class="position-relative">
                        <img src="{{$post->post_image}}"
                             class="card-img-top admin-card-image img-fluid" alt="...">
                        <div class="profile-posts-tag">
                                                <span class="me-2">
                                                    <span><i class="fa-solid fa-comment"></i></span>
                                                    <span>{{( $post->comment->count() ?$post->comment->count() : 0 )}}</span>
                                                </span>
                            <span>
                                                    <i class="fa-solid fa-eye"></i>
                                                </span>
                            <span>{{getPostViewCount($post->id)}}</span>
                        </div>
                    </div>
                    <div class="card-body admin-post-card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="text-primary">
                            {{ ucfirst(__('messages.common.'.strtolower($post->created_at->format('M')))) }} {{ $post->created_at->format('d, Y')}}</p>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($post->description,130,'...') !!}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach
@else
    <div class="d-flex justify-content-center pt-100">
        <h1>{{ __('messages.no_matching_records_found') }}</h1>
    </div>
@endif
@if($posts->count() > 0)
    <div class="row justify-content-center pt-60 mb-xl-4">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
         
            {{$posts->links()}}
        </div>
    </div>
@endif
</div>
