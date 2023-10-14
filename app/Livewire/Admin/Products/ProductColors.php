<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\{Color, Product, ProductColor};

class ProductColors extends Component
{   
    public $product_id;
    public $product;
    public $colors;
    public $product_colors;
    public $other_colors;
    public $productColors;

    public function removeColor($id){
        $product_color = ProductColor::findorFail($id);
        $product_color->delete();
    }

    public function render()
    {
        $product = Product::findOrFail($this->product_id);
        $this->colors = Color::all();
        $this->product_colors = $product->colors->pluck('color_id')->toArray();
        $this->other_colors = Color::whereNotIn('id', $this->product_colors)->get();
        $this->productColors = ProductColor::with('color')->where('product_id', $this->product_id)->get();

        return view('livewire.admin.products.product-colors');
    }
}
