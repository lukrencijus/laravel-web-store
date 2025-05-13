<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'desc', 'category_id', 'image', 'is_available',];

    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }
    
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_product')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }
}
