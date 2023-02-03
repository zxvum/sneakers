<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin;
use App\Http\Livewire\ProductsTable;
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

// home page route
Route::get('/', [Controller::class, 'index'])->name('home');
Route::post('/get-products', [ProductController::class, 'getProducts']);

// auth routing
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function(){
    // login routes
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login/post', [AuthController::class, 'login'])->name('login.post');

    // register routes
    Route::get('/register', [AuthController::class, 'registerView'])->name('register');
    Route::post('/register/post', [AuthController::class, 'register'])->name('register.post');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'role:admin']], function() {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
        Route::get('/', ProductsTable::class)->name('table');
    });
});
Route::view('/ban-page', 'ban')->name('ban')->middleware(['role:ban']);
