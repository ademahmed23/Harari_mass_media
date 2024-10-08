<?php
namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateRssFeedRequest;
use App\Http\Requests\UpdateRssFeedRequest;
use App\Models\Post;
use App\Models\RssFeed;
use App\Models\Category;
use App\Models\Language;

use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\RssFeedRepository;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laracasts\Flash\Flash;

class RssFeedController extends AppBaseController
{
    /**
     * @var RssFeedRepository
     */
    public RssFeedRepository $rssFeedRepo;

    /**
     * UserController constructor.
     *
     * @param  RssFeedRepository  $rssFeedRepository
     */
    public function __construct(RssFeedRepository $rssFeedRepository)
    {
        $this->rssFeedRepo = $rssFeedRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.rss_feed.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(){
    $languages = Language::all();
    
        return view('admin.rss_feed.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateRssFeedRequest  $request
     * @return Application|RedirectResponse|Redirector
     */
    public function fetchCategory(Request $request)
    {
        $categories = Category::where('language', $request->lang)->get();
        return $categories;
    }
    public function store(CreateRssFeedRequest $request)
    {
        
        $input = $request->all();

        $this->rssFeedRepo->store($input);

        Flash::success(__('messages.placeholder.rss_feed_create_successfully'));

        return redirect(route('admin.rss-feed.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  RssFeed  $rssFeed
     * @return Application|Factory|View
     */
    public function edit(RssFeed $rssFeed)
    {
        return view('admin.rss_feed.edit', compact('rssFeed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateRssFeedRequest  $request
     * @param  RssFeed  $rssFeed
     * @return Application|Redirector|RedirectResponse
     */
    public function update(UpdateRssFeedRequest $request, RssFeed $rssFeed)
    {
        $input = $request->all();
        $this->rssFeedRepo->update($input, $rssFeed);
        Flash::success(__('messages.placeholder.rss_feed_update_successfully'));

        return redirect(route('admin.rss-feed.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  RssFeed  $rssFeed
     * @return JsonResponse
     */
    public function destroy(RssFeed $rssFeed): JsonResponse
    {
        $post = Post::whereRssId($rssFeed->id);
        $post->delete();
        $rssFeed->delete();

        return $this->sendSuccess(__('messages.placeholder.rss_feed_update_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  RssFeed  $rssFeed
     * @return JsonResponse
     */
    public function manuallyUpdate(RssFeed $rssFeed): JsonResponse
    {
        $this->rssFeedRepo->manuallyUpdate($rssFeed);

        return $this->sendSuccess(__('messages.placeholder.feed_updated_successfully'));
    }
}