<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $products = Product::all();
        $totalProducts = count($products);
        
        return view('admin.dashboard')->with([
            'totalProuducts'=> $totalProducts
        ]);
    }
    public function manageProducts(){
        $categories = Category::all();
        $products = Product::all();
        return view('admin.products.manage-product')->with([
            'categories'=> $categories,
            'products'=> $products
        ]);
    }
    public function manageCategory(){
        $categories = Category::all();
        
        return view('admin.categories.manage-categories')->with([
            'categories'=> $categories,
        ]);
    }
}

