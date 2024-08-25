<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Http\Request;

class EmployeeEngagementController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('frontend.employee_engagement.index',compact('application'));
    }

    public function details(){
        $imageSets = [
            ['https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG', 'https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG', 'https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG'],
            ['https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG', 'https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG', 'https://cms.webmanza.com/uploads/IMG_2329_Large_cb075d1e20.JPG'],
            // Add more sets as needed
        ];
        return view('frontend.employee_engagement.details',compact('imageSets'));
    }
}
