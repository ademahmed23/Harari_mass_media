<?php

use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\VideoController;
use App\Http\Controllers\Frontend\PollController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatbotController;
// use Illuminate\Support\Facades\Route;
//use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use App\Models\Harari;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('language', LanguageController::class)->name('language');

/** News Details Routes */
Route::get('news-details/{slug}', [HomeController::class, 'ShowNews'])->name('news-details');

/** News Details Routes */
Route::get('/chef', [HomeController::class, 'chef'])->name('chef');

Route::get('news', [HomeController::class, 'news'])->name('news');
Route::get('video', [VideoController::class, 'index'])->name('video');
Route::post('submit', [PollController::class, 'submit'])->name('poll_submit');
// Route::get('poll_previous', [PollController::class, 'previous'])->name('poll_previous');

/** News Comment Routes */
Route::post('news-comment', [HomeController::class, 'handleComment'])->name('news-comment');
Route::post('news-comment-replay', [HomeController::class, 'handleReplay'])->name('news-comment-replay');

Route::delete('news-comment-destroy', [HomeController::class, 'commentDestory'])->name('news-comment-destroy');

/** Newsletter Routes */
Route::post('subscribe-newsletter', [HomeController::class, 'SubscribeNewsLetter'])->name('subscribe-newsletter');

/** About Page Route */
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('poll_previous', [HomeController::class, 'previous'])->name('poll_previous');
Route::post('/chatbot/send-message', [ChatbotController::class, 'sendMessage']);
Route::get('frontend/pages/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
// Terms and Condition Route
Route::get('frontend/pages/terms-and-condition', [HomeController::class, 'termsAndCondition'])->name('terms-and-condition');
Route::get('about-us', [HomeController::class, 'aboutIndex'])->name('aboutindex');

/** Contact Page Route */
Route::get('contact', [HomeController::class, 'contact'])->name('contact');
/** Contact Page Route */
Route::post('contact', [HomeController::class, 'handleContactFrom'])->name('contact.submit');


Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');
/* clear all cache */
Route::get('/clear-all', function () {
    Artisan::call('optimize:clear');
    echo Artisan::output();
});

Route::get('/products', [HomeController::class, 'products'])->name('index');
/** Show Product details page */
Route::get('/product/{slug}', [HomeController::class, 'showProduct'])->name('product.show');

/** Product Modal Route */
Route::get('/load-product-modal/{productId}', [HomeController::class, 'loadProductModal'])->name('load-product-modal');

Route::post('product-review', [HomeController::class, 'productReviewStore'])->name('product-review.store');



