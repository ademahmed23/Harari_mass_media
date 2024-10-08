<x-livewire-tables::bs5.table.cell>
    {{ $row->feed_name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <a href="{{ $row->feed_url}}" target="_blank">{{ $row->feed_url}}</a>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ count($row->posts) .'/' .$row->no_post}}
</x-livewire-tables::bs5.table.cell>
{{--<x-livewire-tables::bs5.table.cell>--}}
{{--    {{ $row->no_post}}--}}
{{--</x-livewire-tables::bs5.table.cell>--}}
<x-livewire-tables::bs5.table.cell>
    {{ $row->language->name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->category->name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{ $row->user->full_name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
        <span class="badge {{App\Models\RssFeed::YES == $row->auto_update ?  'bg-success' : 'bg-danger'}}  fs-7 m-1">
        {{App\Models\RssFeed::AUTO_UPDATE[$row->auto_update]}}
    </span>
    <div>
        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="
{{__('messages.sync')}}"
           class="btn btn-primary px-2 py-1  rss-feed-manually-update" data-id="{{$row->id}}">
            <i class="fa-solid fa-repeat"></i> {{__('messages.sync')}}
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <a href="{{ route('rss-feed.edit', $row->id) }}" data-bs-toggle="tooltip"
       data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
       class="btn px-1 text-primary fs-3 role-edit-btn"  data-id="{{$row->id}}">
        <i class="fa-solid fa-pen-to-square"></i>
    </a>
    <a href="javascript:void(0)" data-id="{{ $row->id }}" data-bs-toggle="tooltip"
       data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
       class="btn px-1 text-danger fs-3 rss-feed-delete-btn">
        <i class="fa-solid fa-trash"></i>
    </a>
</x-livewire-tables::bs5.table.cell>
