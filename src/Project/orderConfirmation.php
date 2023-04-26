<?php
session_start();

require_once '../../bootstrap.php';
global $userService;
global $shoppingCartService;

if (isset($_SESSION["user"])) {
    $user = $userService->getUserById($_SESSION["user_id"]);
}

$order = $shoppingCartService->getOrder($user['user_id']);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Order</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .order-details {
            margin-top: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .order-details p {
            margin: 10px 0;
        }

        .order-details .order-id,
        .order-details .user-id,
        .order-details .order-date {
            font-weight: bold;
        }

        .back-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #555;
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Confirmation Order</h1>
    <div class="order-details">
        <p>Thank you for your order! Your order has been placed successfully.</p>
        <!-- Display order details here -->
        <p>Order ID: <span class="order-id"><?=$order['order_id']?></span></p>
        <p>User ID: <span class="user-id"><?=$user['user_id']?></span></p>
        <p>Order Date: <span class="order-date"><?=$order['order_date']?></span></p>
    </div>
    <button class="back-button" onclick="goToShoppingCart()">Go Back to Shopping Cart</button>
</div>

<script>
        function goToShoppingCart() {
        window.location.href = "./shoppingCart.php";
    }
</script>
</body>
</html>
