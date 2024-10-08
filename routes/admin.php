<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\Category1Controller;
use App\Http\Controllers\Admin\HeroController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\RssFeedController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FooterGridOneController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\FooterGridThreeController;
use App\Http\Controllers\Admin\FooterGridTwoController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\HomeSectionSettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LocalizationController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RolePermisionController;
use App\Http\Controllers\Admin\RoleUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialCountController;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\AdminVideoController;
use App\Http\Controllers\Admin\AdminLiveChannelController;
use App\Http\Controllers\Admin\AdminOnlinePollController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\PollController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Request\AboutUpdateRequest;

use App\Models\FooterGridOne;
use App\Models\Setting;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){

    Route::get('login', [AdminAuthenticationController::class, 'login'])->name('login');
    Route::post('login', [AdminAuthenticationController::class, 'handleLogin'])->name('handle-login');
    Route::post('logout', [AdminAuthenticationController::class, 'logout'])->name('logout');

    /** Reset passeord */
    Route::get('forgot-password', [AdminAuthenticationController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('forgot-password', [AdminAuthenticationController::class, 'sendResetLink'])->name('forgot-password.send');

    Route::get('reset-password/{token}', [AdminAuthenticationController::class, 'resetPassword'])->name('reset-password');
    Route::post('reset-password', [AdminAuthenticationController::class, 'handleResetPassword'])->name('reset-password.send');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['admin']], function(){
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    /**Profile Routes */
    Route::put('profile-password-update/{id}', [ ProfileController::class, 'passwordUpdate'])->name('profile-password.update');
    Route::resource('profile', ProfileController::class);

    /** Language Route */
    Route::resource('language', LanguageController::class);

    /** Category Route */
    Route::resource('category', CategoryController::class);

    /** News Route */
    Route::get('fetch-news-category', [NewsController::class, 'fetchCategory'])->name('fetch-news-category');
    Route::get('toggle-news-status', [NewsController::class, 'toggleNewsStatus'])->name('toggle-news-status');
    Route::get('news-copy/{id}', [NewsController::class, 'copyNews'])->name('news-copy');
    Route::get('pending-news', [NewsController::class, 'pendingNews'])->name('pending.news');
    Route::put('approve-news', [NewsController::class, 'approveNews'])->name('approve.news');

    Route::resource('news', NewsController::class);

    /** Home Section Setting Route */
    Route::get('home-section-setting', [HomeSectionSettingController::class, 'index'])->name('home-section-setting.index');
    Route::put('home-section-setting', [HomeSectionSettingController::class, 'update'])->name('home-section-setting.update');

    /** Social Count Route */
    Route::resource('social-count', SocialCountController::class);

    /** Ad Route */
    Route::resource('ad', AdController::class);

    /** Subscriber Route */
    Route::resource('subscribers', SubscriberController::class);
    Route::resource('banner-slider', BannerSliderController::class);
    Route::resource('slider', SliderController::class);


    /** Chefs Routes */
    Route::put('chefs-title-update', [ChefController::class, 'updateTitle'])->name('chefs-title-update');
    Route::resource('chefs', ChefController::class);
    /** Social links Route */
    Route::resource('social-link', SocialLinkController::class);

    /** Footer Info Route */
    Route::resource('footer-info', FooterInfoController::class);

    /** Footer Grid One Route */
    Route::post('footer-grid-one-title', [FooterGridOneController::class, 'handleTitle'])->name('footer-grid-one-title');
    Route::resource('footer-grid-one', FooterGridOneController::class);

    /** Footer Grid Two Route */
    Route::post('footer-grid-two-title', [FooterGridTwoController::class, 'handleTitle'])->name('footer-grid-two-title');
    Route::resource('footer-grid-two', FooterGridTwoController::class);

    /** Footer Grid Two Route */
    Route::post('footer-grid-three-title', [FooterGridThreeController::class, 'handleTitle'])->name('footer-grid-three-title');
    Route::resource('footer-grid-three', FooterGridThreeController::class);

    /** About page Route */
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');

    /** Contact page Route */
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

    /** Contact Message Route */
    Route::get('contact-message', [ContactMessageController::class, 'index'])->name('contact-message.index');
    Route::post('contact-send-replay', [ContactMessageController::class, 'sendReplay'])->name('contact.send-replay');

    /** Settings Routes */
    Route::get('setting', [SettingController::class, 'index'])->name('setting.index');
    /** Settings Routes */
    Route::put('general-setting', [SettingController::class, 'updateGeneralSetting'])->name('general-setting.update');
    Route::put('seo-setting', [SettingController::class, 'updateSeoSetting'])->name('seo-setting.update');
    Route::put('appearance-setting', [SettingController::class, 'updateAppearanceSetting'])->name('appearance-setting.update');
    Route::put('microsoft-api-setting', [SettingController::class, 'updateMicrosoftApiSetting'])->name('microsoft-api-setting.update');


    /** Role and Permissions Routes */
    Route::get('role', [RolePermisionController::class, 'index'])->name('role.index');
    Route::get('role/create', [RolePermisionController::class, 'create'])->name('role.create');
    Route::post('role/create', [RolePermisionController::class, 'store'])->name('role.store');
    Route::get('role/{id}/edit', [RolePermisionController::class, 'edit'])->name('role.edit');
    Route::put('role/{id}/edit', [RolePermisionController::class, 'update'])->name('role.update');
    Route::delete('role/{id}/destory', [RolePermisionController::class, 'destory'])->name('role.destory');

    /** Admin User Routes */
    Route::resource('role-users', RoleUserController::class);

    /** Localization Routes */
    Route::get('admin-localization', [LocalizationController::class, 'adminIndex'])->name('admin-localization.index');
    Route::get('frontend-localization', [LocalizationController::class, 'frontnedIndex'])->name('frontend-localization.index');

    Route::post('extract-localize-string', [LocalizationController::class, 'extractLocalizationStrings'])->name('extract-localize-string');

    Route::post('update-lang-string', [LocalizationController::class, 'updateLangString'])->name('update-lang-string');

    Route::get('/admin/live/live-channel/show', [ AdminLiveChannelController::class, 'show'])->name('admin_live_channel_show');
    Route::get('/admin/live-channel/create', [AdminLiveChannelController::class, 'create'])->name('admin_live_channel_create');
    Route::post('/admin/live/live-channel/store', [AdminLiveChannelController::class, 'store'])->name('admin_live_channel_store');
    Route::get('/admin/live/live-channel/edit/{id}', [AdminLiveChannelController::class, 'edit'])->name('admin_live_channel_edit');
    Route::post('/admin/live/live-channel/update/{id}', [AdminLiveChannelController::class, 'update'])->name('admin_live_channel_update');
    Route::get('/admin/live/live-channel/delete/{id}', [AdminLiveChannelController::class, 'delete'])->name('admin_live_channel_delete');


    Route::post('translate-string', [LocalizationController::class, 'translateString'])->name('translate-string');
    Route::get('/admin/video/show', [AdminVideoController::class, 'show'])->name('admin_video_show')->middleware('admin:admin');
    Route::get('/admin/video/create', [AdminVideoController::class, 'create'])->name('admin_video_create')->middleware('admin:admin');
    Route::post('/admin/video/store', [AdminVideoController::class, 'store'])->name('admin_video_store');
    Route::get('/admin/video/edit/{id}', [AdminVideoController::class, 'edit'])->name('admin_video_edit')->middleware('admin:admin');
    Route::post('/admin/video/update/{id}', [AdminVideoController::class, 'update'])->name('admin_video_update');
    Route::get('/admin/video/delete/{id}', [AdminVideoController::class, 'delete'])->name('admin_video_delete')->middleware('admin:admin');

    //poll
    Route::get('/admin/poll/online-poll/show', [AdminOnlinePollController::class, 'show'])->name('admin_online_poll_show')->middleware('admin:admin');
Route::get('/admin/poll/online-poll/create', [AdminOnlinePollController::class, 'create'])->name('admin_online_poll_create')->middleware('admin:admin');
Route::post('/admin/poll/online-poll/store', [AdminOnlinePollController::class, 'store'])->name('admin_online_poll_store');
Route::get('/admin/poll/online-poll/edit/{id}', [AdminOnlinePollController::class, 'edit'])->name('admin_online_poll_edit')->middleware('admin:admin');
Route::post('/admin/poll/online-poll/update/{id}', [AdminOnlinePollController::class, 'update'])->name('admin_online_poll_update');
Route::get('/admin/poll/online-poll/delete/{id}', [AdminOnlinePollController::class, 'delete'])->name('admin_online_poll_delete')->middleware('admin:admin');

});


//the second poll
// Route::middleware('permission:manage_polls')->group(function () {
    Route::resource('polls', PollController::class);
    Route::get('polls-vote-result/{id}', [PollController::class, 'pollResult'])->name('polls-vote-result');
// });

//comment
// Route::middleware('permission:manage_polls')->group(function () {
//     Route::get('post-comments', [CommentController::class, 'index'])->name('post-comments.index');
//     Route::delete('post-comments/{comment}', [CommentController::class, 'delete'])->name('post-comments.destroy');
// });

Route::put('team-title-update', [TeamController::class, 'updateTitle'])->name('team-title-update');
    Route::resource('team', TeamController::class);

Route::get('/hero', [HeroController::class, 'index'])->name('hero.index');
Route::put('/hero', [HeroController::class, 'update'])->name('hero.update');
Route::get('admin/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::post('admin/privacy-policy', [PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');
    /** Terms and Condition Route */
    Route::get('admin/terms-and-condition', [TermsAndConditionController::class, 'index'])->name('terms-and-condition.index');
    Route::post('admin/terms-and-condition', [TermsAndConditionController::class, 'update'])->name('terms-and-condition.update');
    /** Privacy Policy Route */
    Route::get('/admin/about-us', [AboutUsController::class, 'index'])->name('about-us.index');
    Route::post('/admin/about-us', [AboutUsController::class, 'update'])->name('about-us.update');
    // Route::get('about-us', [AboutUsController::class, 'index'])->name('about-us.index');
    // Route::post('about-us', [AboutUSController::class, 'update'])->name('about-us.update');
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);
    Route::get('admin/counter', [CounterController::class, 'index'])->name('counter.index');
    Route::put('admin/counter', [CounterController::class, 'update'])->name('counter.update');

    Route::resource('/admin/product/category', Category1Controller::class);

    /** Product Routes */
    Route::resource('product', ProductController::class);

    /** Product Gallery Routes */
    Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
    Route::resource('product-gallery', ProductGalleryController::class);

    /** Product Size Routes */
    Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
    Route::resource('product-size', ProductSizeController::class);

    /** Product Size Routes */
    Route::resource('product-option', ProductOptionController::class);

    /** Product Reviews Routes */
    Route::get('product-reviews', [ProductReviewController::class, 'index'])->name('product-reviews.index');
    Route::post('product-reviews', [ProductReviewController::class, 'updateStatus'])->name('product-reviews.update');
    Route::delete('product-reviews/{id}', [ProductReviewController::class, 'destroy'])->name('product-reviews.destroy');
//feeds
        Route::resource('rss-feed', RssFeedController::class);
        Route::post('rss-feed/manuallyUpdate/{rssFeed}', [RssFeedController::class, 'manuallyUpdate'])->name('rss-feed.manuallyUpdate');
