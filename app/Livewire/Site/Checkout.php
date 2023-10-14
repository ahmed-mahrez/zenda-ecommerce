<?php

namespace App\Livewire\Site;

use App\Mail\PLaceOrderMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use App\Models\{Cart, Order, OrderItem, Product, ProductColor, Color};

class Checkout extends Component
{
    public $totalAmount = 0;
    public $fullname, $phone, $email, $pincode, $address, $payment_mode, $payment_id;

    public function rules()
    {
        return [
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'min:10', 'max:11'],
            'pincode' => ['required', 'string', 'digits:5'],
            'address' => ['required', 'string', 'max:500']
        ];
    }


    public function getTotalAmount()
    {
        $items = Cart::where('user_id', auth()->id())->get();
        foreach($items as $item){
            $this->totalAmount += $item->product->selling_price * $item->quantity;
        }
    }

    public function placeOrder(){
        $this->validate();

        $order = Order::create([
            'user_id' => auth()->id(),
            'tracking_no' => date('Y') . '-000' . Order::count() + 1,
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'zip_code' => $this->pincode,
            'address' => $this->address,
            'status' => 'in progress',
            'payment_mode' => $this->payment_mode,
        ]);

        $cartItems = Cart::with('product')->where('user_id', auth()->id())->get();
        foreach($cartItems as $item){
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'color_id' => $item->color_id,
                'quantity' => $item->quantity,
                'total_price' => $item->product->selling_price * $item->quantity
            ]);
            
            $product_colors = $item->product->colors();

            if($product_colors->count()){
                ProductColor::where('id', $item->color_id)->first()->decrement('quantity', $item->quantity);
                $item->product->update(['quantity' => $product_colors->sum('quantity')]);
            }
            else{
                $item->product->decrement('quantity', $item->quantity);
            }
        }

        return $order;
    }

    public function codOrder(){
        $this->payment_mode = 'Cash on Delivery';
        $order = $this->placeOrder();
        Mail::to($order->email)->send(new PLaceOrderMail($order));
        Cart::where('user_id', auth()->id())->delete();
        return redirect('/cart')->with('success', "Your order has been placed succesfully, orderID: $order->tracking_no");
    }

    public function payOnline(){
        $this->payment_mode = 'online-payment';
        $order = $this->placeOrder();
        return to_route('online-pay', $order->id);
    }

    public function render()
    {
        $this->getTotalAmount();
        return view('livewire.site.checkout');
    }
}
