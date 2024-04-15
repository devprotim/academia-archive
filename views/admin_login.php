<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <h1>Admin Login</h1>
    <?php
    // Display error message if provided
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p style='color: red;'>$error</p>";
        
    }
   

    ?>
    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Login">
    </form>
</body>
</html>