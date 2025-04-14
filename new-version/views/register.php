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

// when method is POST || create new user
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check validation parameters required
    if ($userController->validateRequestCretaeUser($_POST)) {

        $userController->createUser($_POST); // handle create user
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
    <title>Art Design Blog Member Register</title>
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
                <h1>Blog Member Register</h1>
                <?php include 'components/menu.php'; ?>
            </div>
        </nav>
    </header>

    <!-- end of header -->

    <!-- Register -->
    <div class="wrapper">
        <form id="registrationForm" novalidate action="register" method="POST">
            <h1> Registration</h1>
            <div class="input-box">
                <div class="f_name">
                    <label for="f_name">Please enter your first name:</label>
                    <input type="text" name="f_name" value="<?= htmlspecialchars($_POST['f_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="u_name">
                    <label for="u_name">Please enter your username:</label>
                    <input type="text" name="u_name" value="<?= htmlspecialchars($_POST['u_name'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="email">
                    <label for="email">Please enter your email:</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="password">
                    <label for="password">Please enter your password:</label>
                    <input type="password" name="password" value="<?= htmlspecialchars($_POST['password'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                </div>

                <div class="c_password">
                    <label for="c_password">Please confirm password again:</label>
                    <input type="password" name="c_password" required>
                </div>
            </div>

            <label><input type="checkbox" name="checkbox">I hereby declare that the above information provided is true and
                correct</label>
            <div id="error">
                <p><?php echo $error ?></p>
            </div>
            <script src="public/js/registration_validation.js"></script>
            <div class="form-button">
                <button type="submit" class="btn">Register</button>
                <button type="button" onclick="resetForm()">Reset</button>
            </div>
        </form>
    </div>

    <!-- end of Register -->

    <!-- footer -->
    <footer>
        <div class="footer">
            <p>Art Design Blog Page</p>
        </div>
    </footer>
    <!-- end of footer -->
</body>

</html>