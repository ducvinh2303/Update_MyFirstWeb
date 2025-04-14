<?php
include_once '../controller/blogController.php';
$blogController = new BlogController();

// If you are logged in, you can access it
if (!isset($_SESSION["user"])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    } else {
        // Fallback location if HTTP_REFERER is not set
        header("Location: home"); // default to
    }
    exit;
}

// when method is POST || create new blog
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check validation parameters required
    if (1) {

        // $blogController->createBlog($_POST); // handle create blog request
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
    <title>Art Design Create Blog</title>
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
                <h1>Blog create</h1>
                <?php include 'components/menu.php'; ?>
            </div>
        </nav>
    </header>

    <!-- end of header -->

    <!-- Blog create -->
    <div class="blog-new">
        <form id="createForm" novalidate action="home.php">
            <h1>New Blog </h1>
            <div class="input-field">
                <label>The post's title:</label>
                <input type="text" required>
            </div>

            <div class="input-field">
                <label>Tags/keywords:</label>
                <input type="text" required>
            </div>

            <div class="input-field">
                <label>Content:</label>
                <textarea type="text" rows="5" required></textarea>
            </div>

            <div id="error">
                <p></p>
            </div>

            <div class="form-button">
                <button type="submit" class="btn">Create</button>
                <button type="button" onclick="resetForm()">Reset</button>
            </div>
        </form>
        <script src="public/js/create_post_validation.js"></script>
        <!-- end of Blog create -->

        <!-- footer -->
        <footer>
            <div class="footer">
                <p>Art Design Blog Page</p>
            </div>
        </footer>
        <!-- end of footer -->
    </div>
</body>

</html>