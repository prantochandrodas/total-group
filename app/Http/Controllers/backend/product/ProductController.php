<?php

namespace App\Http\Controllers\backend\product;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Product;
use App\Models\ProductPictures;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $application = Application::first();
        return view('backend.product.index', compact('application'));
    }

    public function getdata(Request $request)
    {

        if ($request->ajax()) {
            $data = Product::with('images')->orderBy('created_at', 'desc')->get();
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
        return view('backend.product.create', compact('application'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'warranty' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $slug = $request->name ? Str::slug($request->name) : null;
        $product = Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'warranty' => $request->warranty,
        ]);
        // Save the images to project_pivots table
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . rand(1, 100) . '.' . $extension;
                $path = 'images/';
                $file->move(public_path($path), $filename);
                $imagePath = $filename;

                ProductPictures::create([
                    'product_id' => $product->id,
                    'image' => $imagePath
                ]);
            }
        }

        return redirect()->route('products')
            ->with('success', 'data created successfully.');
    }

    public function edit($id)
    {
        $application = Application::first();
        $data = Product::find($id);
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
       
        $data = Product::findOrFail($id);

        if($request->name){
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

                ProductPictures::create([
                    'product_id' => $data->id,
                    'image' => $imagePath
                ]);
            }
        }
        return redirect()->route('products')
            ->with('success', 'data updated successfully.');
    }

    public function distroy($id)
    {
        // Find the product by ID
        $product = Product::findOrFail($id);

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



    public function deleteImage($id)
    {
        $image = ProductPictures::findOrFail($id);

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
