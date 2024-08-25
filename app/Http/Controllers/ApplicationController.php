<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(){
        $application=Application::first();
        return view('backend.application.index',compact('application'));
    }

    public function update(Request $request,$id){
        $request->validate([
            'company_name' => 'nullable|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
            'logo' => 'nullable|file|image|max:2048',
            'phone_1' => 'required|numeric',
            'phone_2' => 'required|numeric'
        ]);

        $data = Application::findOrFail($id);

        if($request->hasFile('logo')){
          // Delete the old image
        //   $oldImagePath = public_path('images/'.$data->image);
        //   if (file_exists($oldImagePath)) {
        //       unlink($oldImagePath);
        //   }
          $file = $request->file('logo');
          $extension = $file->getClientOriginalExtension();
          $filename = time() . '_' . '.' . $extension;
          $path = 'images/';
          $file->move(public_path($path), $filename);
          $data->logo = $filename;
        }

        $data->company_name = $request->company_name;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone_1 = $request->phone_1;
        $data->phone_2 = $request->phone_2;
        $data->save();
        return redirect()->route('applications')
        ->with('success', 'data updated successfully.');
    }
}
