<?php
include("../config/dbcon.php");

// Check connection
if ($connection->connect_error) {
    $response = array("error" => "Connection failed: " . $connection->connect_error);
    echo json_encode($response);
    exit;
}

// Get the phone number from the AJAX request
$phone = $_GET["phone"];

// Prepare and execute the SQL query
$stmt = $connection->prepare("SELECT COUNT(*) FROM student_table WHERE phone = ?");
$stmt->bind_param("s", $phone);
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
