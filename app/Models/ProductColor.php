<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Color;

class ProductColor extends Model
{
    protected $fillable = ['product_id', 'color_id', 'quantity'];

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
