<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('frontend.careers.index',compact('application'));
    }
    public function details(){
        $application=Application::first();
        return view('frontend.careers.details',compact('application'));
    }
}
