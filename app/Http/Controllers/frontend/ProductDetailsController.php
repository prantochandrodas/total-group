<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductDetailsController extends Controller
{
    public function index($slug){
        $data = Product::where('slug', $slug)->firstOrFail();
        $application=Application::first();
        return view('frontend.product.index',compact('application','data'));
    }

    public function allproduct(){
        $products=Product::paginate(6);
        $application=Application::first();
        return view('frontend.product.allproduct',compact('application','products'));
    }
}
