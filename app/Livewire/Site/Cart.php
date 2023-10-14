<?php

namespace App\Livewire\Site;

use Livewire\Component;
use App\Models\Cart as CartModel;
use App\Models\Product;
use App\Models\ProductColor;

class Cart extends Component
{
    public $cart;
    public $totalPrice = 0;

    public function removeItem($item_id){
        CartModel::where('user_id', auth()->id())->where('id', $item_id)->delete();
        $this->dispatch('updateCartCount');
    }

    public function increment($item_id, $color_id){
        $item = CartModel::where('user_id', auth()->id())->where('id', $item_id);

        if($color_id){
            $item = CartModel::where('user_id', auth()->id())->where('id', $item_id)->first();
            $product_color = ProductColor::where('product_id', $item->product->id)->where('color_id', $color_id)->first();
            
            if($product_color->quantity == $item->quantity){
                session()->flash('warning', 'this quantity is not in stock right now');
                return;
            }
        }
        else{
            $item = CartModel::where('user_id', auth()->id())->where('id', $item_id)->whereNull('color_id')->first();
        }
        
        if($item){
            $item->increment('quantity');
        }
    }

    public function decrement($item_id, $color_id){

        $item = CartModel::where('user_id', auth()->id())->where('id', $item_id);

        if($color_id){
            $item = CartModel::where('user_id', auth()->id())->where('id', $item_id)->first();
        }
        else{
            $item = CartModel::where('user_id', auth()->id())->where('id', $item_id)->whereNull('color_id')->first();
        }

        if($item && $item->quantity != 1){
            $item->decrement('quantity');
        }
    }

    public function render()
    {
        $this->cart = CartModel::with(['product.category', 'color.color'])->where('user_id', auth()->id())->get();
        return view('livewire.site.cart');
    }
}
