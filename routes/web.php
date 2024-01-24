<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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


// Route::get('/login', function () {return view('auth/login');});
// Route::get('/register', function () {return view('auth/register');});

Route::group(['prefix' => 'quotes', 'middleware' => 'auth'], function () {
        Route::get('/random', function () {return view('quotes/random');})->name('quotes.random');
        Route::get('/favorites', function () {return view('quotes/favorites');})->name('quotes.favorites');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
