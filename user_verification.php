<?php
session_start();

include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "Missing Fields.";
    } else {
        $stmt = $conn->prepare("SELECT user_account.user_id, user_account.password, user_information.first_name, user_information.last_name, user_information.email FROM user_account JOIN user_information ON user_account.user_id = user_information.user_id WHERE user_account.username = ?");

        if ($stmt){
            $stmt->bind_param('s', $username);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0){
                $stmt->bind_result($user_id, $hashed_password, $fname, $lname, $email);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['first_name'] = $fname;
                    $_SESSION['last_name'] = $lname;
                    $_SESSION['email'] = $email;
                    header("Location: home.php");
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