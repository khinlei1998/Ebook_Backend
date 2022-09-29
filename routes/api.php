<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MobileAPIControllers\AuthorController;
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

Route::post('admin_login', [LoginController::class, 'login']);
Route::resource('books', BookController::class, ['only' => ['index', 'show']]);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('admin_logout', [LoginController::class, 'logout']);

    // Route::resource('users', UserController::class);
    // Route::resource('books', BookController::class, [ 'except' => ['index', 'show'] ]);
    // Route::post('updated_book', [BookController::class, 'update']);
});

// Route::resource('users', UserController::class);
// Route::resource('category', CategoryController::class);
// Route::resource('subcategory', SubCategoryController::class);
Route::resource('authors', AuthorController::class);
Route::post('authors/{id}', 'App\Http\Controllers\MobileAPIControllers\AuthorController@update');
Route::post('authors/delete/{id}', 'App\Http\Controllers\MobileAPIControllers\AuthorController@destroy');
