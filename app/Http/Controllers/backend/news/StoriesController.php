<?php

namespace App\Http\Controllers\backend\news;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Stories;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StoriesController extends Controller
{
    public function index(){
        $application= Application::first();
        return view('backend.stories.index',compact('application'));
    }
    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Stories::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('storieses.edit', $row->id);
                    $deleteUrl = route('storieses.distroy', $row->id);

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
        return view('backend.stories.create',compact('application'));
    }

    public function store(Request $request){
        $request->validate([
            'title' =>'required|string|max:255',
            'link'  => 'required|string',
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
        Stories::create([
            'title'=>$request->title,
            'link' => $request->link,
            'image' => $imagePath
        ]);
        return redirect()->route('storieses')
        ->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = Stories::find($id);
        return view('backend.stories.edit', compact('application', 'data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=> 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'  => 'required|string'
        ]);
        // Generate slug

        $data = Stories::findOrFail($id);



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
        $data->title = $request->title;
        $data->link = $request->link;
        $data->save();
        return redirect()->route('storieses')
            ->with('success', 'data updated successfully.');
    }

    public function distroy($id)
    {
        // Find the product by ID
        $data = Stories::findOrFail($id);

        // Delete associated images from the file system and database
        $imagePath = public_path('images/' . $data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
        // Delete the product
        $data->delete();
        return redirect()->route('storieses')
            ->with('success', 'data deleted successfully.');
    }
}
