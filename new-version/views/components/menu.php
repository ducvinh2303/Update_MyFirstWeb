<?php
include_once '../controller/roleController.php';
include_once '../controller/userController.php';
$userController = new UserController();
$roles = new RoleController();
$authcheck = $roles->isLogged(); // check is logged in

// when method is POST || logout action
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // check validation parameters required
    if (isset($_POST['action']) && $_POST['action'] === 'logout') {

        $userController->logout(); // logout user
    }
}

?>


<ul class="menu">
    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/home") !== false) ? "active" : "" ?>">
        <a href="home">Home</a>
    </li>
    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/archive") !== false) ? "active" : "" ?>">
        <a href="archive">Archive</a>
    </li>
    <?php
    if (!$authcheck) {
    ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/login") !== false) ? "active" : "" ?>">
            <a href="login">Login</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/register") !== false) ? "active" : "" ?>">
            <a href="register">Register</a>
        </li>
    <?php
    }
    ?>
    <?php
    if ($authcheck) {
        $name = $_SESSION["user"]["name"];
    ?>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/create") !== false) ? "active" : "" ?>">
            <a href="create">Create</a>
        </li>
    <?php
    }
    ?>
    <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], "/about") !== false) ? "active" : "" ?>">
        <a href="about">About</a>
    </li>
    <?php
    if ($authcheck) {
        $name = $_SESSION["user"]["name"];
    ?>
        <li>
            <form id="logoutForm" action="#" method="POST">
                <input hidden type="text" name="action" value="logout">
                <a id="logoutButton" role="button" href="#">Logout</a>
            </form>
        </li>
        <script>
            document.getElementById('logoutButton').addEventListener('click', function() {
                document.getElementById('logoutForm').submit();
            });
        </script>

        <li style="margin-left: auto;">
            Hello! <?php echo $name ?>
        </li>
    <?php
    }
    ?>
</ul>