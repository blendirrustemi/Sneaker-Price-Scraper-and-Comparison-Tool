<?php

session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $shoppingCartService;
global $userService;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['remove_user'])){
        $user_email = $_POST['user_email'];
        $user_id = $userService->getUserByEmail($user_email)['user_id'];

        $deleted_user = $userService->removeUser($user_id);
    }
}
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
<form method="POST" action="">
    <label for="user_email">User Email:</label>
    <input type="text" name="user_email" id="user_email" required>
    <button type="submit" name="remove_user">Remove User</button>
</form>

<h2>Add/Remove Sneakers</h2>
<form method="POST" action="" enctype="multipart/form-data">
    <label for="sneaker_model">Sneaker Model:</label>
    <input type="text" name="sneaker_model" id="sneaker_model" required>

    <label for="sneaker_price">Sneaker Price:</label>
    <input type="text" name="sneaker_price" id="sneaker_price" required>

    <label for="sneaker_image">Sneaker Image:</label>
    <input type="file" name="sneaker_image" id="sneaker_image" accept="image/*" required>

    <button type="submit">Add Sneaker</button>
</form>

<form method="POST" action="">
    <label for="sneaker_remove_model">Sneaker Model:</label>
    <input type="text" name="sneaker_remove_model" id="sneaker_remove_model" required>
    <button type="submit">Remove Sneaker</button>
</form>

<script>
    // confirm before removing user
    document.querySelector('form[action=""]').addEventListener('submit', function (e) {
        if (!confirm('Are you sure you want to remove this?')) {
            e.preventDefault();
        }
    });

</script>

</body>
</html>
