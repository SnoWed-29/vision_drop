<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function addToCart(Request $request, $id){
        // dd($request);
            $product = Product::find($id);
            if (!$product) {
                abort(404);
            }
            $quantity = 1;
            if($request->input('quantity')){
                $quantity = $request->input('quantity');
            }else{
                $quantity = 1;
            }
                
            $cart = session()->get('cart', []);
            $cart[] = [
                'product_id' => $product->id,
                'quantity' => $quantity,
                'discount'=>$product->discount,
                'price' => $product->price,
                'total_price'=>$product->price*$quantity
            ];

            session(['cart' => $cart]);
            return redirect()->route('cart');
            
        }

        public function createOrder(Request $request){
            // Assuming you have the necessary form data in the request
    
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
    
            // Other logic, like redirecting to the order confirmation page
        }
}
