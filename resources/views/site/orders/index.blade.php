<x-site-layout title="My Orders">
     <div class="py-3 py-md-5">
        <div class="container">
            <x-admin.alert />
            <div class="row">
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="mb-4">My Orders</h4>
                        <hr>
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
                                            <td><a href="orders/{{ $order->tracking_no }}" class="btn btn-primary btn-sm">View</a></td>
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
     </div>
</x-site-layout>