<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('user_id', auth()->id())->orderBy('id', 'DESC')->paginate(10);
        return view('site.orders.index', compact('orders'));
    }

    public function show(string $tracking){
        $order = Order::where('user_id', auth()->id())->where('tracking_no', $tracking)->first();
        if(!$order){
            abort(404);
        }
        return view('site.orders.order', compact('order'));
    }

    

}
