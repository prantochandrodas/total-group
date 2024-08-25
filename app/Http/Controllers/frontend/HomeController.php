<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\HomeAbout;
use App\Models\HomeBanner;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products=Product::limit(4)->get();
        $application=Application::first();
        $banner=HomeBanner::first();
        $about=HomeAbout::first();
        return view('frontend.home.index',compact('products','banner','about','application'));
    }
}
