@extends('admin.admin_dashboard')
@section('admin')
<h2>All Orders</h2>
@if($orders->isEmpty())
    <p>No orders found.</p>
@else
<div class="table-responsive">
    <table id="dataTableExample" class="table">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer Name</th>
                <th>Username</th>
                <th>email</th>
                <th>phone</th>
                <th>Property Code</th>
                <th>Property Name</th>
                <th>Payment Method</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->user->username }}</td>
                    <td>{{ $order->user->email }}</td>
                    <td>{{ $order->user->phone }}</td>
                    <td>{{ $order->property->property_code }}</td>
                    <td>{{ $order->property->property_name }}</td>
                    <td>{{ $order->payment_method }}</td>
                    
                    <!-- Display more columns as needed -->
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection