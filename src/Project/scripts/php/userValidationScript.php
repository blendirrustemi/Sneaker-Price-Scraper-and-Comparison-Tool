<?php
require_once '../../../../bootstrap.php';
global $userService;

// Retrieve form data
$email = $_POST["email"];
$password = $_POST["password"];

// Perform form validation
if (empty($email) || empty($password)) {
    die("Email and password are required");
}

// Hash the password to match with the stored password in the database
$hashedPassword = hash("sha256", $password);

$result = $userService->getUserByEmailAndPassword($email, $hashedPassword);

if ($result) {
    // Forward the user to home.php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
    $_SESSION['user_id'] = $result['user_id'];
    $_SESSION['email'] = $email;
    header("Location: ../../home.php");
    exit();
} else {
    // Invalid email or password, display an error message
    session_start();
    $_SESSION['failLogin'] = true;
    header("Location: ../../login.php");
    exit();
}

?>
