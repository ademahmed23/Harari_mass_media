<x-livewire-tables::bs5.table.cell>
    
    @foreach($row->gallery_image as $image)
        <a href="{{$image}}" data-lightbox="image-{{$row->id}}" class="text-decoration-none">
            <img src='{{ $image }}' width="50px" height="50px"  class="p-2 custom-object-fit">
        </a>
    @endforeach
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!!  $row->title !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->language->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->album->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->category->name !!}
</x-livewire-tables::bs5.table.cell>

{{--<x-livewire-tables::bs5.table.cell>--}}
{{--    {{ $row->created_at }}--}}
{{--</x-livewire-tables::bs5.table.cell>--}}

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-min-with']">
    <div class="d-flex align-items-start">
        <a href="{{route('gallery-images.edit',$row['id'])}}" 
           class="btn px-1 text-primary fs-3 gallery-images-edit-btn" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}" data-id="{{$row['id']}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row['id']}}" title="{{ __('messages.delete') }}"
           data-bs-toggle="tooltip"
           data-bs-original-title="{{ __('messages.common.delete') }}"
           class="btn px-1 text-danger fs-3 delete-gallery-image-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
