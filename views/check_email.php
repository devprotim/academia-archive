<?php
include("../config/dbcon.php");

// Check connection
if ($connection->connect_error) {
    $response = array("error" => "Connection failed: " . $connection->connect_error);
    echo json_encode($response);
    exit;
}

// Get the email from the AJAX request
$email = $_GET["email"];

// Prepare and execute the SQL query
$stmt = $connection->prepare("SELECT COUNT(*) FROM student_table WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($count);
$stmt->fetch();
$stmt->close();

// Wrap the response in a JSON object
$response = array("exists" => $count > 0);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
$connection->close();
