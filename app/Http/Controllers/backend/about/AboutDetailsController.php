<?php

namespace App\Http\Controllers\backend\about;

use App\Http\Controllers\Controller;
use App\Models\AboutDetails;
use App\Models\Application;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AboutDetailsController extends Controller
{
    public function index(){
        $application= Application::first();
        return view('backend.about_details.index',compact('application'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = AboutDetails::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('about-detailes.edit', $row->id);
                    $deleteUrl = route('about-detailes.distroy', $row->id);

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

    public function create(){
        $application=Application::first();
        return view('backend.about_details.create',compact('application'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|string|max:255',
            'icon' =>  'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        // save image 
        if($request->hasFile('icon')){
            $file = $request->file('icon');
            $extension=$file->getClientOriginalExtension();
            $filename=time() . '_' . rand(1,100) . '.'. $extension;
            $path = "images/";
            $file->move(public_path($path),$filename);
            $imagePath =$filename;
        }
        AboutDetails::create([
            'title' =>$request->title,
            'icon' => $imagePath
        ]);
        return redirect()->route('about-detailes')
        ->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = AboutDetails::find($id);
        return view('backend.about_details.edit', compact('application', 'data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=> 'required|string|max:255',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Generate slug

        $data = AboutDetails::findOrFail($id);
        if ($request->hasFile('icon')) {
            // Delete the old image
            $oldImagePath = public_path('images/' . $data->icon);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $file = $request->file('icon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . '.' . $extension;
            $path = 'images/';
            $file->move(public_path($path), $filename);
            $data->icon = $filename;
        }
        $data->title = $request->title;
        $data->save();
        return redirect()->route('about-detailes')
            ->with('success', 'data updated successfully.');
    }


    
    public function distroy($id)
    {
        // Find the product by ID
        $data = AboutDetails::findOrFail($id);

        // Delete icon from the file system and database
        $imagePath = public_path('images/' . $data->icon);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Delete the product
        $data->delete();

        return redirect()->route('about-detailes')
            ->with('success', 'data deleted successfully.');
    }
}
