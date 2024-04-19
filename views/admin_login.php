<?php
// Start the session
session_start();

// Check if the admin is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Redirect to the admin dashboard or another page
    header('Location: home.php');
    exit;
}
include("../views/header.php");

?>

<div class="wrapper">
    <div class="content">
        <div class="d-flex vh-100 align-items-center justify-content-center">
            <div class="col-12 col-md-3 bg-light p-5 rounded-3 centered">
                <h1 class="text-center">Admin Login</h1>
                <form action="process_login.php" method="post">
                    <div class="">
                        <label for="username">Username:</label>
                        <input class="form-control" type="text" id="username" name="username" required><br><br>
                    </div>

                    <div class="">
                        <label for="password">Password:</label>
                        <input class="form-control" type="password" id="password" name="password" required><br><br>
                    </div>
                    <?php
                    // Display error message if provided
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                        echo "<p style='color: red; text-align: center;'>$error</p>";
                    }
                    ?>
                    <div class="">
                        <input class="btn btn-primary w-100" type="submit" value="Login">

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include("../views/footer.php");
?>

</html>