<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group(
    [
        'prefix' => 'backend', 'as' => 'admin.'
    ],
    function () {
        Route::get('/', function () {
            return view('welcome');
        });
        Route::resource('users', UserController::class);
        Route::resource('category', CategoryController::class);
        Route::resource('subcategory', SubCategoryController::class);
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    }
);

Auth::routes();

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
