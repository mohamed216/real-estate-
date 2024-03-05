{{-- @extends('frontend.frontend_dashboard')
@section('main') --}}
<!-- resources/views/orders/create.blade.php -->
<h2>{{ $property->property_name }}</h2>
<p>{{ $property->short_descp }}</p>
<p>Price: {{ $property->lowest_price }}</p>

<!-- Create Order form -->
<div class="details-box content-widget">
    <div class="title-box">
        <h4>Property Details</h4>
    </div>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
    
        <input type="hidden" name="property_id" value="{{ $property->id }}">
        <label for="payment_method">Payment Method:</label>
        <select name="payment_method" id="payment_method">
            <option value="cash">Cash</option>
            <option value="visa">Visa</option>
        </select>
    
        <button type="submit" class="btn btn-primary">Create Order</button>
       
    </form>
</div>



{{-- @endsection --}}