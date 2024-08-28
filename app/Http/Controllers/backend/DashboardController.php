<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('backend.dashboard.index',compact('application'));
    }
}
