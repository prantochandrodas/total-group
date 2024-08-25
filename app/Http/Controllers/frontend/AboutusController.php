<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('frontend.abouts.index',compact('application'));
    }
}
