<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\ServiceProvider;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        $layouts = [
            'layouts.secondApp', 
            'welcome',
            // Add more layouts as needed
        ];
        view()->composer($layouts, function ($view) {
            // Fetch products based on product_id in the cart session
            $cartItems = session('cart', []);
            $productsInCart = [];

            foreach ($cartItems as $cartItem) {
                $product = Product::find($cartItem['product_id']);
                $productImages =  json_decode($product->images, true);

                if ($product) {
                    $productDetails = [
                        'name' => $product->name,
                        'image' => $productImages[0], // Replace with your actual image path attribute
                        'category' => $product->category,
                        // Add other product details as needed
                    ];

                    $productsInCart[] = $productDetails;
                }
            }

            $view->with('productsInCart', $productsInCart);
        });
    }

}