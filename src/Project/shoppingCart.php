<?php

session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $userService;
global $shoppingCartService;

if (isset($_SESSION["user"])) {
    $user = $userService->getUserById($_SESSION["user"]["user_id"]);
}

$items = $shoppingCartService->getShoppingCartItems($user["user_id"]);
$total_price = 0;

foreach ($items as $item) {
    $total_price += $item["price"];
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Shopping Cart</h1>
<table>
    <thead>
    <tr>
        <th>Model</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($items as $item): ?>
    <tr>
        <td><?=$item["model"]?></td>
        <td>$<?=$item['price']?></td>
        <td>#<?=$item['quantity']?></td>
        <td><button>Remove</button></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3">Total:</td>
        <td>$<?=$total_price?></td>
    </tr>
    </tfoot>
</table>
<button>Checkout</button>
</body>
</html>
