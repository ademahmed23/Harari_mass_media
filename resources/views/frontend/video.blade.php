
 @include('frontend.layouts.master')
 @section('content')
<div class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ __('VIDEO_GALLERY') }}</h2>
                <nav class="breadcrumb-container">
                     <ol class="breadcrumb">
                         <li class="breadcrumb-item"><a href="{{ route('video') }}">{{ __('HOME') }}</a></li> 
                        <li class="breadcrumb-item active" aria-current="page">{{ __('VIDEO') }}</li>
                    </ol> 
                </nav>
            </div>
        </div>
    </div>
</div> 

<div class="content">
    <div class="container">
        <div class="video">
            <div class="row">
                @foreach($videos as $item)
                <div class="video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $item->video_id }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            @endforeach
            

            
            
                
            </div>
        </div>
    </div>
</div>
@endsection