<?php

namespace App\Http\Livewire;

use App\Models\Language;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

 class PollTable extends LivewireTableComponent
{
    public string $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];
    public string $pageName = 'Poll';
    public string $tableName = 'Poll';

    /**
     * @var \null[][]
     */
    protected $queryString = []; //url

    public function updateStatus($status, $id)
    {
        $updatedStatus = ($status) ? 0 : 1;
        $poll = Poll::findOrFail($id);
        $poll->update(['status' => $updatedStatus]);

        $this->resetPage();
        $this->dispatchBrowserEvent('success', __('messages.placeholder.status_updated_successfully'));
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.poll.question'), 'question')
                ->sortable()->searchable(),
            Column::make(__('messages.common.language'), 'language.name')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'lang_id'), $direction);
                }),
            Column::make(__('messages.status'), 'status'),
            Column::make(__('messages.common.result'), 'poll.poll_id'),
            Column::make(__('messages.common.action'), 'id')
                ->addClass('custom-width-album'),
        ];
    }

    public function query(): Builder
    {
        return Poll::with('language');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.poll_table';
    }

    public function render():  \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    
    {
        return view('livewire-tables::'.config('livewire-tables.theme').'.datatable')
            ->with([
                'columns' => $this->columns(),
                'rowView' => $this->rowView(),
                // 'filtersView' => $this->filtersView(),
                // 'customFilters' => $this->filters(),
                // 'rows' => $this->rows,
                // 'modalsView' => $this->modalsView(),
                // 'bulkActions' => $this->bulkActions,
                'componentName' => 'Polls.add-button',
            ]);
    }
}
