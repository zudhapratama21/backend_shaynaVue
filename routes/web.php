<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;

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


Route::get('/',[dashboardController::class,'index'])->name('dashboard');

Auth::routes();

Route::resource('products', ProductController::class);
Route::resource('gallery', GalleryController::class);

Route::get('transaction/{id}/set-status',[TransactionController::class,'setStatus'])->name('transaction.status');

Route::resource('transaction', TransactionController::class);

