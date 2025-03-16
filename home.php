<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        include 'db_connect.php';
        $stmt = $conn->prepare("SELECT email FROM user_information WHERE user_id = ?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->fetch();
        $stmt->close();
        $conn->close();
        if(!$email){
            $email = "Email not found.";
        }
    }

} else {
    $username = 'Guest';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <nav><a href="index.html">FEEDPAL</a></nav>
        <div class="main-wrapper">
            <div class="main-content">
                <div class="container">
                    <div class="header">Welcome to FeedPal, <?php echo htmlspecialchars($username); ?></div>
                    <div class="user-info">
                        <?php 
                            if (isset($email) && $email != '') { 
                                echo htmlspecialchars($email);
                            } 
                        ?>
                    </div>
                    <div class="links">
                        <?php if (isset($_SESSION['username'])): ?>
                            <p><a href="logout.php">LOGOUT</a></p>
                        <?php else: ?>
                            <a href="login.php">LOGIN</a>
                            <a href="register.php">REGISTER</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <footer>&COPY; FEEDPAL 2025</footer>
    </div>
</body>
</html>