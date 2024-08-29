<?php

namespace App\Http\Controllers\backend\about;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\NewsBanner;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class NewsBannerController extends Controller
{
    public function index(){
        $application= Application::first();
        return view('backend.news_banner.index',compact('application'));
    }

    public function getdata(Request $request)
    {
        if ($request->ajax()) {
            $data = NewsBanner::orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $editUrl = route('news-banners.edit', $row->id);
                    $deleteUrl = route('news-banners.distroy', $row->id);

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
        return view('backend.news_banner.create',compact('application'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
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
        NewsBanner::create([
            'title' =>$request->title,
            'description' =>$request->description,
            'image' => $imagePath
        ]);
        return redirect()->route('news-banners')
        ->with('success', 'Data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = NewsBanner::find($id);
        return view('backend.news_banner.edit', compact('application', 'data'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'required|string|max:255',
            'image' =>  'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ]);
        // Generate slug

        $data = NewsBanner::findOrFail($id);
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
        $data->description = $request->description;
        $data->save();
        return redirect()->route('news-banners')
            ->with('success', 'data updated successfully.');
    }


    
    public function distroy($id)
    {
        // Find the product by ID
        $data = NewsBanner::findOrFail($id);

        // Delete icon from the file system and database
        $imagePath = public_path('images/' . $data->image);
        if (file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }

        // Delete the product
        $data->delete();

        return redirect()->route('news-banners')
            ->with('success', 'data deleted successfully.');
    }
}
