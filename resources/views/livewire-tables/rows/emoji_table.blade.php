<x-livewire-tables::bs5.table.cell>
    {{ __('messages.reaction.'.$row->name) }}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    {!! $row->emoji !!}
</x-livewire-tables::bs5.table.cell>

<x-livewire-tables::bs5.table.cell>
    <label class="form-check form-switch form-check-custom form-check-solid form-switch-sm d-flex justify-content-start cursor-pointer">
        <input type="checkbox" name="status" class="form-check-input emoji-active cursor-pointer" data-id="{{ $row->id }}"
                {{ (($row->status)=="1") ? 'checked' : ''}}>
        <span class="custom-switch-indicator"></span>
    </label>
</x-livewire-tables::bs5.table.cell>

{{--<x-livewire-tables::bs5.table.cell :customAttributes="['class' => 'custom-width-album']">--}}
{{--    <div class="d-flex justify-content-start">--}}
{{--        <a href="javascript:void(0)" data-id="{{ $row['id'] }}" data-bs-toggle="tooltip"--}}
{{--           data-bs-placement="top" data-bs-trigger="hover" data-bs-original-title="{{ __('messages.delete') }}"  --}}
{{--           class="btn px-1 text-danger fs-3 delete-emoji-btn">--}}
{{--            <i class="fa-solid fa-trash"></i>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--</x-livewire-tables::bs5.table.cell>--}}
