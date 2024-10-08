@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            <img src="{{ getSettingValue()['logo'] }}" class="logo" width="120px" height="50px"
                 style="object-fit: cover"
                 alt="{{ getAppName() }}">
        @endcomponent
    @endslot
    <div>
        <h2>{{ __('messages.mails.hello') }}</h2>
        <p>  {{__('messages.mails.please_click')}}</p>
        @component('mail::button', ['url' => $actionUrl])
            {{__('messages.mails.verify_email') }}
        @endcomponent
        <p>{{ __('messages.mails.regard') }}</p>
        <p>{{ getAppName() }}</p>
    </div>
    @slot('footer')
        @component('mail::footer')
            <h6>© {{ date('Y') }} {{ getAppName() }}.</h6>
        @endcomponent
    @endslot
@endcomponent
