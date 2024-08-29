<?php

namespace App\Http\Controllers\backend\about;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\MissionVision;
use Illuminate\Http\Request;

class MissionVisionController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=MissionVision::first();
        return view('backend.mission_vision.index',compact('data','application'));
    }

    public function update(Request $request,$id){
        $request->validate([
         'image' => 'nullable|file|image|max:2048',
         'mission_description' => 'nullable|string',
         'vision_description' => 'nullable|string',
        ]);

        $data = MissionVision::findOrFail($id);

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

        $data->mission_description = $request->mission_description;
        $data->vision_description = $request->vision_description;
        $data->save();
        return redirect()->route('mission-visiones')
        ->with('success', 'data updated successfully.');
    }
}
