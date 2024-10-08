<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AboutUs;
use App\Models\OnlinePoll;
use App\Models\TermsAndCondition;
use App\Models\PrivacyPolicy;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Category1;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Comment;
use App\Models\Hero;
use App\Models\Contact;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\SectionTitle;
use App\Models\Video;
use App\Models\Slider;
use App\Models\RecivedMail;
use App\Models\SocialCount;
use App\Models\SocialLink;
use App\Models\Chef;
use App\Models\Subscriber;
use App\Models\Tag;
use App\Http\Controllers\Frontend\VideoController;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use App\Models\WhyChooseUs;
use App\Models\Counter;;

use DB;


class HomeController extends Controller
{
    public function index(): view
    {
        $category1s= Category1::where(['show_at_home' => 1, 'status' => 1])->get();

    $language = Language::all();
    $products = Product::where(['status' => 1])->orderBy('id', 'DESC');
    $hero = Hero::first();
    $about = AboutUs::first();
    $sliders = Slider::where('status', 1)->get();
    $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
    $chefs = Chef::where(['status' => 1])->paginate(4);

    $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $counter = Counter::first();
        $breakingNews = News::where(['is_breaking_news' => 1])
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(10)
            ->get();
        $heroSlider = News::with(['category', 'auther'])
            ->where('show_at_slider', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(7)
            ->get();

        $recentNews = News::with(['category', 'auther'])
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(6)
            ->get();
        $popularNews = News::with(['category'])
            ->where('show_at_popular', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('updated_at', 'DESC')
            ->take(4)
            ->get();
            // $videos = Video::where('video_id',getLangauge())->first()
            // ->orderBy('id','DESC')
            // ->take(2)
            // ->get();
            $videos = Video::take(2)->get();
            $videoss = Video::take(4)->get();
            $video = Video::latest()->take(1)->get();
            start_measure('render', 'getPoll');
            $data['getPoll'] = getPoll();
            stop_measure('render', 'getPoll');
            start_measure('render', 'getOption');
            $data['getOption'] = getOption();
            stop_measure('render', 'getOption');




        $HomeSectionSetting = HomeSectionSetting::where('language', getLangauge())->first();

        if ($HomeSectionSetting) {
            $categorySectionOne = News::where('category_id', $HomeSectionSetting->category_section_one)
                ->activeEntries()
                ->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionTwo = News::where('category_id', $HomeSectionSetting->category_section_two)
                ->activeEntries()
                ->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(8)
                ->get();

            $categorySectionThree = News::where('category_id', $HomeSectionSetting->category_section_three)
                ->activeEntries()
                ->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(6)
                ->get();

            $categorySectionFour = News::where('category_id', $HomeSectionSetting->category_section_four)
                ->activeEntries()
                ->withLocalize()
                ->orderBy('id', 'DESC')
                ->take(4)
                ->get();
                // $categorySectionFive = Video::where('video_id',$HomeSectionSetting->category_section_five)
                // ->withLocalize()
                // ->orderBy('id', 'DESC')
                // ->get();
        } else {
            $categorySectionOne = collect();
            $categorySectionTwo = collect();
            $categorySectionThree = collect();
            $categorySectionFour = collect();
            $categorySectionFive= collect();
        }

        $mostViewedPosts = News::activeEntries()->withLocalize()->orderBy('views', 'DESC')->take(3)->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $mostCommonTags = $this->mostCommonTags();

        $ad = Ad::first();
        // $video = Video::first();

        return view('frontend.home', compact('videoss','breakingNews','video', 'products','heroSlider', 'sliders', 'category1s','chefs','about','hero','recentNews', 'popularNews', 'categorySectionOne', 'categorySectionTwo', 'categorySectionThree', 'categorySectionFour', 'mostViewedPosts', 'socialCounts', 'mostCommonTags', 'videos','ad'))->with($data);
    }

    public function ShowNews(string $slug)
    {
        $news = News::with(['auther', 'tags', 'comments'])
            ->where('slug', $slug)
            ->activeEntries()
            ->withLocalize()
            ->first();

        $this->countView($news);

        $recentNews = News::with(['category', 'auther'])
            ->where('slug', '!=', $news->slug)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $mostCommonTags = $this->mostCommonTags();
        $nextPost = News::where('id', '>', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'asc')
            ->first();

        $previousPost = News::where('id', '<', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'desc')
            ->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)
            ->where('category_id', $news->category_id)
            ->activeEntries()
            ->withLocalize()
            ->take(5)
            ->get();


        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();
        $video_data= Video::where(['language' => getLangauge()])->get();
        return view('frontend.news-details', compact('news', 'recentNews', 'mostCommonTags', 'nextPost', 'previousPost', 'relatedPosts', 'socialCounts', 'ad','video_data'));
    }

    public function news(Request $request)
    {
        $news = News::query();

        $news->when($request->has('tag'), function ($query) use ($request) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        });

        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search'), function ($query) use ($request) {
            $query
                ->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->search . '%')->orWhere('content', 'like', '%' . $request->search . '%');
                })
                ->orWhereHas('category', function ($query) use ($request) {
                    $query->where('name', 'like', '%' . $request->search . '%');
                });
        });

        $news = $news->activeEntries()->withLocalize()->paginate(20);

        $recentNews = News::with(['category', 'auther'])
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();
        $mostCommonTags = $this->mostCommonTags();

        $categories = Category::where(['status' => 1, 'language' => getLangauge()])->get();

        $ad = Ad::first();

        return view('frontend.news', compact('news', 'recentNews', 'mostCommonTags', 'categories', 'ad'));
    }

    public function countView($news)
    {
        if (session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');

            if (!in_array($news->id, $postIds)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);
        } else {
            session(['viewed_posts' => [$news->id]]);

            $news->increment('views');
        }
    }

    public function mostCommonTags()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))->where('language', getLangauge())->groupBy('name')->orderByDesc('count')->take(15)->get();
    }

    public function handleComment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'string', 'max:1000'],
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');
        return redirect()->back();
    }

    public function handleReplay(Request $request)
    {
        $request->validate([
            'replay' => ['required', 'string', 'max:1000'],
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->replay;
        $comment->save();
        toast(__('frontend.Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDestory(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => __('frontend.Deleted Successfully!')]);
        }

        return response(['status' => 'error', 'message' => __('frontend.Someting went wrong!')]);
    }

    public function SubscribeNewsLetter(Request $request)
    {
        $request->validate(
            [
                'email' => ['required', 'email', 'max:255', 'unique:subscribers,email'],
            ],
            [
                'email.unique' => __('frontend.Email is already subscribed!'),
            ],
        );

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => __('frontend.Subscribed successfully!')]);
    }

    public function about()
    {
        $about = About::where('language', getLangauge())->first();
        return view('frontend.about', compact('about'));
    }
    public function submit(Request $request)
    {

        $poll_data = OnlinePoll::where('id',$request->id)->first();
        if($request->vote == 'Yes')
        {
            $updated_yes = $poll_data->yes_vote+1;
            $poll_data->yes_vote = $updated_yes;
        }
        else
        {
            $updated_no = $poll_data->no_vote+1;
            $poll_data->no_vote = $updated_no;
        }
        $poll_data->update();

        session()->put('current_poll_id', $poll_data->id);

        return redirect()->back()->with('success', 'Your vote is counted successfully');

    }
    public function previous()
    {
        // Helpers::read_json();

        // if(!session()->has('language')) {
        //     $language = Language::where('default',1)->first()->lang;
        // } else {
        //     $language = session()->get('language');
        // }
         $language = Language::where('language',getLangauge())->first()->id;
        // $language = Language::all();
        $online_poll_data = OnlinePoll::where('language', getLangauge())->orderBy('id','asc')->get();
        return view('frontend.poll_previous', compact('online_poll_data','language'));
    }

    public function contact()
    {
        $contact = Contact::where('language', getLangauge())->first();
        $socials = SocialLink::where('status', 1)->get();
        return view('frontend.contact', compact('contact', 'socials'));
    }

    public function handleContactFrom(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500'],
        ]);

        try {
            $toMail = Contact::where('language', 'en')->first();

            /** Send Mail */
            Mail::to($toMail->email)->send(new ContactMail($request->subject, $request->message, $request->email));

            /** store the mail */

            $mail = new RecivedMail();
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        } catch (\Exception $e) {
            toast(__($e->getMessage()));
        }

        toast(__('frontend.Message sent successfully!'), 'success');

        return redirect()->back();
    }

    function aboutIndex() : View {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];
    $sliders = Slider::where('status', 1)->get();


    $products = Product::where(['status' => 1])->orderBy('id', 'DESC');

        $sectionTitle = SectionTitle::first();
        $sectionTitles = SectionTitle::whereIn('key', $keys)->pluck('value','key');;

        $hero = Hero::first();
        $about = AboutUs::first();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $counter = Counter::first();
    $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
    $category1s= Category1::where(['show_at_home' => 1, 'status' => 1])->get();

    $chefs = Chef::where(['status' => 1])->paginate(4);


        // $ourFeatures = OurFeature::where('status', 1)->get();
        // $featuredCategories = Category::withCount(['listings'=> function($query){
        //     $query->where('is_approved', 1);
        // }])->where(['show_at_home' => 1, 'status' => 1])->take(6)->get();
        // $counter = Counter::first();
        return view('frontend.pages.about', compact('about','category1s', 'whyChooseUs','counter','chefs','hero','sliders','sectionTitle','sectionTitles'));
    }
    function getSectionTitles() : Collection {
        $keys = [

            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'

        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value','key');
    }

    function privacyPolicy() : View {
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', compact('privacyPolicy'));
    }

    function termsAndCondition() : View {
        $termsAndCondition = TermsAndCondition::first();
        return view('frontend.pages.terms-and-condition', compact('termsAndCondition'));
    }
    function chef() : View {
        $chefs = Chef::where(['status' => 1])->paginate(4);
        return view('frontend.pages.reporters', compact('chefs'));
    }



    function products(Request $request) : View {

        $products = Product::where(['status' => 1])->orderBy('id', 'DESC');

        if($request->has('search') && $request->filled('search')) {
            $products->where(function($query) use ($request) {
                $query->where('name', 'like', '%'.$request->search.'%')
                    ->orWhere('long_description', 'like', '%'.$request->search.'%');
            });
        }

        if($request->has('category') && $request->filled('category')) {
            $products->whereHas('category', function($query) use ($request){
                $query->where('slug', $request->category);
            });
        }

        $products = $products->withAvg('reviews', 'rating')->withCount('reviews')->paginate(12);

        $category1s = Category1::where('status', 1)->get();

        return view('frontend.pages.product', compact('products','category1s'));
    }

    function showProduct(string $slug) : View {
        $product = Product::with(['productImages', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])
        ->withAvg('reviews', 'rating')
        ->withCount('reviews')
        ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()->get();
        $reviews = ProductRating::where(['product_id' => $product->id, 'status' => 1])->paginate(30);
        return view('frontend.pages.product-view', compact('product', 'relatedProducts', 'reviews'));
    }

    function loadProductModal($productId) {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);

        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
    }

    function productReviewStore(Request $request) {
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5', 'integer'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        $hasPurchased = $user->orders()->whereHas('orderItems', function($query) use ($request){
            $query->where('product_id', $request->product_id);
        })
        ->where('order_status', 'delivered')
        ->get();


        if(count($hasPurchased) == 0){
            throw ValidationException::withMessages(['Please Buy The Product Before Submit a Review!']);
        }

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();
        if($alreadyReviewed){
            throw ValidationException::withMessages(['You already reviewed this product']);
        }

        $review = new ProductRating();
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 0;
        $review->save();

        toast()->success('Review added successfully and waiting to approve');

        return redirect()->back();
    }

}
