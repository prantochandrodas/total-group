<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=Contact::first();
        return view('backend.contacts.index',compact('data','application'));
    }

    public function update(Request $request,$id){
        $request->validate([
         'background_image' => 'nullable|file|image|max:2048',
         'location_icon' => 'nullable|file|image|max:2048',
         'contact_icon' => 'nullable|file|image|max:2048',
         'map_image' => 'nullable|file|image|max:2048',
         'title' => 'nullable|string|max:255',
         'location_title' => 'nullable|string|max:255',
         'contact_title' => 'nullable|string|max:255',
         'contact_number' => 'nullable|string|max:255',
         'location' => 'nullable|string',
         'map_link' => 'nullable|string'
        ]);

        $data = Contact::findOrFail($id);

        if($request->hasFile('background_image')){
          // Delete the old image
          $oldImagePath = public_path('images/'.$data->background_image);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
          $file = $request->file('background_image');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->background_image = $filename;
        }


        if($request->hasFile('location_icon')){
          // Delete the old image
          $oldImagePath = public_path('images/'.$data->location_icon);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
          $file = $request->file('location_icon');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->location_icon = $filename;
        }


        if($request->hasFile('contact_icon')){
          // Delete the old image
          $oldImagePath = public_path('images/'.$data->contact_icon);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
          $file = $request->file('contact_icon');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->contact_icon = $filename;
        }


        if($request->hasFile('map_image')){
          // Delete the old image
          $oldImagePath = public_path('images/'.$data->map_image);
          if (file_exists($oldImagePath)) {
              unlink($oldImagePath);
          }
          $file = $request->file('map_image');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->map_image = $filename;
        }

        $data->title = $request->title;
        $data->location_title = $request->location_title;
        $data->contact_title = $request->contact_title;
        $data->contact_number = $request->contact_number;
        $data->location = $request->location;
        $data->map_link = $request->map_link;
        $data->save();
        return redirect()->route('contacts')
        ->with('success', 'data updated successfully.');
    }
}
