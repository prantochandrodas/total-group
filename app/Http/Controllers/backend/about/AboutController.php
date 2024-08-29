<?php

namespace App\Http\Controllers\backend\about;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Application;
use App\Models\HomeAbout;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=About::first();
        return view('backend.aboutes.index',compact('data','application'));
    }

    public function update(Request $request,$id){
        $request->validate([
         'image' => 'nullable|file|image|max:2048',
         'home_title' => 'nullable|string|max:255',
         'short_description' => 'nullable|string',
         'about_title' => 'nullable|string|max:255',
         'long_description' => 'nullable|string'
        ]);

        $data = About::findOrFail($id);

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

        $data->home_title = $request->home_title;
        $data->short_description = $request->short_description;
        $data->about_title = $request->about_title;
        $data->long_description = $request->long_description;
        $data->save();
        return redirect()->route('aboutes')
        ->with('success', 'data updated successfully.');
    }
}
