<?php

session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $shoppingCartService;
global $userService;

$users = $userService->getAllUsers();
$sneakers = $sneakerService->getAllSneakers();

if ($_SESSION['user']['is_admin'] == 0) {
    header("Location: ./home.php");
}



if (isset($_POST['remove_user'])){
    $user_email = $_POST['user_email'];
    $user_id = $userService->getUserByEmail($user_email)['user_id'];

    $deleted_user = $userService->removeUser($user_id);
}

if (isset($_POST['remove_sneaker'])) {
    $model = $_POST['sneaker_remove_model'];
    $sneaker_id = $sneakerService->getSneakersbyModel($model)['sneaker_id'];

    $removed_sneaker = $sneakerService->removeSneakers($sneaker_id);

}

if (isset($_POST['add_sneaker'])) {
    $model = $_POST['sneaker_model'];
    $price = $_POST['sneaker_price'];
    $image = $_FILES['sneaker_image']['name'];

    $img_path = "media/".basename($image);


//    print_r("Model: $model");
//    print_r("Price: $price");
//    print_r("Image: $img_path");
    $added_sneaker = $sneakerService->addSneakers($model, $img_path, $price);

    print_r("SNEAKER ID: $added_sneaker");

}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

</head>
<body class="bgBody">
<div class="adminMain">
    <h1 class="title">Admin Panel</h1>
    <div class="userRemoval">
        <h2>Remove Users</h2>
        <form method="POST" action="">
            <div>
                <label for="user_email">User Email:</label>
                <input class="adminInput" type="text" name="user_email" id="user_email" required>
            </div>
            <button type="submit" name="remove_user" class="btn btn-danger">Remove User</button>
        </form>
    </div>
    <h1 class="title m-4">Add/Remove Sneakers</h1>
    <div class="adderRemoverParent">
        <div class="shoeAdder">
            <h2 class="formTitle">Add Sneakers</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <div>
                    <label for="sneaker_model">Sneaker Model:</label>
                    <input class="adminInput" type="text" name="sneaker_model" id="sneaker_model" required>
                </div>

                <div>
                    <label for="sneaker_price">Sneaker Price:</label>
                    <input class="adminInput btn-danger" type="text" name="sneaker_price" id="sneaker_price" required>
                </div>
                <label for="sneaker_image">Sneaker Image:</label>
                <input type="file" name="sneaker_image" id="sneaker_image" accept="image/*" required>
                <button  class="btn btn-success mt-4 formBtn" type="submit" name="add_sneaker" id="add_sneaker">Add Sneaker</button>
            </form>
        </div>
        <div class="shoeRemover">
            <form method="POST" action="">
                <h2 class="formTitle">Remove Sneakers</h2>
                <div>
                    <label for="sneaker_remove_model">Sneaker Model:</label>
                    <input class="adminInput" type="text" name="sneaker_remove_model" id="sneaker_remove_model" required>
                </div>
                <button class="btn btn-danger mt-4 formBtn" type="submit"  name="remove_sneaker" id="remove_sneaker">Remove Sneaker</button>
            </form>
        </div>
    </div>

</div>


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
