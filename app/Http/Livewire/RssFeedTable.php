<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Language;
use App\Models\RssFeed;
use App\Models\User;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;

class RssFeedTable extends LivewireTableComponent
{
    public $search = '';

    public $orderBy = 'desc';  // default

    protected $listeners = ['refresh' => '$refresh', 'resetPage'];
    public string $pageName = 'RssFeed';


    public function columns(): array
    {
        return [
            Column::make(__('messages.rss_feed.feed_name'), 'feed_name')
                ->searchable()
                ->sortable(),
            Column::make(__('messages.rss_feed.feed_url'), 'feed_url')
                ->sortable(),
            Column::make(__('messages.rss_feed.post_import'), 'no_post')
                ->sortable(),
            Column::make(__('messages.languages'), 'language_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Language::select('name')->whereColumn('id', 'language_id'),
                        $direction);
                }),
            Column::make(__('messages.post.category'), 'category_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(Category::select('name')->whereColumn('id', 'category_id'),
                        $direction);
                }),
            Column::make(__('messages.common.created_by'), 'user_id')
                ->sortable(function (Builder $query, $direction) {
                    return $query->orderBy(User::select('first_name')->whereColumn('id', 'user_id'),
                        $direction);
                }),
            Column::make(__('messages.rss_feed.auto_update'), 'auto_update')
                ->sortable(),
            Column::make(__('messages.common.action'), 'show_btn_text')->addClass('w-125px'),
        ];
    }

    public function query(): Builder
    {
        return RssFeed::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->with('language', 'category', 'user', 'posts');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.rss_feed_table';
    }

    public function render(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
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
                'componentName' => 'rss_feed.add-button',
            ]);
    }
}
    
