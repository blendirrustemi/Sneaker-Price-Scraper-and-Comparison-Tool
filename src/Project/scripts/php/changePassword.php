<?php
session_start();

require_once '../../../../bootstrap.php';
global $userService;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $old_password = $_POST["oldPass"];
    $new_password = $_POST["newPass"];
    $confirm_password = $_POST["confirmNewPass"];

    $user = $userService->getUserByEmail($email);
    $userId = $user['user_id'];

    $hashedOldPassword = hash("sha256", $old_password);
    $hashedNewPassword = hash("sha256", $new_password);


    if ($hashedOldPassword === $user['password']) {
        $changed_password = $userService->updateUserPassword($userId, $hashedNewPassword);
        $_SESSION['successChange'] = true;
        header("Location: ../../profile.php");
    } else {
        $_SESSION['failChange'] = true;
        header("Location: ../../profile.php");
    }
}

?>