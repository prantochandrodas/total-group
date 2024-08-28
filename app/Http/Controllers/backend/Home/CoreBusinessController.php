<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class CoreBusinessController extends Controller
{
    public function index(){
        $application= Application::first();
        return view('backend.core_business.index',compact('application'));
    }
}
