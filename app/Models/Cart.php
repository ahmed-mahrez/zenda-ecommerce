<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Product, ProductColor};

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'color_id', 'quantity'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(ProductColor::class, 'color_id');
    }
}
