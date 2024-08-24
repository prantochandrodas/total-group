<?php

use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\CareerController;
use App\Http\Controllers\frontend\EmployeeEngagementController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\user\LoginController;
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
Route::get('/product-detail', [ProductDetailsController::class, 'index'])->name('product-details.index');
Route::get('/about', [AboutusController::class, 'index'])->name('abouts.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/employee-engagement', [EmployeeEngagementController::class, 'index'])->name('employee-engagments.index');
Route::get('/album-details', [EmployeeEngagementController::class, 'details'])->name('album-details.details');
Route::get('/career', [CareerController::class, 'index'])->name('careers.index');
Route::get('/career-details', [CareerController::class, 'details'])->name('career-details.details');

// user login and register 
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    Route::get('/product-detail', [ProductDetailsController::class, 'index'])->name('product-details.index');
    Route::get('/about', [AboutusController::class, 'index'])->name('abouts.index');
    Route::get('/news', [NewsController::class, 'index'])->name('news.index');
    Route::get('/employee-engagement', [EmployeeEngagementController::class, 'index'])->name('employee-engagments.index');
    Route::get('/album-details', [EmployeeEngagementController::class, 'details'])->name('album-details.details');
    Route::get('/career', [CareerController::class, 'index'])->name('careers.index');
    Route::get('/career-details', [CareerController::class, 'details'])->name('career-details.details');
});
