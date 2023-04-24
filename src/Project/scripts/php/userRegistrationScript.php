<?php
require_once '../../../../bootstrap.php';
global $userService;


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["pass1"]; // assuming pass1 is the name of the password field

    $users = $userService->getUserByEmail($email);

    // Sanitize form inputs
    $fname = htmlspecialchars($fname);
    $lname = htmlspecialchars($lname);
    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    // Hash the password using SHA256
    $hashedPassword = hash("sha256", $password);


       if ($userService->addUser($fname, $lname, $email, $hashedPassword)) {
            session_start();
            $_SESSION['successRegister'] = true;
            header("Location: ../../login.php");
        } else {
            echo "Error!";
   }

}
?>
