<x-livewire-tables::bs5.table.cell>
    {!! $row->title !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    @if($row->parent != null)
        {!! $row->parent->title !!}
    @else
        <p>{{ __('messages.menu.n_a') }}</p>
    @endif
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-center cursor-pointer">
        <input type="checkbox" name="show_in_menu" class="form-check-input is-active cursor-pointer menu-status"
               value="{{$row->show_in_menu}}" show-in-menu="{{$row->show_in_menu}}" data-id="{{ $row->id }}"
                {{ (($row->show_in_menu)=="1") ? 'checked' : ''}} >
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-width-action']">
    <div class="justify-content-start d-flex">
        <a href="{{route('menus.edit',$row['id'])}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.common.edit') }}"
           class="btn px-1 text-primary fs-3 menus-edit-btn" data-id="{{$row->id}}">
            <i class="fa-solid fa-pen-to-square"></i>
        </a>
        <a href="javascript:void(0)" data-id="{{$row['id']}}" data-bs-toggle="tooltip"
           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"
           class="btn px-1 text-danger fs-3 delete-menu-btn">
            <i class="fa-solid fa-trash"></i>
        </a>
    </div>
</x-livewire-tables::bs5.table.cell>
