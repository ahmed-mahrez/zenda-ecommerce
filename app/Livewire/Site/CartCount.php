<?php

namespace App\Livewire\Site;

use Livewire\Component;
use App\Models\Cart;

class CartCount extends Component
{
    public $count = 0;

    protected $listeners = ['updateCartCount' => 'countStatus'];

    public function countStatus(){
        if(!auth()->check()){
            $this->count = 0;
        }

        $this->count = Cart::where('user_id', auth()->id())->count();
    }

    public function render()
    {
        $this->countStatus();
        return view('livewire.site.cart-count');
    }
}
