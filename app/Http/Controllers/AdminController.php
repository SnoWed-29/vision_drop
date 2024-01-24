<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function manageProducts(){
        $categories = Category::all();
        $products = Product::all();
        return view('admin.products.add-product')->with([
            'categories'=> $categories,
            'products'=> $products
        ]);
    }
    public function manageCategory(){
        return dd('this is from Admin Controller@manageCategory');
    }
}

