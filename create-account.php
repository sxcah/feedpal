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
                <div class="form-container">
                    
                    <form action="user_account.php" method="POST">
                        <p>CREATE-ACCOUNT</p>

                        <div class="input-group">
                            <label>Username</label>
                            <input type="text" class="text-field" name="username" placeholder="username">
                        </div>

                        <div class="input-group">
                            <label>Password</label>
                            <input type="password" class="text-field" name="password" placeholder="password">
                        </div>

                        <div class="input-group">
                            <label>Confirm-password</label>
                            <input type="password" class="text-field" name="confirm_password" placeholder="confirm-password">
                        </div>

                        <?php 
                        session_start();
                        if (isset($_SESSION['error_message'])): ?>
                            <div class="error">
                                <?php
                                if (isset($_SESSION['error_message'])) {
                                    echo htmlspecialchars($_SESSION['error_message']); 
                                    unset($_SESSION['error_message']); 
                                }
                                ?>
                            </div>
                        <?php endif; ?>

                        <div class="links">
                            <p>Already have an account? <a href="login.php">LOGIN</a></p>
                        </div>

                        <input type="submit" class="btn" value="SIGN UP">
                    </form>

                </div>
            </div>
        </div>
        <footer>&COPY; FEEDPAL 2025</footer>
    </div>
</body>
</html>