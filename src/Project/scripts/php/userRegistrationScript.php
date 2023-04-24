<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["pass1"]; // assuming pass1 is the name of the password field


// Sanitize form inputs
$fname = htmlspecialchars($fname);
$lname = htmlspecialchars($lname);
$email = htmlspecialchars($email);
$password = htmlspecialchars($password);

    // Hash the password using SHA256
    $hashedPassword = hash("sha256", $password);

    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "SneakerStyleX");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL statement to insert data into "users" table
    $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $lname, $email, $hashedPassword);

    if ($stmt->execute()) {
        session_start();
        $_SESSION['successRegister'] = true;
        header("Location: ../../login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
