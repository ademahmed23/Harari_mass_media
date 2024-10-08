<x-livewire-tables::bs5.table.cell>
    {!!  $row->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!!  $row->title !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!!  $row->language->name !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @php
        $checked = $row->visibility === 0 ? '' : 'checked';
    @endphp
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm mt-2">
        <input type="checkbox" name="visibility" class="form-check-input visibility"
               data-id="{{$row->id}}" {{$checked}} >
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-width-album']">

    <div class="d-flex justify-content-start">
        <a href="{{route('pages.edit',$row['id'])}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3 pages-edit-btn" data-id="{{$row['id']}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{ $row['id'] }}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"  
           class="btn px-1 text-danger fs-3 delete-page-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
    
</x-livewire-tables::bs5.table.cell>


