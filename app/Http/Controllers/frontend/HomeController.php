<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\AssociateIndustry;
use App\Models\CoreIndustry;
use App\Models\HomeAbout;
use App\Models\HomeBanner;
use App\Models\Milestones;
use App\Models\MilestonesImages;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $associate_industry=AssociateIndustry::all();
        $core_industry=CoreIndustry::all();
        $products=Product::limit(4)->get();
        $application=Application::first();
        $banner=HomeBanner::first();
        $about=HomeAbout::first();
        $milestones=Milestones::all();
        $milestonesImages=MilestonesImages::all();
        return view('frontend.home.index',compact('milestones','milestonesImages','products','banner','about','application','core_industry','associate_industry'));
    }
}
