<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\backend\about\AboutController;
use App\Http\Controllers\backend\about\AboutDetailsController;
use App\Http\Controllers\backend\about\AboutUsBannerController;
use App\Http\Controllers\backend\about\ManagementMembersController;
use App\Http\Controllers\backend\about\MissionVisionController;
use App\Http\Controllers\backend\about\NewsBannerController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\home\AssociateBusinessController;
use App\Http\Controllers\backend\home\AssociateIndustry;
use App\Http\Controllers\backend\home\AssociateIndustryController;
use App\Http\Controllers\backend\home\ContactController;
use App\Http\Controllers\backend\home\CoreBusinessController;
use App\Http\Controllers\backend\home\CoreIndustryController;
use App\Http\Controllers\backend\home\HeadlinesController;
use App\Http\Controllers\backend\Home\HomeAboutController;
use App\Http\Controllers\backend\Home\HomeBannerController;
use App\Http\Controllers\backend\home\MilestonesController;
use App\Http\Controllers\backend\home\MilestonesImagesController;
use App\Http\Controllers\backend\home\OurBrandController;
use App\Http\Controllers\backend\home\OurServicesController;
use App\Http\Controllers\backend\home\OurVluesController;
use App\Http\Controllers\backend\news\EmployeeExperiencesController;
use App\Http\Controllers\backend\news\StoriesController;
use App\Http\Controllers\backend\product\ProductController;
use App\Http\Controllers\frontend\AboutusController;
use App\Http\Controllers\frontend\CareerController;
use App\Http\Controllers\frontend\EmployeeEngagementController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductDetailsController;
use App\Http\Controllers\user\LoginController;
use App\Http\Controllers\user\LogoutController;
use App\Models\AssociateBusiness;
use App\Models\Stories;
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
Route::get('/product-details/{slug}', [ProductDetailsController::class, 'index'])->name('product-details.index');
Route::get('/all-product', [ProductDetailsController::class, 'allproduct'])->name('all-products');
Route::get('/aboutUs', [AboutusController::class, 'index'])->name('abouts.index');
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
    // start Dashboards 
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboards');
    Route::get('/backend', [DashboardController::class, 'index'])->name('backends');


    // start application 
    Route::get('/application', [ApplicationController::class, 'index'])->name('applications');
    Route::put('/application/{id}', [ApplicationController::class, 'update'])->name('applications.update');
    // end application




    // start home banner 
    Route::get('/home-banner', [HomeBannerController::class, 'index'])->name('home-banners');
    Route::put('/home-banner/update/{id}', [HomeBannerController::class, 'update'])->name('home-banners.update');
    // end home banner 

    // start home about 
    Route::get('/home-about', [HomeAboutController::class, 'index'])->name('home-abouts');
    Route::put('/home-about/update/{id}', [HomeAboutController::class, 'update'])->name('home-abouts.update');
    // end home banner 

    // start product 
    Route::get('/product', [ProductController::class, 'index'])->name('products');
    Route::get('/product/getdata', [ProductController::class, 'getdata'])->name('products.getdata');
    Route::get('/product/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/product/distory/{id}', [ProductController::class, 'distroy'])->name('products.distroy');
    Route::delete('/product/delete-image/{id}', [ProductController::class, 'deleteImage'])->name('product.delete-image');
    // end product route 


    // start Core Industry route
    Route::get('/core-industry', [CoreIndustryController::class, 'index'])->name('core-industries');
    Route::get('/core-industry/getdata', [CoreIndustryController::class, 'getdata'])->name('core-industries.getdata');
    Route::get('/core-industry/create', [CoreIndustryController::class, 'create'])->name('core-industries.create');
    Route::post('/core-industry/store', [CoreIndustryController::class, 'store'])->name('core-industries.store');
    Route::get('/core-industry/edit/{id}', [CoreIndustryController::class, 'edit'])->name('core-industries.edit');
    Route::put('/core-industry/update/{id}', [CoreIndustryController::class, 'update'])->name('core-industries.update');
    Route::delete('/core-industry/distory/{id}', [CoreIndustryController::class, 'distroy'])->name('core-industries.distroy');
    // end Core Industry route

    // start Associate  Industry route
    Route::get('/associate-industry', [AssociateIndustryController::class, 'index'])->name('associate-industries');
    Route::get('/associate-industry/getdata', [AssociateIndustryController::class, 'getdata'])->name('associate-industries.getdata');
    Route::get('/associate-industry/create', [AssociateIndustryController::class, 'create'])->name('associate-industries.create');
    Route::post('/associate-industry/store', [AssociateIndustryController::class, 'store'])->name('associate-industries.store');
    Route::get('/associate-industry/edit/{id}', [AssociateIndustryController::class, 'edit'])->name('associate-industries.edit');
    Route::put('/associate-industry/update/{id}', [AssociateIndustryController::class, 'update'])->name('associate-industries.update');
    Route::delete('/associate-industry/distory/{id}', [AssociateIndustryController::class, 'distroy'])->name('associate-industries.distroy');
    // end Associate  Industry route

    // core bussiness 
    Route::get('/milestone', [MilestonesController::class, 'index'])->name('milestones');
    Route::get('/milestone/getdata', [MilestonesController::class, 'getdata'])->name('milestones.getdata');
    Route::get('/milestone/create', [MilestonesController::class, 'create'])->name('milestones.create');
    Route::post('/milestone/store', [MilestonesController::class, 'store'])->name('milestones.store');
    Route::get('/milestone/edit/{id}', [MilestonesController::class, 'edit'])->name('milestones.edit');
    Route::put('/milestone/update/{id}', [MilestonesController::class, 'update'])->name('milestones.update');
    Route::delete('/milestone/distory/{id}', [MilestonesController::class, 'distroy'])->name('milestones.distroy');
    Route::delete('/milestone/delete-image/{id}', [MilestonesController::class, 'deleteImage'])->name('milestone.delete-image');
    // end Milestones 

    // start milestone image 
    Route::get('/milestone-images', [MilestonesImagesController::class, 'index'])->name('milestones-images');
    Route::put('/milestone-images/{id}', [MilestonesImagesController::class, 'update'])->name('milestones-images.update');
    // end milestone images

    // core bussiness 
    Route::get('/core-business', [CoreBusinessController::class, 'index'])->name('core-businesses');
    Route::get('/core-business/getdata', [CoreBusinessController::class, 'getdata'])->name('core-businesses.getdata');
    Route::get('/core-business/create', [CoreBusinessController::class, 'create'])->name('core-businesses.create');
    Route::post('/core-business/store', [CoreBusinessController::class, 'store'])->name('core-businesses.store');
    Route::get('/core-business/edit/{id}', [CoreBusinessController::class, 'edit'])->name('core-businesses.edit');
    Route::put('/core-business/update/{id}', [CoreBusinessController::class, 'update'])->name('core-businesses.update');
    Route::delete('/core-business/distory/{id}', [CoreBusinessController::class, 'distroy'])->name('core-businesses.distroy');
    // end core business 


    //start our-brand 
    Route::get('/our-brand', [OurBrandController::class, 'index'])->name('our-brands');
    Route::get('/our-brand/getdata', [OurBrandController::class, 'getdata'])->name('our-brands.getdata');
    Route::get('/our-brand/create', [OurBrandController::class, 'create'])->name('our-brands.create');
    Route::post('/our-brand/store', [OurBrandController::class, 'store'])->name('our-brands.store');
    Route::get('/our-brand/edit/{id}', [OurBrandController::class, 'edit'])->name('our-brands.edit');
    Route::put('/our-brand/update/{id}', [OurBrandController::class, 'update'])->name('our-brands.update');
    Route::delete('/our-brand/distory/{id}', [OurBrandController::class, 'distroy'])->name('our-brands.distroy');
    // end our-brand

    //start Associate Business
    Route::get('/associate_business', [AssociateBusinessController::class, 'index'])->name('associate_businesses');
    Route::get('/associate_business/getdata', [AssociateBusinessController::class, 'getdata'])->name('associate_businesses.getdata');
    Route::get('/associate_business/create', [AssociateBusinessController::class, 'create'])->name('associate_businesses.create');
    Route::post('/associate_business/store', [AssociateBusinessController::class, 'store'])->name('associate_businesses.store');
    Route::get('/associate_business/edit/{id}', [AssociateBusinessController::class, 'edit'])->name('associate_businesses.edit');
    Route::put('/associate_business/update/{id}', [AssociateBusinessController::class, 'update'])->name('associate_businesses.update');
    Route::delete('/associate_business/distory/{id}', [AssociateBusinessController::class, 'distroy'])->name('associate_businesses.distroy');
    // end our-brand

    // start our-values
    Route::get('/our-values', [OurVluesController::class, 'index'])->name('our-valueses');
    Route::put('/our-values/update/{id}', [OurVluesController::class, 'update'])->name('our-valueses.update');
    // end our-values

    // start our-services 
    Route::get('/our-services', [OurServicesController::class, 'index'])->name('our-serviceses');
    Route::get('/our-services/getdata', [OurServicesController::class, 'getdata'])->name('our-serviceses.getdata');
    Route::get('/our-services/create', [OurServicesController::class, 'create'])->name('our-serviceses.create');
    Route::post('/our-services/store', [OurServicesController::class, 'store'])->name('our-serviceses.store');
    Route::get('/our-services/edit/{id}', [OurServicesController::class, 'edit'])->name('our-serviceses.edit');
    Route::put('/our-services/update/{id}', [OurServicesController::class, 'update'])->name('our-serviceses.update');
    Route::delete('/our-services/distory/{id}', [OurServicesController::class, 'distroy'])->name('our-serviceses.distroy');
    // end our-services 

    // start headline
    Route::get('/headline', [HeadlinesController::class, 'index'])->name('headlines');
    Route::put('/headline/update/{id}', [HeadlinesController::class, 'update'])->name('headlines.update');
    // end headline

    // start stories
    Route::get('/stories', [StoriesController::class, 'index'])->name('storieses');
    Route::get('/stories/getdata', [StoriesController::class, 'getdata'])->name('storieses.getdata');
    Route::get('/stories/create', [StoriesController::class, 'create'])->name('storieses.create');
    Route::post('/stories/store', [StoriesController::class, 'store'])->name('storieses.store');
    Route::get('/stories/edit/{id}', [StoriesController::class, 'edit'])->name('storieses.edit');
    Route::put('/stories/update/{id}', [StoriesController::class, 'update'])->name('storieses.update');
    Route::delete('/stories/distory/{id}', [StoriesController::class, 'distroy'])->name('storieses.distroy');
    // end stories

    // start contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contacts');
    Route::put('/contact/update/{id}', [ContactController::class, 'update'])->name('contacts.update');
    // end contact

    // start about-banners
    Route::get('/about-banner', [AboutUsBannerController::class, 'index'])->name('about-banners');
    Route::get('/about-banner/getdata', [AboutUsBannerController::class, 'getdata'])->name('about-banners.getdata');
    Route::get('/about-banner/create', [AboutUsBannerController::class, 'create'])->name('about-banners.create');
    Route::post('/about-banner/store', [AboutUsBannerController::class, 'store'])->name('about-banners.store');
    Route::get('/about-banner/edit/{id}', [AboutUsBannerController::class, 'edit'])->name('about-banners.edit');
    Route::put('/about-banner/update/{id}', [AboutUsBannerController::class, 'update'])->name('about-banners.update');
    Route::delete('/about-banner/distory/{id}', [AboutUsBannerController::class, 'distroy'])->name('about-banners.distroy');
    // end about-banners

    // start about 
    Route::get('/about', [AboutController::class, 'index'])->name('aboutes');
    Route::put('/about/update/{id}', [AboutController::class, 'update'])->name('aboutes.update');
    // end banner 

    // start about-details
    Route::get('/about-details', [AboutDetailsController::class, 'index'])->name('about-detailes');
    Route::get('/about-details/getdata', [AboutDetailsController::class, 'getdata'])->name('about-detailes.getdata');
    Route::get('/about-details/create', [AboutDetailsController::class, 'create'])->name('about-detailes.create');
    Route::post('/about-details/store', [AboutDetailsController::class, 'store'])->name('about-detailes.store');
    Route::get('/about-details/edit/{id}', [AboutDetailsController::class, 'edit'])->name('about-detailes.edit');
    Route::put('/about-details/update/{id}', [AboutDetailsController::class, 'update'])->name('about-detailes.update');
    Route::delete('/about-details/distory/{id}', [AboutDetailsController::class, 'distroy'])->name('about-detailes.distroy');
    // end about-details

    // start mission-vision 
    Route::get('/mission-vision', [MissionVisionController::class, 'index'])->name('mission-visiones');
    Route::put('/mission-vision/update/{id}', [MissionVisionController::class, 'update'])->name('mission-visiones.update');
    // end banner

    // start management-members
    Route::get('/management-member', [ManagementMembersController::class, 'index'])->name('management-members');
    Route::get('/management-member/getdata', [ManagementMembersController::class, 'getdata'])->name('management-members.getdata');
    Route::get('/management-member/create', [ManagementMembersController::class, 'create'])->name('management-members.create');
    Route::post('/management-member/store', [ManagementMembersController::class, 'store'])->name('management-members.store');
    Route::get('/management-member/edit/{id}', [ManagementMembersController::class, 'edit'])->name('management-members.edit');
    Route::put('/management-member/update/{id}', [ManagementMembersController::class, 'update'])->name('management-members.update');
    Route::delete('/management-member/distory/{id}', [ManagementMembersController::class, 'distroy'])->name('management-members.distroy');
    // end management-members

    // start news-banner
    Route::get('/news-banner', [NewsBannerController::class, 'index'])->name('news-banners');
    Route::get('/news-banner/getdata', [NewsBannerController::class, 'getdata'])->name('news-banners.getdata');
    Route::get('/news-banner/create', [NewsBannerController::class, 'create'])->name('news-banners.create');
    Route::post('/news-banner/store', [NewsBannerController::class, 'store'])->name('news-banners.store');
    Route::get('/news-banner/edit/{id}', [NewsBannerController::class, 'edit'])->name('news-banners.edit');
    Route::put('/news-banner/update/{id}', [NewsBannerController::class, 'update'])->name('news-banners.update');
    Route::delete('/news-banner/distory/{id}', [NewsBannerController::class, 'distroy'])->name('news-banners.distroy');
    // end news-banner

    // start employee-experience
    Route::get('/employee-experience', [EmployeeExperiencesController::class, 'index'])->name('employee-experiences');
    Route::get('/employee-experience/getdata', [EmployeeExperiencesController::class, 'getdata'])->name('employee-experiences.getdata');
    Route::get('/employee-experience/create', [EmployeeExperiencesController::class, 'create'])->name('employee-experiences.create');
    Route::post('/employee-experience/store', [EmployeeExperiencesController::class, 'store'])->name('employee-experiences.store');
    Route::get('/employee-experience/edit/{id}', [EmployeeExperiencesController::class, 'edit'])->name('employee-experiences.edit');
    Route::put('/employee-experience/update/{id}', [EmployeeExperiencesController::class, 'update'])->name('employee-experiences.update');
    Route::delete('/employee-experience/distory/{id}', [EmployeeExperiencesController::class, 'distroy'])->name('employee-experiences.distroy');
    // end employee-experience


});
