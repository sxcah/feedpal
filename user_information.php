<?php
session_start();

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    if (empty($fname) || empty($lname) || empty($email)){
        $error_message = "Missing Field.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error_message = "Invalid email format.";
    } else {
        $stmt = $conn->prepare("INSERT INTO user_information(first_name, last_name, email) VALUES(?,?,?)");
        if ($stmt) {
            $stmt->bind_param("sss", $fname, $lname, $email);
            
            if ($stmt->execute()) {
                header('Location: create-account.php');
                exit();
            } else {
                echo "ERROR STATEMENT: ". $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error: ". $stmt->error;
        }
    }
    $conn->close();

    $_SESSION['error_message'] = $error_message;
    header('Location: register.php');
    exit();
}
?>