<?php

namespace App\Http\Controllers\backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\HomeBanner;
use Illuminate\Http\Request;

class HomeBannerController extends Controller
{
    public function index(){
        $application=Application::first();
        $data=HomeBanner::first();
        return view('backend.home_banner.index',compact('data','application'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'video' => 'nullable|file|mimes:mp4,mov,avi,flv|max:20480', // Handling video file upload
        ]);

        $banner = HomeBanner::findOrFail($id);

        // Handle title update
        $banner->title = $request->input('title');

        // Check if a new video is uploaded
        if ($request->hasFile('video')) {
            // Get the path of the old video
            $oldVideoPath = $banner->video;

            // Delete the old video from the public/video folder
            if ($oldVideoPath && file_exists(public_path('video/' . $oldVideoPath))) {
                unlink(public_path('video/' . $oldVideoPath));
            }

            // Store the new video in the public/video folder
            $newVideo = $request->file('video');
            $newVideoName = time() . '_' . $newVideo->getClientOriginalName();
            $newVideo->move(public_path('video'), $newVideoName);

            // Update the video path in the database
            $banner->video = $newVideoName;
        }

        // Save the updated home banner record
        $banner->save();

        return redirect()->route('home-banners', $banner->id)
                         ->with('success', 'Banner updated successfully');
    }
}
