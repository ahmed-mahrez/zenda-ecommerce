<?php

namespace App\Livewire\Site;

use Livewire\Component;
use App\Models\Wishlist as WishlistModel;

class Wishlist extends Component
{
    public $wishlist;

    public function removeItem($product_id){
        WishlistModel::where('user_id', auth()->id())->where('product_id', $product_id)->delete();
        $this->dispatch('updateWishlistCount');
    }

    public function render()
    {
        $this->wishlist = WishlistModel::with('product.category')->where('user_id', auth()->id())->get();
        return view('livewire.site.wishlist');
    }
}
