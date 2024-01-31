<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
    
        $quantity = $request->input('quantity') ? $request->input('quantity') : 1;
    
        $cart = session()->get('cart', []);
    
        // Check if the product is already in the cart
        $productInCart = false;
        foreach ($cart as &$item) {
            if ($item['product_id'] == $product->id) {
                // Product already exists, update the quantity and recalculate total price
                $item['quantity'] += $quantity;
                // $item['total_price'] = $item['quantity'] * $item['price'] * (1 - $item['discount'] / 100);
                $item['total_price'] = $item['quantity'] * $item['price'] ;
                $productInCart = true;
                break;
            }
        }
    
        // If the product is not already in the cart, add it as a new item
        if (!$productInCart) {
            $cart[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'discount' => $product->discount,
                'price' => $product->price,
                'total_price' => $product->price * $quantity 
                // 'total_price' => $product->price * $quantity * (1 - $product->discount / 100)
            ];
        }
    
        session(['cart' => $cart]);
        return redirect()->route('cart');
    }
    public function emptyCart(Request $request){
            try {
                $request->session()->forget('cart');
                return response()->json(['success' => true]);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
            }
    }
    public function createOrder(Request $request){
            // Assuming you have the necessary form data in the request
            $request->validate([
                'name'=> 'required',
                'last_name'=> 'required',
                'address'=> 'required',
                'city'=> 'required',
                'phone_number'=> 'required',
                'email'=> 'required'
            ]);
            $order = Order::create([
                'name' => $request->input('name'),
                'last_name' => $request->input('last_name'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'total_amount' => 0, // It will be updated shortly
            ]);
    
            // Assuming you have products in the session
            $cart = session()->get('cart', []);
    
            foreach ($cart as $item) {
                $order->products()->attach($item['product_id'], [
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                    'discount' => 0, // Assuming no discount for simplicity
                ]);
            }
    
            // Update the total amount based on associated products
            $order->update(['total_amount' => $order->calculateTotalAmount()]);
    
            // Clear the cart session
            session()->forget('cart');

            return view('orders.checkout')->with([
                'order'=> $order
            ]);
    
    }
    public function checkout(){

        return view('orders.checkout');
    }
}
