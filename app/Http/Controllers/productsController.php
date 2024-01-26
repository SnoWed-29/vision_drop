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
    public function addCategory(Request $request){
        $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
        ]);
        Category::create([
            'name'=> $request->input('name')
        ]);
        return redirect()->route('admin.manageCategory');
    }
}
