<?php

use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductDetailsController;
use Illuminate\Support\Facades\Route;

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
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index'])->name('home.index');
Route::get('/product-detail',[ProductDetailsController::class,'index'])->name('product-details.index');
Route::get('/about',[AboutusController::class,'index'])->name('abouts.index');
Route::get('/news',[NewsController::class,'index'])->name('news.index');
