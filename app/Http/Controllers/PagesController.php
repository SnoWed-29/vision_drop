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





   public function test(){

      $category = Category::create([
         'name'=>'category03test',
         'total_products'=>0,
      ]);
      return $category;
      // $product = Product::create([
      //    'name'=>'Products01Test',
      //    'slug'=>'Products-01-Test',
      //    'description'=>'this is the description',
      //    'price'=>20,
      //    'discount'=>0,
      //    'images'=>['https://shorturl.at/eDU38', 'imageLink02'],
      //    'stock_quantity'=>10,
      //    'category_id'=>1
      // ]);

      // if($product){
      //    return dd('product created', $product);
      // }else{
      //    return dd($product, 'product not created');
      // }
 

      
   }
}
