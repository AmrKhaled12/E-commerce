<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <link rel="stylesheet" href="{{asset('assets/css/cart.css')}}">
</head>
<body>
    <div class="cart-container">
        <h1>Your Cart</h1>
        <table id="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                <tr class="cart-item">
                    <td>{{$cart->name}}</td>
                    <td class="price">{{$cart->price}}</td>
                    <td>
                        <input type="number" value="{{$cart->quantity}}" class="quantity" onchange="updateCart()">
                    </td>
                    <td class="total">${{$cart->total}}</td>
                    <td><a href="{{route('delete-item',$cart->product_id)}}" class="remove-btn" onclick="removeItem(this)">Remove</a></td>
                </tr>
    @endforeach
            </tbody>
        </table>

        <div class="cart-summary">
            <p id="total-price">Total:{{$total}}</p>
            <button id="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <!-- <script src="{{asset('assets/js/cart.js')}}"></script> -->
</body>
</html>