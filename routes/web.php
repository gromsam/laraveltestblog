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
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);
Route::get('/articles', [\App\Http\Controllers\PostController::class, 'list']);
Route::get('/articles/{slug}', [\App\Http\Controllers\PostController::class, 'slug']);
Route::post('/article_like', [\App\Http\Controllers\PostController::class, 'articlePlusLike']);
Route::post('/article_view', [\App\Http\Controllers\PostController::class, 'articlePlusView']);

Route::post('/comment', [\App\Http\Controllers\CommentController::class, 'store']);

Route::group(['prefix' => 'tags'], function(){

    Route::get('/{slug}', [\App\Http\Controllers\PostController::class, 'postsByTag']);

});
