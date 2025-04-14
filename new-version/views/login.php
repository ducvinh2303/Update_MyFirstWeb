<?php
include_once '../controller/userController.php';
$userController = new UserController();

// If you are logged in, you cannot access it
if (isset($_SESSION["user"])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Fallback location if HTTP_REFERER is not set
        header("Location: home"); // default to
    }
    exit;
}


// when method is POST || login action
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check validation parameters required
    if ($userController->validateRequestLogin($_POST)) {

        $userController->login($_POST); // handle login user
    }
}

// Error when sending account creation request to server
$error = "";
if (isset($_SESSION["error"])) {
    $error = $_SESSION["error"];
    unset($_SESSION["error"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <meta name="author" content="Kai Jun Wong">
    <meta name="author" content="Duc Vinh Vu">
    <meta name="author" content="Shawn Hatten">
    <title>Art Design Blog Member Login</title>
    <link rel="stylesheet" href="public/Styles/style.css">
</head>

<body>

    <!-- header -->
    <header>
        <nav class="navbar">
            <div class="container">
            <div style="position: relative;">
                    <img id="banner-image" class="banner-home" img src="public/images/banner-bg.jpg" alt="" />
                    <?php include 'components/search_form.php'; ?>
                </div>
                <h1>Blog Member login</h1>
                <?php include 'components/menu.php'; ?>
            </div>
        </nav>
    </header>

    <!-- end of header -->

    <!-- login -->
    <div class="wrapper">
        <form id="loginForm" novalidate action="login" method="POST">
            <h1>Login</h1>
            <div class="input-box">
                <div class="u_name">
                    <label for="u_name">Please enter your username:</label>
                    <input type="text" name="u_name" required>
                </div>

                <div class="password">
                    <label for="password">Please enter your password:</label>
                    <input type="password" name="password" required>
                </div>
            </div>
            <div id="error">
                <p><?php echo $error ?></p>
            </div>

            <div class="remember-forgot">
                <label><input type="checkbox" name="remember_login">Remember me</label>
                <a href="#">Forgot password</a>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account? <a href="register.php">Register</a></p>
            </div>

        </form>
        <script src="public/js/login_validation.js"></script>
    </div>

    <!-- end of Login -->

    <!-- footer -->
    <footer>
        <div class="footer">
            <p>Art Design Blog Page</p>
        </div>
    </footer>
    <!-- end of footer -->
</body>

</html>