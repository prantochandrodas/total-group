<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutDetails;
use App\Models\AboutUsBanner;
use App\Models\Application;
use App\Models\ManagementMembers;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index(){
        $application=Application::first();
        $aboutBanner=AboutUsBanner::all();
        $aboutDetails=AboutDetails::all();
        $mission_vision=MissionVision::first();
        $about=About::first();
        $management_members=ManagementMembers::all();
        return view('frontend.abouts.index',compact('management_members','mission_vision','application','about','aboutBanner','aboutDetails'));
    }
}
