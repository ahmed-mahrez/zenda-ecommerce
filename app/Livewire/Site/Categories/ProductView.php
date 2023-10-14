<?php

namespace App\Livewire\Site\Categories;

use Livewire\Component;
use App\Models\{Product, ProductColor, Wishlist, Cart};
use Illuminate\Support\Facades\Cookie;

class ProductView extends Component
{
    public $product;
    public $quantity = 1;
    public $selected_color_id;

    public function incrementQty(){
        $this->quantity++;
    }

    public function decrementQty(){
        $this->quantity--;
    }

    public function mount(Product $product){
        $this->product = $product;
    }

    public function addToWishlist(){
        if(!auth()->check()){
            session()->flash('warning', 'You must login to continue');
            return;
        }
        
        if(Wishlist::where('user_id', auth()->id())->where('product_id', $this->product->id)->exists()){
            session()->flash('warning', 'This product is already in your wishlist');
            Cookie::queue('bari', 'nothint do do', 60);
            return; 
        }

        Wishlist::create([
            'user_id' => auth()->id(),
            'product_id' => $this->product->id
        ]);
        
        session()->flash('success', 'This product was added to your wishlist');
        $this->dispatch('updateWishlistCount');
    }

    public function addToCart(){
        //dd($this->selected_color_id);
        if(!auth()->check()){
            session()->flash('warning', 'You must login to continue');
            return;
        }   

        // check product general quantity
        if(!$this->product->colors()->count()){
            if($this->product->quantity < $this->quantity){
                session()->flash('warning', 'this quantity is currently out of stock');
                return;
            }  
        }

        // check product colors
        if($this->product->colors()->count()){
            // check if proudct color is selected
            if(!$this->selected_color_id){
                session()->flash('warning', 'please, select a color.');
                return;
            }

            // check if proudct color is in stock
            $product_selected_color = ProductColor::findorFail($this->selected_color_id);
            if(!$product_selected_color->quantity){
                session()->flash('warning', 'this color is out of stock');
                return;
            }
            
            // check if proudct color is in stock  // inspect-element
            if($product_selected_color->quantity < $this->quantity){
                session()->flash('warning', 'this quantity is not in stock right now');
                return;
            }  
        }

        // check if product already exists in cart
        $product_exists = Cart::where('product_id', $this->product->id)->where('color_id', $this->selected_color_id)->exists();
        if($product_exists){
            session()->flash('warning', 'this product is already in your cart');
            return;
        }

        if($this->quantity < 1){
            session()->flash('warning', 'quantity must be at least 1');
            return;
        }

        Cart::create([
            'user_id' => auth()->id(),
            'product_id' => $this->product->id,
            'color_id' => $this->selected_color_id,
            'quantity' => $this->quantity
        ]);

        session()->flash('success', 'This product was added to your cart');
        $this->dispatch('updateCartCount');
        $this->quantity = 1;
    }


    public function render()
    {
        return view('livewire.site.categories.product-view');
    }
}
