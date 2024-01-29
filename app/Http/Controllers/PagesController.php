<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Totals;

class PagesController extends Controller
{
   public function index() {
    return view('welcome');
   }
   public function products(){
    return view('products.index');
   }

   public function showProduct($slug){

      $product = Product::where('slug', $slug)->first();
      if(!$product){
         abort(404);
      }

      $productId  = $product->id;
      $categoryId = $product->category_id ;
      $relatedProducts = Product::where('category_id', $categoryId)
      ->where('id', '!=', $productId) 
      ->take(4) 
      ->get();
      $productImages =  json_decode($product->images, true);
      return view('products.show-product')->with([
         'product'=>$product,
         'relatedProducts'=>$relatedProducts,
         'images' =>$productImages
      ]);
   }

   public function updateProduct($id){
      $product = Product::find($id);
      $categories = Category::all();
      if(!$product){
         abort(404);
      }


      return view('admin.products.update-product')->with([
         'categories'=>$categories,
         'product'=>$product
      ]);
   }

   public function updateCategoryView($id){
      $category = Category::find($id);
      return view('admin.categories.update-category')->with([
         'category'=>$category
      ]);
   }

   public function showCart(){

      $cart = session('cart');
     
      $totalAmount = 0;
      foreach ($cart as &$item) {
         $productDetails = Product::find($item['product_id']);
     
         // Check if the product is found
         if ($productDetails) {
            // Make sure 'images' is an array in your Product model
            $images = json_decode($productDetails->images, true);

            // Merge product details into the original array
            $item = array_merge($item, [
                'product_name' => $productDetails->name, // replace 'name' with the actual column name for the product name
                'product_image' => $images[0], // replace 'image' with the actual column name for the product image
            ]);
        }
        $totalAmount += $item['total_price'];
     }
    
      return view('orders.cart')->with([
         'cart'=>$cart,
         'totalAmount'=>$totalAmount
      ]);
   }

   public function test(){
 
  
      
      $storedData = session('cart');
        dd($storedData);
      
   }
}
