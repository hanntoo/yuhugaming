<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('pages.dashboard');
// });
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

Route::resource('dashboard', 'App\Http\Controllers\DashboardController');

Route::resource('products', 'App\Http\Controllers\ProductController');

Route::resource('transactions', 'App\Http\Controllers\TransactionController');

Auth::routes();

Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');