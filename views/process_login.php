<?php
// Start the session
session_start();

// Include the database connection file
require_once '../config/dbcon.php';

// Check if connection was successful
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Get the username and password from the form (sanitize inputs)
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

echo "Username: $username<br>";
echo "Password: $password<br>";

// Query the admins table to check if the provided credentials match
$sql = "SELECT * FROM admins WHERE username = '$username'";
$result = mysqli_query($connection, $sql);

// Check if query was successful
if (!$result) {
    die("Query Failed: " . mysqli_error($connection));
}

// Check if username exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Login successful, store the admin's information in the session
        $_SESSION['loggedin'] = true;
        $_SESSION['admin_id'] = $row['id'];
        $_SESSION['admin_username'] = $row['username'];
        $_SESSION['admin_email'] = $row['email'];

        // Redirect to the admin dashboard or another page
        header('Location: home.php');
        exit;
    } else {
        // Invalid password
        $error = "Invalid username or password";
        header("Location: admin_login.php?error=" . urlencode($error));
        exit;
    }
} else {
    // Invalid username
    $error = "Invalid username or password";
    header("Location: admin_login.php?error=" . urlencode($error));
    exit;
}

// Close the database connection
mysqli_close($connection);
?>
