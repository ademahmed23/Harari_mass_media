@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
        <div class="alert alert-{{ $message['level'] }} fs-4">
            <div>
                <div class="d-flex text-white align-items-center">
                    <i class="fa-solid fa-face-smile me-4"></i>
                    <span >{!! $message['message'] !!}</span>
                </div>
            </div>
        </div>
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
