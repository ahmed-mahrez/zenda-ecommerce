<x-admin-layout title="Order no: {{$order->tracking_no}}">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Order: {{$order->tracking_no}}
                        <a href="{{route('admin.orders.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Detials</h5>
                            <hr>
                            <h6>Order tracking no: <span style="color:blue">{{ $order->tracking_no }}</span></h6>
                            <h6>Order created at: <span style="color:blue">{{ $order->created_at }}</span></h6>
                            <h6>Payment Mode: <span style="color:blue">{{ $order->payment_mode }}</span></h6>
                            <br>
                            <h6 class="border p-2">
                                Order status: <span class="text-uppercase text-success">{{ $order->status }}</span></span>
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
                    <hr>
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
                                    <td style="width:10%">
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
            <div class="card card-border mt-3">
                <div class="card-body">
                    <h4>Order Proccess</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-5">
                            <form action="{{route('admin.orders.update', $order->tracking_no)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Update Order Status</label>
                                <div class="input-group">
                                    <select name="order_status" class="form-select mt-2 mb-2">
                                        <option selected disabled>Select Status</option>
                                        <option @selected($order->status =='in progress' ) value="in progress">in progress</option>
                                        <option @selected($order->status =='completed' ) value="completed">completed</option>
                                        <option @selected($order->status =='pending' ) value="pending">pending</option>
                                        <option @selected($order->status =='canceled' ) value="canceled">canceled</option>
                                        <option @selected($order->status =='out-for-delivery' ) value="out-for-delivery">out for delivery</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary text-white">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>