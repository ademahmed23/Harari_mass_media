<div>
    <div
        @if (is_numeric($refresh))
        wire:poll.{{ $refresh }}ms
        @elseif(is_string($refresh))
        @if ($refresh === '.keep-alive' || $refresh === 'keep-alive')
        wire:poll.keep-alive
        @elseif($refresh === '.visible' || $refresh === 'visible')
        wire:poll.visible
        @else
        wire:poll="{{ $refresh }}"
        @endif
        @endif
        class="container-fluid p-0"
    >
        @include('livewire-tables::includes.debug')
        @include('livewire-tables::bootstrap-5.includes.offline')
        @include('livewire-tables::bootstrap-5.includes.sorting-pills')
        @include('livewire-tables::bootstrap-5.includes.filter-pills')

        <div class="d-sm-flex justify-content-between mb-3 livewire-search-box  mb-5">
            <div class="d-sm-flex align-items-center w-100 text-end">
                @include('livewire-tables::bootstrap-5.includes.reorder')
                @include('livewire-tables::bootstrap-5.includes.search')
              
                <a href="{{ Auth::user()->hasRole('customer') ? route('customer.post_type',['section' => $addRouteSection]) : route('post_type',['section' => $addRouteSection])}}" type="button" class="btn btn-primary mx-2 ms-auto">
                    {{ $addButtonText }}
                </a>
                <a href="#" type="button" class="btn btn-danger delete-post-btn d-none " >
                    {{ $deleteBtnText }}
                </a>
            @if ($filtersEnabled && $showFilterDropdown)
                    <div class="{{ $showSearch ? 'ms-0 ms-md-2' : '' }} mb-3 mb-md-0">
                        @include('livewire-tables::bootstrap-5.includes.filters')
                    </div>
                @endif
            </div>

            <div class="d-md-flex">
                <div class="d-flex align-items-center">@include('livewire-tables::bootstrap-5.includes.bulk-actions')</div>
                <div>@include('livewire-tables::bootstrap-5.includes.column-select')</div>
                <div>@include('livewire-tables::bootstrap-5.includes.per-page')</div>
            </div>
        </div>

        @include('livewire-tables::bootstrap-5.includes.table')
        @include('livewire-tables::bootstrap-5.includes.pagination')
    </div>

    @isset($modalsView)
        @include($modalsView)
    @endisset
</div>
