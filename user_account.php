<?php
session_start();

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($username)) {
        $error_message = "Enter USERNAME!";
    } elseif (empty($password) || empty($confirm_password)) {
        $error_message = "Fill out PASSWORD FIELDS!";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $username)) {
        $error_message = "Username can only contain 0-9/A-Z/_";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO user_account (username, password) VALUES (?, ?)");

        if ($stmt) {
            $stmt->bind_param("ss", $username, $hashed_password);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                echo "STATEMENT ERROR: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
        $conn->close();
    }
    $_SESSION['error_message'] = $error_message;
    header('Location: create-account.php');
    exit();
}
?>