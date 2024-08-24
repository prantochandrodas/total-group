<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeEngagementController extends Controller
{
    public function index(){
        return view('frontend.employee_engagement.index');
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
