<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Application;
use App\Models\AssociateBusiness;
use App\Models\AssociateIndustry;
use App\Models\Contact;
use App\Models\CoreBusiness;
use App\Models\CoreIndustry;
use App\Models\Headlines;
use App\Models\HomeAbout;
use App\Models\HomeBanner;
use App\Models\Milestones;
use App\Models\MilestonesImages;
use App\Models\OurBrand;
use App\Models\OurServices;
use App\Models\OurValues;
use App\Models\Product;
use App\Models\Stories;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $contact=Contact::first();
        $headline=Headlines::first();
        $stories=Stories::all();
        $our_value=OurValues::first();
        $our_services=OurServices::all();
        $our_brand=OurBrand::all();
        $associat_business=AssociateBusiness::all();
        $associate_industry=AssociateIndustry::all();
        $core_industry=CoreIndustry::all();
        $products=Product::limit(4)->get();
        $application=Application::first();
        $banner=HomeBanner::first();
        $about=About::first();
        $milestones=Milestones::all();
        $milestonesImages=MilestonesImages::all();
        $core_business=CoreBusiness::all();
        return view('frontend.home.index',compact('contact','headline','stories','our_value','our_services','our_brand','associat_business','core_business','milestones','milestonesImages','products','banner','about','application','core_industry','associate_industry'));
    }
}
