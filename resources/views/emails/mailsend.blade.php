<!DOCTYPE html>
<html>
<head>
    <title>Order Shipped</title>
</head>
<body>
    <h1>Your order has been shipped!</h1>
    <p>Order ID: {{ $order->id }}</p>
    <p>Total: ${{ $order->total }}</p>
    <p>Shipped Date: {{ $order->shipped_at->format('Y-m-d') }}</p>
</body>
</html>