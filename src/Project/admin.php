<?php

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<h1>Admin Panel</h1>

<h2>Remove Users</h2>
<form method="POST" action="/remove_user">
    <label for="user_id">User ID:</label>
    <input type="text" name="user_id" id="user_id" required>
    <button type="submit">Remove User</button>
</form>

<h2>Add/Remove Sneakers</h2>
<form method="POST" action="/add_sneaker">
    <label for="sneaker_model">Sneaker Model:</label>
    <input type="text" name="sneaker_model" id="sneaker_model" required>
    <label for="sneaker_image">Sneaker Image URL:</label>
    <input type="text" name="sneaker_image" id="sneaker_image" required>
    <label for="sneaker_price">Sneaker Price:</label>
    <input type="text" name="sneaker_price" id="sneaker_price" required>
    <button type="submit">Add Sneaker</button>
</form>

<form method="POST" action="/remove_sneaker">
    <label for="sneaker_id">Sneaker ID:</label>
    <input type="text" name="sneaker_id" id="sneaker_id" required>
    <button type="submit">Remove Sneaker</button>
</form>

</body>
</html>

