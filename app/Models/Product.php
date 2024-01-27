<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'discount',
        'images',
        'stock_quantity',
        'category_id'
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
    use HasFactory;
}
