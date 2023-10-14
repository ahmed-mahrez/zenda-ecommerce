<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImages extends Component
{
    public $product_id;

    public function deleteImage(int $id){
        $image = ProductImage::findorfail($id);
        Storage::disk('public')->delete($image->image);
        $image->delete();
    }

    public function render()
    {
        $product = Product::findorFail($this->product_id);
        $images = $product->images;
        return view('livewire.admin.products.product-images', compact('images'));
    }
}
