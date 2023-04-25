<?php
session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $userService;

$getUserDataResult = $userService->getUserByEmail($_SESSION['email']);

if ($getUserDataResult) {
    $_SESSION["user"] = $getUserDataResult;
}else{

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./media/icon.png">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title><?php echo  $_SESSION['user']['name'] . ' ' .  $_SESSION['user']['surname'] ?>'s  Profile</title>
</head>
<body>
<?php
  $path = './';
  require $path . 'scripts/inc/navNSearch.php';
  ?>
    <div class="profileMain">
        <div class="myProfileMain">
            <div class="myProfileChild">
                <img  class="round" src="./media/profile.jpeg" alt="" width="150">
                <form action="" class="myProfileForm">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value='<?php echo $_SESSION['user']['name'] ?>' readonly>
                    <label for="surname">Surame:</label>
                    <input type="text" id="surname" name="surname" value='<?php echo $_SESSION['user']['surname'] ?>' readonly>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value='<?php echo $_SESSION['user']['email'] ?>' readonly>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" readonly value="password">
                </form>
            </div>
            <div class="profileButtons">
                <button type='button' class="btn btn-success">View My Cart</button>
                <button type='button' class="btn btn-danger">Change Password</button>
            </div>
        </div>
    </div>
    <script src="scripts/js/script.js"></script>
</body>
</html>