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
                    
                    <form action="user_information.php" method="POST">
                        <p>REGISTER</p>

                        <div class="input-group">
                            <label>First Name</label>
                            <input type="text" class="text-field" name="fname" placeholder="fname">
                        </div>

                        <div class="input-group">
                            <label>Last Name</label>
                            <input type="text" class="text-field" name="lname" placeholder="lname">
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <input type="email" class="text-field" name="email" placeholder="email">
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
                            <p><a href="create-account.html">CREATE-ACCOUNT</a></p> <!--REMOVE IN PROD-->
                        </div>

                        <input type="submit" class="btn" value="REGISTER">
                    </form>

                </div>
            </div>
        </div>
        <footer>&COPY; FEEDPAL 2025</footer>
    </div>
</body>
</html>