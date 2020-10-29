<?php

use App\Http\Controllers\API\PhotosController;
use App\Http\Controllers\API\SetsController;
use App\Http\Controllers\API\TypesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['json.response']], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

    //public
    Route::post('/login', 'App\Http\Controllers\API\RegisterController@login')->name('login.api');
    Route::post('/register', 'App\Http\Controllers\API\RegisterController@register')->name('register.api');

    Route::get('/photos/{type}', [PhotosController::class, 'index'])->name('photos.index');

    Route::resource('/photos', PhotosController::class)->except(['index']);

    Route::get('/sets/{type}', [SetsController::class, 'index'])->name('sets.index');

    Route::resource('/sets', SetsController::class)->except(['index']);

    Route::get('/hasPassword', [TypesController::class, 'hasPassword'])->name('type.hasPassword');

    Route::post('/checkPassword', [TypesController::class, 'checkPassword'])->name('type.checkPassword');

    Route::resource('/types', TypesController::class);

    Route::middleware('auth:api')->group(function () {
        Route::get('/logout', 'App\Http\Controllers\API\RegisterController@logout')->name('logout');
    });
});
