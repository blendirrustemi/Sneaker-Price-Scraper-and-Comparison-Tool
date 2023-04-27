<?php
session_start();

require_once '../../bootstrap.php';
global $sneakerService;
global $userService;

if (isset($_SESSION["user"])) {
    $user = $userService->getUserById($_SESSION["user_id"]);
} else {
    header("Location: ./home.php");
}

$successChange = $_SESSION["successChange"];
$failChange = $_SESSION["failChange"];

if($successChange){
    $successMsg = '<h3 class="text-success text-center">Password Changed Successfully!<h3>';
}elseif($failChange){
    $failMsg = '<h5 class="text-danger text-center"><b>Enter your Old Password Correctly!</b><h5>';
}

$getUserDataResult = $userService->getUserByEmail($_SESSION['email']);

if ($getUserDataResult) {
    $_SESSION["user"] = $getUserDataResult;
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
<body class="bgBody">
<?php
$path = './';
require $path . 'scripts/inc/navNSearch.php';
?>
<div class="profileMain">
    <div class="myProfileMain">
        <div class="myProfileChild">
            <img  class="round" src="./media/profile.jpeg" alt="" width="150">
            <form action="" id="myProfileForm">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value='<?php echo $_SESSION['user']['name'] ?>' readonly>
                <label for="surname">Surame:</label>
                <input type="text" id="surname" name="surname" value='<?php echo $_SESSION['user']['surname'] ?>' readonly>
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value='<?php echo $_SESSION['user']['email'] ?>' readonly>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" readonly value="password">
            </form>
            <form method="POST" action="./scripts/php/changePassword.php" id="myProfileFormChangePass" onsubmit="checkPasswordChange(event)">
                <label for="oldPass">Old Password:</label>
                <input type="password" id="oldPass" name="oldPass">
                <label for="newPass">New Password:</label>
                <input type="password" id="newPass" name="newPass">
                <p id="passwordAlert" class="hidden">Please Create A Valid New Password(At least 8 characters)!</p>
                <label for="confirmNewPass">Confirm New Password:</label>
                <input type="password" id="confirmNewPass" name="confirmNewPass">
                <p id="noMatchAlert" class="hidden">Passwords Do Not Match!</p>
                <p id="confirmPasswordAlert" class="hidden">Please Confirm Your Password!</p>
                <input type="hidden" name="email" value='<?php echo $_SESSION['user']['email'] ?>'>

                <div class="d-flex justify-content-center w-100 flex-column">
                    <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
            </form>
            <?php echo $successMsg?>
            <?php echo $failMsg?>
        </div>

        <div id="profileButtons">
            <button type='button' class="btn btn-success">View My Cart</button>
            <button type='button' id="changePassBtn" class="btn btn-danger" onclick="passwordChange()">Change Password</button>
            <button type='button' id="goBackBtn" class="btn btn-danger" onclick="cancelPasswordChange()">Cancel</button>
        </div>
    </div>
    <script src="./scripts/js/functions.js"></script>
    <script src="scripts/js/script.js"></script>

    <script>
        document.getElementById("myProfileFormChangePass").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission

            var oldPassword = document.getElementById("oldPass").value;
            var newPassword = document.getElementById("newPass").value;
            var confirmPassword = document.getElementById("confirmNewPass").value;

            if (newPassword.length < 8) {
                alert("New password should be at least 8 characters long.");
                return;
            }

            if (newPassword !== confirmPassword) {
                alert("New password and confirm password do not match.");
                return;
            }

            // Proceed with submitting the form
            document.getElementById("myProfileFormChangePass").submit();
        });
    </script>
</body>
</html>