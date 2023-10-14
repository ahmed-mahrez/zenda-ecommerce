<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Product, ProductColor};

class OrderItem extends Model
{
    protected $fillable = ['order_id' ,'product_id', 'color_id', 'quantity', 'total_price'];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function color(){
        return $this->belongsTo(ProductColor::class, 'color_id');
    }
}
