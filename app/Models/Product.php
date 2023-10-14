<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Category, ProductImage, ProductColor, Brand};


class Product extends Model
{
    protected $fillable = [
                'category_id', 'name', 'slug', 'brand_id', 'brand_id', 'breif', 'description', 'original_price', 'selling_price',
                'quantity', 'trending', 'status', 'meta_title', 'meta_keyword', 'meta_description'
                ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function firstImage(){
        return $this->images()->first();
    }

    public function colors(){
        return $this->hasMany(ProductColor::class);
    }


    
}
