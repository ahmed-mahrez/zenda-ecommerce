<x-site-layout title="Order no: {{$order->tracking_no}}">
    <div class="py-3 py-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            <i class="fa fa-shoppin-cart text-dark"></i>Order: {{$order->tracking_no}}
                            <a href="/orders" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>Order Detials</h5>
                                <hr>
                                <h6>Order tracking no: <span style="color:blue">{{ $order->tracking_no }}</span></h6>
                                <h6>Order created at: <span style="color:blue">{{ $order->created_at }}</span></h6>
                                <h6>Payment Mode: <span style="color:blue">{{ $order->payment_mode }}</span></h6>
                                <br>
                                <h6 class="border p-2 text-success">
                                    Order status: <span class="text-uppercase">{{ $order->status }}</span></span>
                                </h6>
                            </div>
                            <div class="col-md-6">
                                <h5>User Detials</h5>
                                <hr>
                                <h6>Full Name: <span style="color:blue">{{ $order->fullname }}</span></h6>
                                <h6>Email: <span style="color:blue">{{ $order->email }}</span></h6>
                                <h6>Phone: <span style="color:blue">{{ $order->phone }}</span></h6>
                                <h6>Zip Code: <span style="color:blue">{{ $order->zip_code }}</span></h6>
                                <h6>Address: <span style="color:blue">{{ $order->address }}</span></h6>
                            </div>
                        </div>
                        <br>
                        <h5>Order Items</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <th>Item ID</th>
                                    <th>Product</th>
                                    <th>Color</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td style="width:5%">{{ $item->id }}</td>
                                        <td style="width:20%">{{ $item->product->name }}</td>
                                        <td style="width:10%">
                                            @if($item->color_id)
                                                <label class="price" style="color:{{ $item->color->color->code }}">{{ $item->color->color->name }} </label>
                                            @else
                                                <label class="price">_______</label>
                                            @endif
                                        </td>
                                        <td  style="width:10%">
                                            <img src="{{asset("storage/" . $item->product->firstImage()->image)}}" style="width: 50px; height: 40px;border-radius:3px" alt="">
                                        </td>
                                        <td style="width:10%">{{ $item->quantity }}</td>
                                        <td style="width:10%">${{ $item->total_price }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="5" class="fw-bold">Total Amount: </td>
                                        <td class="fw-bold">${{ $order->items->sum('total_price') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>