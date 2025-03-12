<?php
session_start();

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Missing Fields.";
    } else {
        $stmt = $conn->prepare("SELECT user_id, password FROM user_account WHERE username = ?");

        if ($stmt){
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0){
                $stmt->bind_result($user_id, $hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    header("Location: index.html");
                    exit();
                } else {
                    echo "WRONG PASSWORD.";
                }
            } else {
                echo "USER NOT FOUND.";
            }

            $stmt->close();
        } else {
            echo "STATEMENT ERROR: ". $stmt->error;
        }
    }
    $conn->close();
}
?>