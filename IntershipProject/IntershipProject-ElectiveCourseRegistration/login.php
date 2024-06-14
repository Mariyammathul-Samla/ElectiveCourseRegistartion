<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://kit.fontawesome.com/34bc0b667c.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="login-container">
        <nav>
            <a href="index.php"><img src="images/logoSdm.png" alt="sdm"></a>
            <label class="label">SDMIT</label>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="courses.php">Course</a></li>
                    <li><a href="seats.php">Seats</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
     <div class="form-box">
            <h1 id="title">Login</h1>

            <div class="type-field">
                <h3 id="student">Student</h3>
                <h3 id="admin" class="disable">Admin</h3>
            </div>
            <h4 id="error-message">
                <?php
                error_reporting(0);
                session_start();
                session_destroy();
                echo $_SESSION['loginMessage'];
                ?>
            </h4>
            <form action="login_check.php" method="POST">
                <input type="hidden" id="selectedRole" name="selectedRole" value="student">

                <div class="input-group">
                    <div class="input-field" id="nameField">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" placeholder="Enter USN" name="username" id="uname" required>
                    </div>
                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input name="password" placeholder="Enter password" type="password" required>
                    </div>
                </div>
                <div class="btn-field" id="buttonContainer">
                    <button type="submit" name="submit" value="Login" class="hero-btn red-btn btn" id="loginButton">Login As Student</button>
                </div>
            </form>
        </div>
    </div>
    <script src="login.js"></script>
</body>
</html>