<?php
// Start the session
session_start();

// Include the database connection file
require_once '../config/dbcon.php';

// Check if connection was successful
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Get the username and password from the form
$username = $_POST['username'];
$password = $_POST['password'];

// Query the admins table to check if the provided credentials match
$sql = "SELECT * FROM admin_table WHERE username = '$username'";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verify the password
    // if (password_verify($password, $row['password'])) {
    // Login successful, store the admin's information in the session
    $_SESSION['loggedin'] = true;
    $_SESSION['admin_id'] = $row['id'];
    $_SESSION['admin_username'] = $row['username'];
    $_SESSION['admin_email'] = $row['email'];

    // Redirect to the admin dashboard or another page
    header('Location: home.php');
    // exit;
    // } else {
    //     // Invalid password
    //     $error = "Invalid username or password";
    //     header("Location: login.php?error=" . urlencode($error));
    //     exit;
    // }
} else {
    // Invalid username
    $error = "Invalid username or password";
    header("Location: admin_login.php?error=" . urlencode($error));
    exit;
}

// Close the database connection
$connection->close();
