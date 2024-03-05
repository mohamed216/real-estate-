<h2>My Cart</h2>

@if ($carts->isEmpty())
    <p>Your cart is empty.</p>
@else
    <table>
        <thead>
            <tr>
                <th>Property</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carts as $cart)
                <tr>
                    <td>{{ $cart->property->property_name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>
                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif