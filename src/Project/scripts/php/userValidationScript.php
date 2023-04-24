<?php
// userValidationScript.php
session_destroy();
// Connect to the database
$conn = new mysqli("localhost", "root", "", "SneakerStyleX");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$email = $_POST["email"];
$password = $_POST["password"];

// Perform form validation
if (empty($email) || empty($password)) {
    die("Email and password are required");
}

// Hash the password to match with the stored password in the database
$hashedPassword = hash("sha256", $password);

// Prepare and execute SQL query
$stmt = $conn->prepare("SELECT * FROM users WHERE email=? AND password=?");
$stmt->bind_param("ss", $email, $hashedPassword);
$stmt->execute();
$result = $stmt->get_result();

// Check if the user exists in the database
if ($result->num_rows == 1) {
    // Forward the user to home.php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    session_start();
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

$stmt->close();
$conn->close();
?>
