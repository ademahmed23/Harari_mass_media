<?php

use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;
use \App\Models\Harari;
use App\Models\News;
use App\Models\PollResult;
use App\Models\Poll;
use \App\Models\Photogallery;
use \App\Models\Newscategory;
use \App\Models\Settings;
use \App\Models\Seooptimization;
use App\Models\Socialshare;
use PhpParser\Node\Expr\Cast\String_;
use Illuminate\Support;
use Illuminate\Support\Str;




/** format news tags */
if (!function_exists('currencyPosition')) {
    function currencyPosition($price): string
    {
        if (config('settings.site_currency_icon_position') === 'left') {
            return config('settings.site_currency_icon') . $price;
        } else {
            return $price . config('settings.site_currency_icon');
        }
    }
}
function formatTags(array $tags): String
{
   return implode(',', $tags);
}

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

/** get selected language from session */
function getLangauge(): string
{
    if(session()->has('language')){
        return session('language');
    }else {
        try {
            $language = Language::where('default', 1)->first();
            setLanguage($language->lang);

            return $language->lang;
        } catch (\Throwable $th) {
            setLanguage('en');

            return $language->lang;
        }
    }
}

/** set language code in session */
function setLanguage(string $code): void
{
    session(['language' => $code]);
}

/** Truncate text */

function truncate(string $text, int $limit = 45): String
{
    return Str::limit($text, $limit, '...');
}

/** Convert a number in K format */

function convertToKFormat(int $number): String
{
    if($number < 1000){
        return $number;
    }elseif($number < 1000000){
        return round($number / 1000, 1) . 'K';
    }else {
        return round($number / 1000000, 1). 'M';
    }
}

/** Make Sidebar Active */

function setSidebarActive(array $routes): ?string
{
    foreach($routes as $route){
        if(request()->routeIs($route)){
            return 'active';
        }
    }
    return '';
}

/** get Setting */

function getSetting($key){
    $data = Setting::where('key', $key)->first();
    return $data->value;
}

/** check permission */

function canAccess(array $permissions){

   $permission = auth()->guard('admin')->user()->hasAnyPermission($permissions);
   $superAdmin = auth()->guard('admin')->user()->hasRole('Super Admin');

   if($permission || $superAdmin){
    return true;
   }else {
    return false;
   }

}

/** get admin role */

function getRole(){
    $role = auth()->guard('admin')->user()->getRoleNames();
    return $role->first();
}

/** check user permission */

function checkPermission(string $permission){
    return auth()->guard('admin')->user()->hasPermissionTo($permission);
}

function getPopularTags()
{
    $countPostsTags = DB::table('analytics')->select('post_id',
        DB::raw('count("post_id") as total_count'))
            ->limit(6)
            ->groupBy('post_id')
            ->orderBy('total_count', 'desc')
            ->get();

    static $popularTags = [];
    $postData = News::toBase()->whereVisibility(News::activeEntries())
        ->whereIn('id', $countPostsTags->pluck('post_id')->toArray())->get();
    if (empty($popularTags)) {
        foreach ($countPostsTags as $countPostsTag) {
            $postTag = $postData->where('id', $countPostsTag->post_id)->pluck('tags', 'id')->sort()->first();
            if (! empty($postTag)) {
                $popularTags[] = $postTag;
            }
        }
    }

    $tagArr = [];
    foreach (array_filter($popularTags) as $tags) {
        foreach (explode(',', $tags) as $tag) {
            $tagArr[] = $tag;
        }
    }

    return array_unique($tagArr);
}


//thesecondone 

