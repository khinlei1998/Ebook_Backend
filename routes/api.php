<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MobileAPIControllers\BookController;
use App\Http\Controllers\MobileAPIControllers\AuthorController;
use App\Http\Controllers\MobileAPIControllers\CategoryController;
use App\Http\Controllers\MobileAPIControllers\SubCategoryController;
use App\Http\Controllers\MobileAPIControllers\UserController;
// use Illuminate\Http\Request;
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
// Route::resource('books', BookController::class, ['only' => ['index', 'show']]);

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

Route::resource('books', BookController::class);
Route::post('books/{id}', 'App\Http\Controllers\MobileAPIControllers\BookController@update');
Route::post('books/delete/{id}', 'App\Http\Controllers\MobileAPIControllers\BookController@destroy');

Route::resource('category', CategoryController::class);
Route::post('category/{id}', 'App\Http\Controllers\MobileAPIControllers\CategoryController@update');
Route::post('category/delete/{id}', 'App\Http\Controllers\MobileAPIControllers\CategoryController@destroy');

Route::resource('subcategory', SubCategoryController::class);
Route::post('subcategory/{id}', 'App\Http\Controllers\MobileAPIControllers\SubCategoryController@update');
Route::post('subcategory/delete/{id}', 'App\Http\Controllers\MobileAPIControllers\SubCategoryController@destroy');

Route::resource('users', UserController::class);
Route::post('users/{id}', 'App\Http\Controllers\MobileAPIControllers\UserController@update');
Route::post('users/delete/{id}', 'App\Http\Controllers\MobileAPIControllers\UserController@destroy');
