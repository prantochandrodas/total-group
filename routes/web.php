<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\backend\home\CoreIndustryController;
use App\Http\Controllers\backend\Home\HomeAboutController;
use App\Http\Controllers\backend\Home\HomeBannerController;
use App\Http\Controllers\backend\product\ProductController;
use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\CareerController;
use App\Http\Controllers\frontend\EmployeeEngagementController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/product/{slug}', [ProductDetailsController::class, 'index'])->name('product-details.index');
Route::get('/all-product', [ProductDetailsController::class, 'allproduct'])->name('all-products');
Route::get('/about', [AboutusController::class, 'index'])->name('abouts.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/employee-engagement', [EmployeeEngagementController::class, 'index'])->name('employee-engagments.index');
Route::get('/album-details', [EmployeeEngagementController::class, 'details'])->name('album-details.details');
Route::get('/career', [CareerController::class, 'index'])->name('careers.index');
Route::get('/career-details', [CareerController::class, 'details'])->name('career-details.details');

// user login and register 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // start application 
    Route::get('/application',[ApplicationController::class,'index'])->name('applications');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    // end application

    // start home banner 
    Route::get('/backend',[HomeBannerController::class,'index'])->name('backends');
    Route::put('/home-banner/update/{id}', [HomeBannerController::class, 'update'])->name('home-banners.update');
    // end home banner 

    // start home about 
    Route::get('/home-about',[HomeAboutController::class,'index'])->name('home-abouts');
    Route::put('/home-about/update/{id}', [HomeAboutController::class, 'update'])->name('home-abouts.update');
    // end home banner 

    // start product 
    Route::get('/product', [ProductController::class, 'index'])->name('products');
    Route::get('/product/getdata', [ProductController::class, 'getdata'])->name('products.getdata');
    Route::get('/product/create',[ProductController::class,'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/distory/{id}', [ProductController::class, 'distroy'])->name('products.distroy');
    Route::delete('/product/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('product.delete-image');
    // end product route 


    // start Core Industry route
    Route::get('/core-industry', [CoreIndustryController::class, 'index'])->name('core-industries');
    Route::get('/core-industry/getdata', [CoreIndustryController::class, 'getdata'])->name('core-industries.getdata');
    Route::get('/core-industry/create',[CoreIndustryController::class,'create'])->name('core-industries.create');
    Route::post('/core-industry/store', [CoreIndustryController::class, 'store'])->name('core-industries.store');
    Route::get('/core-industry/edit/{id}', [CoreIndustryController::class, 'edit'])->name('core-industries.edit');
    Route::put('/core-industry/update/{id}', [CoreIndustryController::class, 'update'])->name('core-industries.update');
    Route::delete('/core-industry/distory/{id}', [CoreIndustryController::class, 'distroy'])->name('core-industries.distroy');
    // end Core Industry route
});
