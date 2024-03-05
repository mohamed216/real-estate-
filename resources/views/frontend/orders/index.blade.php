@extends('frontend.frontend_dashboard')
@section('main')
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Property Code</th>
                <th>Max Price</th>
                <th>Short Description</th>
                <th>City</th>
                <th>Payment Method</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                @if ($order->property)
                <td>{{ $order->property->property_code }}</td>
                <td>{{ $order->property->max_price }}</td>
                <td>{{ $order->property->short_descp }}</td>
                <td>{{ $order->property->city }}</td>
                <td>{{ $order->payment_method }}</td>
                @else
                <td colspan="6">No associated property found for this order.</td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection