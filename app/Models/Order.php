<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'name',
        'last_name',
        'address',
        'city',
        'phone_number',
        'email',
        'total_amount'
        
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price', 'discount');
    }

    public function calculateTotalAmount()
    {
        return $this->products->sum(function ($product) {
            return ($product->pivot->price - $product->pivot->discount) * $product->pivot->quantity;
        });
    }
    use HasFactory;
}
