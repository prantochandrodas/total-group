<?php

namespace App\Http\Controllers\backend\home;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\CoreIndustry;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class CoreIndustryController extends Controller
{
    public function index()
    {
        $application = Application::first();
        return view('backend.core_industry.index', compact('application'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = CoreIndustry::with('images')->orderBy('created_at', 'desc')->get();
            return DataTables::of($data)
                ->addColumn('first_image', function ($row) {
                    $firstImage = $row->images->first();
                    if ($firstImage) {
                        return asset('images/' . $firstImage->image); // Return full URL to the image
                    } else {
                        return 'No image';
                    }
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('products.edit', $row->id);
                    $deleteUrl = route('products.distroy', $row->id);

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
        return view('backend.core_industry.create', compact('application'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'  => 'nullable|string'
        ]);
       
        // Save the images to project_pivots table
        if ($request->hasFile('image')) {
                $file=$request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;
        }

        CoreIndustry::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => $imagePath
        ]);

        return redirect()->route('core-industries')
            ->with('success', 'data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = CoreIndustry::find($id);
        return view('backend.product.edit', compact('application', 'data'));
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'warranty' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Generate slug

        $data = CoreIndustry::findOrFail($id);

        if ($request->name) {
            $slug = $request->name ? Str::slug($request->name) : null;
        }

        // Update the property details
        $data->update([

            'slug' => $slug,
            'name' => $request->name,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'warranty' => $request->warranty,
        ]);

        // Save the images to property_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;
            }
        }
        return redirect()->route('products')
            ->with('success', 'data updated successfully.');
    }

    public function distroy($id)
    {
        // Find the product by ID
        $product = CoreIndustry::findOrFail($id);

        // Delete associated images from the file system and database
        foreach ($product->images as $pivot) {
            $imagePath = public_path('images/' . $pivot->image);
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }
            $pivot->delete(); // Delete the pivot record
        }

        // Delete the product
        $product->delete();

        return redirect()->route('products')
            ->with('success', 'data deleted successfully.');
    }
}
