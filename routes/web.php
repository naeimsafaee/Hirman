<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MagController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FestivalController;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/service',[ServiceController::class,'index'])->name('service.index');
Route::get('/service/{slug}',[ServiceController::class,'show'])->name('service.show');

Route::get('/movie',[MovieController::class,'index'])->name('movie.index');
Route::get('/movie/{movie}',[MovieController::class,'show'])->name('movie.show');

Route::get('/blog',[MagController::class,'index_blog'])->name('blog.index');
Route::get('/blog/{slug}',[MagController::class,'show_blog'])->name('blog.show');

Route::get('/internal-news',[MagController::class,'index_internal'])->name('internal.index');
Route::get('/internal-news/{slug}',[MagController::class,'show_internal'])->name('internal.show');

Route::get('/foreign-news',[MagController::class,'index_foreign'])->name('foreign.index');
Route::get('/foreign-news/{slug}',[MagController::class,'show_foreign'])->name('foreign.show');

Route::get('/festival-news',[FestivalController::class,'index_news'])->name('news.index');
Route::get('/festival-news/{slug}',[FestivalController::class,'show_news'])->name('news.show');

Route::get('/festival-playtime',[FestivalController::class,'index_playtime'])->name('playtime.index');
Route::get('/festival-playtime/{slug}',[FestivalController::class,'show_playtime'])->name('playtime.show');

Route::get('/festival-winner',[FestivalController::class,'index_winner'])->name('winner.index');
Route::get('/festival-winner/{slug}',[FestivalController::class,'show_winner'])->name('winner.show');

Route::get('/contact-us',[HomeController::class,'contact'])->name('contact.index');
Route::post('/contact-us',[HomeController::class,'contact_store'])->name('contact.store');

Route::get('/about-us',[HomeController::class,'about'])->name('about.index');

Auth::routes();



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
