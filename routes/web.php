<?php

use Illuminate\Support\Facades\Route;

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

Route::resource('news', \App\Http\Controllers\Front\NewsController::class)->middleware('caching.data.setting');
Route::group(['prefix' => 'news', 'as' => 'news.', 'middleware' => ['caching.data.setting']], function() {
    Route::prefix('get')->group(function () {
        Route::get('{categoryId}/category', [App\Http\Controllers\Front\NewsController::class, 'category'])->name('get.category');
    });
});
Route::resource('emagazines', \App\Http\Controllers\Front\EmagazineController::class)->middleware('caching.data.setting');
Route::group(['prefix' => 'emagazines', 'as' => 'emagazines.', 'middleware' => ['caching.data.setting']], function() {
    Route::prefix('get')->group(function () {
        Route::get('{categoryId}/category', [App\Http\Controllers\Front\EmagazineController::class, 'category'])->name('get.category');
    });
});
Route::get('contact', [App\Http\Controllers\Front\ContactController::class, 'index'])->name('contact')->middleware('caching.data.setting');
Route::get('gallery', [App\Http\Controllers\Front\GalleryController::class, 'index'])->name('gallery')->middleware('caching.data.setting');
Route::get('/', [App\Http\Controllers\HomepageController::class, 'index'])->name('index')->middleware('caching.data.setting');
