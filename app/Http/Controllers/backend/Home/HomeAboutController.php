<?php

namespace App\Http\Controllers\backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class HomeAboutController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=HomeAbout::first();
        return view('backend.home_about.index',compact('data','application'));
    }

    public function update(Request $request,$id){
        $request->validate([
         'image' => 'nullable|file|image|max:2048',
         'title' => 'nullable|string|max:255',
         'description' => 'nullable|string'
        ]);

        $data = HomeAbout::findOrFail($id);

        if($request->hasFile('image')){
          // Delete the old image
          $oldImagePath = public_path('images/'.$data->image);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
          $file = $request->file('image');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->image = $filename;
        }

        $data->title = $request->title;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('home-abouts')
        ->with('success', 'data updated successfully.');
    }

}
