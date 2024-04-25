<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function()
{
    Route::get('/', 'App\Http\Controllers\HomeController@index');
    Route::get('movies/{slug}', 'App\Http\Controllers\MovieController@show');
});


Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth', 'verified']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\MovieController@index')->name('dashboard');
    Route::resource('movies', 'App\Http\Controllers\MovieController')->except(['index', 'show']);
    Route::resource('tags', 'App\Http\Controllers\TagController');
    Route::resource('cast', 'App\Http\Controllers\CastController');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
