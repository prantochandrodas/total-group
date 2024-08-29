<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Headlines;
use App\Models\NewsBanner;
use App\Models\Stories;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $application=Application::first();
        $news_banner=NewsBanner::all();
        $headline=Headlines::first();
        $stories=Stories::all();
        return view('frontend.newsPage.index',compact('application','news_banner','headline','stories'));
    }
}
