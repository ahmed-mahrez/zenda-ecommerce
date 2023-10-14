<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{Order, Cart};
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('site.checkout.index');
    }


    public function payment($order_id){
        
        \Stripe\Stripe::setApiKey(config('services.stripe.secret_key'));

        $order = Order::findOrFail($order_id);

        $items = [];
        foreach($order->items as $item){
            $items[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                      'name' => $item->product->name,
                    ],
                    'unit_amount' => $item->product->selling_price * 100,
                  ],
                  'quantity' => $item->quantity,
            ];
        }

        //dd($items);

        $checkout_session = \Stripe\Checkout\Session::create([
                'line_items' => $items,
                'mode' => 'payment',
                'success_url' => 'http://localhost:8000/order-success?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => 'http://localhost:8000/order-fail?session_id={CHECKOUT_SESSION_ID}',
            ]);

            $order->payment_id = $checkout_session->id;
            $order->save();

          return redirect($checkout_session->url);

    }

    public function orderSuccess(Request $request){
        $order = Order::where('payment_id', $request->session_id)->where('payment_status', 'unpaid')->first();

        if(!$order){
            abort(404);
        }

        $order->payment_status = 'paid';
        $order->save();
        Cart::where('user_id', auth()->id())->delete();
        return redirect('/orders')->with('success', "Your order has been placed succesfully, orderID: $order->tracking_no");
    }


    public function orderFail(Request $request){
        $order = Order::where('payment_id', $request->session_id)->first();

        if(!$order){
            abort(404);
        }

        $order->delete();

        return redirect('/checkout');
    }

}
