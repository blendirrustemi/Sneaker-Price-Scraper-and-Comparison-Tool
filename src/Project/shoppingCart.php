<?php

session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $userService;
global $shoppingCartService;

if (isset($_SESSION["user"])) {
    $user = $userService->getUserById($_SESSION["user_id"]);
}

$items = $shoppingCartService->getShoppingCartItems($user['user_id']);
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
    <link rel="icon" href="./media/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body class="bgBody">
<?php
$path = './';
require $path . 'scripts/inc/navNSearch.php';
?>
<div class="cartMain">
    <div class="cartHeader">
        <div class="header">
            <h1>My Shopping Cart :</h1>
        </div>
    </div>
    <div class="cartItems mt-1">
        <?php foreach ($items as $item): ?>
            <div class="cartItem">
                <img src="<?=$item["image"]?>" width="200px">
                <div>
                    <h3><?=$item["model"]?></h3>
                    <p>Price: $<?=$item['price']?></p>
                    <p>Size: <?=$item["size"]?></p>
                    <p>Quantity: <?=$item['quantity']?></p>
                    <button class="btn btn-danger removeBtn">Remove</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="cartHeader">
        <div class="header">
            <h1>Your Total: $<?=$total_price?></h1>
            <button class="btn btn-success">Checkout</button>
        </div>
    </div>
</div>
<script src="./scripts/js/script.js"></script>
</body>
</html>
