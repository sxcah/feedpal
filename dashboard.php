<?php
session_start();

if (isset($_SESSION['username'])){
    $username = $_SESSION['username'];
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
        <div class="nav-wrapper">
            <nav>
                <a class="title" href="index.html">FEEDPAL</a>
                <div class="nav-links">
                    <div class="nav-links-content">
                        <p class="user"><?php echo htmlspecialchars($username); ?></p>
                        <?php if (isset($_SESSION['username'])): ?>
                            <p><a href="logout.php">LOGOUT</a></p>
                        <?php else: ?>
                            <p><a href="login.php">LOGIN</a> <a href="register.php">REGISTER</a></p>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
        <div class="main-wrapper">
            <div class="main-content">

            <div class="feature-wrapper">
                    <p class="header">FEATURE</p>
                    <div class="feature-container">

                        <div class="product-container">
                            <div class="img-container">
                                <img src="sample.png" alt="IMG">
                            </div>
                            <div class="input-group">
                                <p>Anime Waifu - $999.99</p>
                                <input type="button" value="ADD TO CART">
                            </div>
                            <div class="text-box">
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                    Non perferendis omnis praesentium repudiandae impedit esse aliquam sequi molestiae autem sed velit dignissimos eveniet, 
                                    aliquid commodi eos blanditiis cum delectus corporis.</p>
                            </div>
                        </div>
                       
                    </div>
                </div>
                
            </div>
        </div>
        <footer>
            <p>&COPY; FEEDPAL 2025</p>
            <p><a href="about-me.html">ABOUT ME</a></p>
        </footer>
    </div>
</body>
</html>