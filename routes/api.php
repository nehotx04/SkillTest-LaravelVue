<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuotesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('/register', [UserController::class, 'register']);
// Route::post('/login', [UserController::class, 'login']);

Route::group(['prefix' => 'quotes'], function () {
    Route::get('/random', [QuotesController::class, 'getFiveQuotes']);
    Route::get('/favorites', [QuotesController::class, 'getFavorites']);
    Route::delete('/favorite/delete/{id}', [QuotesController::class, 'deleteFavorite']);
    Route::post('/addFavorite', [QuotesController::class, 'markAsFavorite']);
});
