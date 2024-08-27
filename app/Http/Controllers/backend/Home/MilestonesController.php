<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Milestones;
use App\Models\MilestonesImages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class MilestonesController extends Controller
{
    public function index()
    {
        $application = Application::first();
        return view('backend.milestone.index', compact('application'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Milestones::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
            ->addColumn('first_image', function ($row) {
                // Fetch the first image from the MilestonesImages table
                $firstImage = MilestonesImages::first(); // Get the first image record
                if ($firstImage) {
                    return asset('images/' . $firstImage->image); // Return full URL to the image
                } else {
                    return 'No image';
                }
            })            
                ->addColumn('action', function ($row) {
                    $editUrl = route('milestones.edit', $row->id);
                    $deleteUrl = route('milestones.distroy', $row->id);

                    $csrfToken = csrf_field();
                    $methodField = method_field("DELETE");

                    $editBtn = '<a href="' . $editUrl . '" class="edit btn btn-primary btn-sm me-2">Edit</a>';
                    $deleteBtn = '
                        <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                            ' . $csrfToken . '
                            ' . $methodField . '
                            <button type="submit" class="delete btn btn-danger btn-sm">Delete</button>
                        </form>';

                    return $editBtn . ' ' . $deleteBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function create()
    {
        $application = Application::first();
        $data=MilestonesImages::all();
        return view('backend.milestone.create', compact('application','data'));
    }

    public function store(Request $request)
    {
        // Validate the milestones and images
        $request->validate([
            'milestones' => 'nullable|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Check if MilestonesImages already has 4 records
        $existingImagesCount = MilestonesImages::count();
    
        if ($existingImagesCount > 4) {
            return redirect()->back()->withErrors(['images' => 'You cannot upload more than 4 images.']);
        }
    
        // Calculate how many images can still be uploaded
        $remainingImageSlots = 4 - $existingImagesCount;
    
        // If the number of uploaded images exceeds the remaining slots, return an error
        if ($request->hasFile('images')) {
            $newImagesCount = count($request->file('images'));
    
            if ($newImagesCount > $remainingImageSlots) {
                return redirect()->back()->withErrors(['images' => 'You can only upload  more then 4 images.']);
            }
    
            // Save the new images
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;
    
                MilestonesImages::create([
                    'image' => $imagePath
                ]);
            }
        }
    
        // Save the milestone
        Milestones::create([
            'milestones' => $request->milestones
        ]);
    
        return redirect()->route('milestones')
            ->with('success', 'Data created successfully.');
    }
    

    public function edit($id)
    {
        $application = Application::first();
        $data = Milestones::find($id);
        $milestoneImage=MilestonesImages::all();
        return view('backend.milestone.edit', compact('application', 'data','milestoneImage'));
    }

    public function update(Request $request, $id)
    {
        // Validate the milestones and images
        $request->validate([
            'milestones' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        // Fetch the existing milestone
        $milestone = Milestones::findOrFail($id);
    
        // Count existing images in the MilestonesImages table
        $existingImagesCount = MilestonesImages::count();
    
        // Calculate how many images can still be uploaded
        $remainingImageSlots = 4 - $existingImagesCount;
    
        // Check if new images can be uploaded without exceeding the limit
        if ($request->hasFile('images')) {
            $newImagesCount = count($request->file('images'));
    
            // Prevent adding more than the allowed limit of images
            if ($newImagesCount > $remainingImageSlots) {
                return redirect()->back()->withErrors(['images' => 'You can only upload  more then 4 images.']);
            }
    
            // Save the new images
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;
    
                MilestonesImages::create([
                    'image' => $imagePath
                ]);
            }
        }
    
        // Update the milestone
        $milestone->update([
            'milestones' => $request->milestones
        ]);
    
        return redirect()->route('milestones')
            ->with('success', 'Data updated successfully.');
    }
    

    // public function distroy($id)
    // {
    //     // Find the product by ID
    //     $data = AssociateIndustry::findOrFail($id);

    //     // Delete associated images from the file system and database
    //     $imagePath = public_path('images/' . $data->image);
    //     if (file_exists($imagePath)) {
    //         unlink($imagePath); // Delete the image file
    //     }

    //     // Delete the product
    //     $data->delete();

    //     return redirect()->route('associate-industries')
    //         ->with('success', 'data deleted successfully.');
    // }

    public function deleteImage($id)
    {
        $image = MilestonesImages::findOrFail($id);
        // Delete the image from the public/project folder
        $imagePath = public_path('images/' . $image->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
        // Delete the image record from the database
        $image->delete();

        return response()->json(['success' => true]);
    }
}
