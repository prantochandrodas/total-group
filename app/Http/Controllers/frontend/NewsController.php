<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('frontend.newsPage.index',compact('application'));
    }
}
