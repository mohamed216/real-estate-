<h2>Order Details</h2>

<p>Order ID: {{ $order->id }}</p>

@if ($order->property)
    <p>Property Name: {{ $order->property->property_name }}</p>
    <!-- Display other property details as needed -->
@else
    <p>No associated property found for this order.</p>
@endif
