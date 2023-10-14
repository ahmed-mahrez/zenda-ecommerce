<x-admin-layout title="Orders">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Orders
                        <!-- <a href="{{route('admin.orders.create')}}" class="btn btn-primary float-end">Add product</a> -->
                    </h3>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Filter by Date</label>
                                <input type="date" name="date" value="{{request('date')}}" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label>Filter by Status</label>
                                <select name="status" class="form-control" style="padding:17px">
                                    <option selected disabled>Select Status</option>
                                    <option @selected(request('status') == 'in progress') value="in progress">in progress</option>
                                    <option @selected(request('status') == 'completed') value="completed">completed</option>
                                    <option @selected(request('status') == 'pending') value="pending">pending</option>
                                    <option @selected(request('status') == 'canceled') value="canceled">canceled</option>
                                    <option @selected(request('status') == 'out-for-delivery') value="out-for-delivery">out for delivery</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <br>
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                    <Br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th>Tracking No</th>
                                <th>Payment Method</th>
                                <th>Order Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                <tr>
                                    <td>{{ $order->tracking_no }}</td>
                                    <td>{{ $order->payment_mode }}</td>
                                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td><a href="{{ route('admin.orders.show', $order->tracking_no) }}" class="btn btn-primary btn-sm">View</a></td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5">- No orders yet.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>