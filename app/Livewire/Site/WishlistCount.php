<?php

namespace App\Livewire\Site;

use App\Models\Wishlist;
use Livewire\Component;

class WishlistCount extends Component
{
    public $count = 0;

    protected $listeners = ['updateWishlistCount' => 'countStatus'];

    public function countStatus(){
        if(!auth()->check()){
            $this->count = 0;
        }

        $this->count = Wishlist::where('user_id', auth()->id())->count();
    }

    public function render()
    {
        $this->countStatus();
        return view('livewire.site.wishlist-count');
    }
}
