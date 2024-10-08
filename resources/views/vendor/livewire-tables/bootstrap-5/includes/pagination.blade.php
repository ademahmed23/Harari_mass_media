<div class="d-flex flex-sm-row flex-column align-items-center">
    @if ($paginationEnabled && $showPerPage)
        <div
            class="ms-0 ms-md-2 mb-sm-0 mb-3 d-flex align-items-center justify-content-sm-start justify-content-center">
            <span class="me-2 text-muted">{{__('messages.show')}}</span>
            <select
                wire:model="perPage"
                id="perPage"
                class="form-select w-auto data-sorting"
            >
                @foreach ($perPageAccepted as $item)
                    <option value="{{ $item }}">{{ $item === -1 ? __('All') : $item }}</option>
                @endforeach
            </select>
        </div>
    @endif

    @if ($showPagination)
        @if ($paginationEnabled && $rows->lastPage() > 1)
            <div
                class="w-100 d-flex justify-content-sm-between justify-content-center flex-wrap align-items-center flex-sm-row flex-column">
                <div class="text-muted ms-sm-3 pagination-record">
                    <span>{{__('messages.common.showing')}}</span>
                    <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                    <span>{{__('messages.common.to')}}</span>
                    <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                    <span>{{__('messages.common.of')}}</span>
                    <strong>{{ $rows->total() }}</strong>
                    <span>{{__('messages.common.result')}}</span>
                </div>
                <div class="livewire-pagination mt-sm-0 mt-3">
                    {{ $rows->links() }}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12 text-muted pagination-record ms-sm-3">
                    {{__('messages.common.showing')}}

                    <strong>{{ $rows->count() }}</strong>
                    {{__('messages.common.result')}}
                </div>
            </div>
        @endif
    @endif

</div>
