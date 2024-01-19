<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
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
   public function test(){

      // $category = Category::create([
      //    'name'=>'category01test',
      //    'total_products'=>12,
      // ]);

      $product = Product::create([
         'name'=>'Products01Test',
         'slug'=>'Products-01-Test',
         'description'=>'this is the description',
         'price'=>20,
         'discount'=>0,
         'images'=>['https://shorturl.at/eDU38', 'imageLink02'],
         'stock_quantity'=>10,
         'category_id'=>1
      ]);

      if($product){
         return dd('product created', $product);
      }else{
         return dd($product, 'product not created');
      }


      
   }
}
