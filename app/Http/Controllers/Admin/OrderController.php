<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'DESC')->when($request->date, function($query) use ($request){
                                                $query->whereDate('created_at', $request->date);
                                            })->when($request->status, function($query) use ($request){
                                                $query->where('status', $request->status);
                                            })->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }
    
    public function show(string $id)
    {
        $order = Order::where('tracking_no', $id)->first();
        if(!$order){
            abort(404);
        }
        return view('admin.orders.order', compact('order'));
    }


    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request, string $id)
    {
        $order = Order::where('tracking_no', $id)->first();
        if(!$order){
            abort(404);
        }
        $order->update(['status' => $request->order_status]);
        return back()->with('success', 'status updated');
    }

    
    public function destroy(string $id)
    {
        //
    }
}
