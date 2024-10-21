<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLine Medical</title>
    <link rel="stylesheet" href="css/header.css">
    <link rel="icon" href="images/transperent.png">
</head>
<body>
    <header class="sticky">
        <div class="head-container">
            <div class="head-logo">
                <a href="index.php"><img src="images/transperent.png" alt="#"></a>
            </div>
            <nav class="navigation">
                <ul>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>><a href="index.php">Home</a></li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'aboutus.php') echo 'class="active"'; ?>><a href="aboutus.php">About</a></li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'services.php') echo 'class="active"'; ?>><a href="service.php">Services</a></li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'feedback.php') echo 'class="active"'; ?>><a href="feedback.php">Feedback</a></li>
                    <li <?php if(basename($_SERVER['PHP_SELF']) == 'contactus.php') echo 'class="active"'; ?>><a href="contactus.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="header-buttons">
                <a href="../loginin.php" class="button">Login</a>
                <a href="../Sign Up.php" class="button">Register</a>
            </div>
        </div>
    </header>
</body>
</html>
