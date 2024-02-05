<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function addProduct(Request $request) {
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:10', 'max:1050'],
            'price' => ['required', 'numeric'], // assuming price is a numeric value
            'discount' => ['numeric'], // assuming discount is a numeric value
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'stockQuantity' => ['required', 'numeric'], // assuming stockQuantity is a numeric value
            'category_id' => ['required']
        ]);

        $slug = Str::slug($request->input('name'), '-', );
        // handle Images
        $imagesPaths = [];

        foreach ($request->file('images') as $image) {
            $uniqueName = hash('sha256', time() . uniqid()) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/ProductImages', $uniqueName);
            $imagesPaths[] = 'ProductImages/' . $uniqueName;
        }


        $imagesJson = json_encode($imagesPaths);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'images' => $imagesJson,
            'stock_quantity' => $request->input('stockQuantity'),
            'category_id' => $request->input('category_id'),
            'slug' => $slug,
        ]);
        
        $product->save();
      
        if($product){
            return redirect()->route('admin.manageProduct');
        }
        
        
    }
    public function updateProduct(Request $request, $productId) {
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:10', 'max:1050'],
            'price' => ['required', 'numeric'],
            'discount' => ['numeric'],
            'images.*' => ['image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'stockQuantity' => ['required', 'numeric'],
            'category_id' => ['required']
        ]);
    
        $slug = Str::slug($request->input('name'), '-');
    
        $product = Product::find($productId);
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Get existing images from the database
        $existingImages = json_decode($product->images, true) ?? [];
    
        // Check if there are new images
        if ($request->hasFile('images')) {
            // Handle new images
            $imagesPaths = [];
            foreach ($request->file('images') as $image) {
                $uniqueName = hash('sha256', time() . uniqid()) . '.' . $image->getClientOriginalExtension();
                $path = $image->storeAs('public/ProductImages', $uniqueName);
                $imagesPaths[] = 'ProductImages/' . $uniqueName;
            }
    
            // Update images only if new images are present
            $updatedImages = $imagesPaths;
        } else {
            // No new images, keep the existing ones
            $updatedImages = $existingImages;
        }
    
        $imagesJson = json_encode($updatedImages);
    
        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'discount' => $request->input('discount'),
            'images' => $imagesJson,
            'stock_quantity' => $request->input('stockQuantity'),
            'category_id' => $request->input('category_id'),
            'slug' => $slug,
        ]);
    
        return redirect()->route('admin.manageProduct')->with('success', 'Product updated successfully.');
    }
    
    public function destroyProduct (Request $request, $id){
        // Find the product by ID
    $product = Product::find($id);

    // Check if the product exists
    if (!$product) {
        return redirect()->route('admin.manageProduct')->with('error', 'Product not found');
    }

    // Delete the images associated with the product
    $images = json_decode($product->images, true);

    foreach ($images as $imagePath) {
        $fullImagePath = storage_path('app/public/' . $imagePath);

        // Check if the file exists before attempting to delete
        if (file_exists($fullImagePath)) {
            unlink($fullImagePath);
        }
    }

    // Delete the product from the database
    $product->delete();

        return redirect()->route('admin.manageProduct');
    }
    public function addCategory(Request $request){
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
        ]);
        Category::create([
            'name'=> $request->input('name')
        ]);
        return redirect()->route('admin.manageCategory');
    }
    public function updateCategory($id, Request $request){
        $category = Category::find($id);
        if(!$category){
            abort(404);
        }

        $request->validate([
            'name'=>['required', 'min:3', 'max:30']
        ]);

        $category->update([
            'name' => $request->input('name'),
        ]);
        // return dd($category);
        return redirect()->route('admin.manageCategory');
    }

    public function destroyCategory(Request $request, $id){
        $category = Category::find($id);

        if (!$category) {
            abort(404);
        }
        $Uncategorized = Category::where('name', 'Uncategorized')->first();
        $category->products()->update(['category_id' => $Uncategorized->id]);

    
        $category->delete();
        return redirect()->route('admin.manageCategory');
    }
    
}
