@extends('layouts.app')

@section('content')
<div class="container-fluid my-4">
    <div class="card">
        <div class="card-header bg-coffee text-white">
            <h3 class="mb-0">Order Items - Order #{{ $order->order_number }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Customer Information</h5>
                    <p><strong>Name:</strong> {{ $order->user->name }}<br>
                    <strong>Email:</strong> {{ $order->user->email }}<br>
                    <strong>Phone:</strong> {{ $order->phone }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Shipping Address</h5>
                    <p>{{ $order->shipping_address }}<br>
                    {{ $order->city }}, {{ $order->postal_code }}</p>
                </div>
            </div>
            
            <h5>Order Items</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>₨ {{ number_format($item->price, 2) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₨ {{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th>₨ {{ number_format($order->total_amount, 2) }}</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
            <div class="mt-3">
                <a href="{{ route('admin.orders') }}" class="btn btn-secondary">Back to Orders</a>
            </div>
        </div>
    </div>
</div>

<style>
    .bg-coffee {
        background: #2c1810 !important;
    }
</style>
@endsection