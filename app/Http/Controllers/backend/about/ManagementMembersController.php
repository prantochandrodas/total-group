<?php

namespace App\Http\Controllers\backend\about;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\ManagementMembers;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManagementMembersController extends Controller
{
    public function index(){
        $application= Application::first();
        return view('backend.management_members.index',compact('application'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = ManagementMembers::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('management-members.edit', $row->id);
                    $deleteUrl = route('management-members.distroy', $row->id);

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
        return view('backend.management_members.create',compact('application'));
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'designation'=>'required|string|max:255',
            'image' =>  'required|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        // save image 
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension=$file->getClientOriginalExtension();
            $filename=time() . '_' . rand(1,100) . '.'. $extension;
            $path = "images/";
            $file->move(public_path($path),$filename);
            $imagePath =$filename;
        }
        ManagementMembers::create([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $imagePath
        ]);
        return redirect()->route('management-members')
        ->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = ManagementMembers::find($id);
        return view('backend.management_members.edit', compact('application', 'data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name'=>'nullable|string|max:255',
            'designation'=>'nullable|string|max:255',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        // Generate slug

        $data = ManagementMembers::findOrFail($id);



        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('images/' . $data->image);
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
        $data->save();
        return redirect()->route('management-members')
            ->with('success', 'data updated successfully.');
    }


    
    public function distroy($id)
    {
        // Find the product by ID
        $data = ManagementMembers::findOrFail($id);

        // Delete associated images from the file system and database
        $imagePath = public_path('images/' . $data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Delete the product
        $data->delete();

        return redirect()->route('management-members')
            ->with('success', 'data deleted successfully.');
    }
}