function breakingnews(){
    $breakingnews = Harari::join('newssubcategories','hararis.subcategory_id','=','newssubcategories.id')
        ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
        ->select('hararis.id','hararis.title','hararis.created_at','newscategories.name as news_category','newscategories.slug as news_categoryslug')
        ->where('hararis.breaking_news',1)
        ->where('hararis.status',1)
        ->latest()
        ->get();
    return $breakingnews;
}
function popularsnews(){
    $popularsnews = Harari::join('newssubcategories','hararis.subcategory_id','=','newssubcategories.id')
        ->join('newscategories','newssubcategories.category_id','=','newscategories.id')
        ->join('users','hararis.reporter_id','=','users.id')
        ->select('hararis.id','hararis.title','hararis.image','hararis.date','newscategories.name as news_category','newscategories.slug as news_categoryslug',DB::raw("CONCAT(users.name,' ',users.name) AS reporter_name"))
        ->where('hararis.status',1)
        ->orderByDesc('hararis.viewers')
        ->limit(3)
        ->get();
    return $popularsnews;
}
function newscategories(){
    $newscategories = Newscategory::where('type','news')
        ->orderBy('id')
        ->get();
    return $newscategories ;
}
function photogalleries(){
    $photogalleries = Photogallery::where('status',1)
        ->select('id','image')
        ->orderByDesc('id')
        ->limit(6)
        ->get();
    return $photogalleries ;
}
function settings(){
    $settings = Settings::first();
    return $settings;
}
function seooptimization(){
    $seooptimization = Seooptimization::first();
    return $seooptimization ;
}
function advertisement() {
    $advertisement = \App\Models\Advertisement::latest()->first();
    return $advertisement ;
}
function googleanalytics() {
    $googleanalytics = \App\Models\Googleanalytic::latest()->get();
    return $googleanalytics ;
}
function home() {
    $home = Newscategory::where('type','home')->value('name');
    return $home ;
}
function contactus() {
    $contactus = Newscategory::where('type','contact')->value('name');
    return $contactus ;
}
function socials(){
    $socials = Socialshare::take(5)->get();
    return $socials;
}

if(!function_exists('getYtThumbnail')){
    function getYtThumbnail(?string $url) : ?string
    {
        $pattern = '/[?&]v=([a-zA-Z0-9_-]{11})/';

        if(preg_match($pattern, $url, $matches)){
            $id = $matches[1];

            return "https://img.youtube.com/vi/$id/mqdefault.jpg";
        }

        return null;
    }}
    if (!function_exists('productTotal')) {
        function productTotal($rowId)
        {
            $total = 0;
    
            $product = Cart::get($rowId);
    
            $productPrice = $product->price;
            $sizePrice = $product->options?->product_size['price'] ?? 0;
            $optionsPrice = 0;
    
            foreach ($product->options->product_options as $option) {
                $optionsPrice += $option['price'];
            }
    
            $total += ($productPrice + $sizePrice + $optionsPrice) * $product->qty;
    
    
            return $total;
        }
    }

    if (!function_exists('getYtThumbnail')) {
        function getYtThumbnail($link, $size = 'medium')
        {
            try {
                $videoId = explode("?v=", $link);
                $videoId = $videoId[1];
    
                $finalSize = match ($size) {
                    'low' => 'sddefault',
                    'medium' => 'mqdefault',
                    'high' => 'hqdefault',
                    'max' => 'maxresdefault'
                };
    
                return "https://img.youtube.com/vi/$videoId/$finalSize.jpg";
            } catch (\Exception $e) {
                logger($e);
                return NULL;
            }
        }

    
        /** get product discount in percent */
        if (!function_exists('setSidebarActive')) {
            function setSidebarActive(array $routes)
            {
                foreach($routes as $route){
                    if(request()->routeIs($route)){
                        return 'active';
                    }
                }
                return '';
            }
        }


    }
    /**
 * @return Poll[]|Builder[]|Collection
 */
function getPoll()
{
    if (! Auth::check()) {
        return Poll::where('vote_permission', 1)->whereStatus(1)->limit(3)->get();
    } else {
        return Poll::whereStatus(1)->limit(3)->get();
    }
}

/**
 * @return string[]
 */
function getOption(): array
{
    return [
        'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'option8', 'option9', 'option10',
    ];
}

/**
 * @param  int  $pollId
 * @return array
 */
function getPollStatistics($pollId): array
{
    $pollResults = PollResult::with('poll')->wherePollId($pollId)->get();
    $resultsAns = $pollResults->pluck('answer')->toArray();
    $totalPollResults = count($pollResults);
    $totalPerAns = array_count_values($resultsAns);
    $optionAns = [];
    foreach ($pollResults as $result) {
        $poll = $result->poll;
        foreach (getOption() as $option) {
            if (! empty($poll->$option)) {
                $optionAns[$poll->$option] = ! empty($totalPerAns[$poll->$option])
                    ? intval($totalPerAns[$poll->$option] * 100 / $totalPollResults) : 0;
            }
        }
    }

    $data['totalPollResults'] = $totalPollResults;
    $data['optionAns'] = $optionAns;
    $data['pollId'] = $pollId;

    return $data;
}
