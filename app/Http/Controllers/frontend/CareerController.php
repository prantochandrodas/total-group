<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index(){
        return view('frontend.careers.index');
    }
    public function details(){
        return view('frontend.careers.details');
    }
}
