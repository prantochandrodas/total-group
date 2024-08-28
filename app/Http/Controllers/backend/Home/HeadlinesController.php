<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Headlines;
use Illuminate\Http\Request;

class HeadlinesController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=Headlines::first();
        return view('backend.headlines.index',compact('data','application'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'short_description' => 'required|string'
        ]);

        $ourValue = Headlines::findOrFail($id);

        // Handle title update
        $ourValue->title = $request->input('title');
        $ourValue->short_description = $request->input('short_description');

        // Save the updated home banner record
        $ourValue->save();

        return redirect()->route('headlines', $ourValue->id)
                         ->with('success', 'data updated successfully');
    }
}
