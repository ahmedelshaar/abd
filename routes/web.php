<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TypesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SliderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'],function (){
    Route::resource('info', InfoController::class);
    Route::resource('testimonial', TestimonialController::class);
    Route::resource('slider',SliderController::class);
    Route::resource('offer',OfferController::class);
    Route::resource('about',AboutController::Class);
    Route::resource('portfolio',PortfolioController::class);
    Route::resource('type',TypesController::class);
    Route::resource('social',SocialController::class);
    Route::resource('contact',ContactController::class);
});

Route::get('/', [FrontController::class,'index'])->name('home');
Route::get('portfolios', [FrontController::class,'portfolios'])->name('portfolios');
Route::get('portfolio/{id}', [FrontController::class,'portfolio'])->name('portfolio');
Route::get('about', [FrontController::class,'about'])->name('about');
Route::get('contact', [FrontController::class,'contact'])->name('contact');
Route::post('message', [FrontController::class,'message'])->name('message');

Auth::routes();
