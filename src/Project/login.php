<?php
session_start();    
$successRegister = $_SESSION["successRegister"];
$failLogin = $_SESSION["failLogin"];
if($successRegister){
    $successMsg = '<h3 class="text-success text-center">Registration Successfull<h3>';
}elseif($failLogin){
    $failMsg = '<h5 class="text-danger text-center"><b>Invalid Email Or Password!</b><h5>';
}
session_destroy();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="media/icon.png">
    <title>ShoeShop</title>
</head>
<body class="bgBody">
    <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
        <div class="toast-body">
            Registration Successful!
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    <div id="loginLanding">
        <div class="login-wrap">
            <div class="login-html">    
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Sign In</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">Sign Up</label>
                <div class="login-form">
                    <form id="login_form" method="POST" action="./scripts/php/userValidationScript.php" onsubmit="loginFormChecker(event)">
                        <div class="sign-in-htm">
                            <div class="group">
                                <label for="user" class="label">Email</label>
                                <input id="emailLogin" name="email" type="email" class="input">
                                <p class="hidden" id="emailLoginAlert">Enter An Email!</p>
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="passwordLogin" name="password" type="password" class="input" data-type="password">
                                <p class="hidden" id="passwordLoginAlert">Enter A Valid Password!</p>
                                <?php echo $failMsg ?>
                            </div>
                            <div class="group">
                                <input id="check" type="checkbox" class="check" checked>
                                <label for="check"><span class="icon"></span> Keep me Signed in</label>
                            </div>
                            <div class="group">
                                <input type="submit" name="login_submit" class="button" value="Sign In">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <a href="#forgot">Forgot Password?</a>
                            </div>
                            <?php echo $successMsg ?>
                        </div>
                    </form>
                    <form id="register_form" method="POST" action="./scripts/php/userRegistrationScript.php" onsubmit="registerFormChecker(event)">
                        <div class="sign-up-htm">
                            <div class="group">
                                <label for="fname" class="label">First Name</label>
                                <input id="name" name="fname" type="text" class="input">
                                <p id="nameAlert" class="hidden">Please Enter a Name!</p>
                            </div>
                            <div class="group">
                                <label for="lname" class="label">Last Name</label>
                                <input id="lname" name="lname" type="text" class="input">
                                <p id="surnameAlert" class="hidden">Please Enter a Surame!</p>
                            </div>
                            <div class="group">
                                <label for="pass1" class="label">Password</label>
                                <input id="pass1" name="pass1" type="password" class="input" data-type="password">
                                <p id="passwordAlert" class="hidden">Please Create Your Password(At least 8 characters)!</p>
                            </div>
                            <div class="group">
                                <label for="pass2" class="label">Confirm Password</label>
                                <input id="pass2" name="pass2" type="password" class="input" data-type="password">
                                <p id="noMatchAlert" class="hidden">Passwords Do Not Match!</p>
                                <p id="confirmPasswordAlert" class="hidden">Please Confirm Your Password!</p>
                            </div>
                            <div class="group">
                                <label for="email" class="label">Email  Address</label>
                                <input id="email" name="email" type="email" class="input">
                                <p id="emaillert" class="hidden">Invalid Email!</p>
                                <p id="emailEmptyAlert" class="hidden">Please Enter an Email!</p>
                            </div>
                            <div class="group">
                                <input type="submit" name="register_submit" class="button" value="Sign Up">
                            </div>
                            <div class="hr"></div>
                            <div class="foot-lnk">
                                <label for="tab-1">Already a Member?</a>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="scripts/js/validator.js"></script>
</body>
</html>