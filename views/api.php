<?php
require_once '../config/dbcon.php';

// Check if connection was successful
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Function to fetch data
function fetchData()
{
    global $connection;

    // Perform query to fetch data
    $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
              FROM student_table st
              LEFT JOIN document_table dt ON st.reg_no = dt.reg_no";

    $result = $connection->query($query);

    $data = array();

    // Fetch data and store in array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check for endpoint
    if ($_GET['action'] === 'fetchData') {
        fetchData();
    } else {
        // Handle other endpoints if needed
        http_response_code(404);
        echo json_encode(array("message" => "Endpoint not found"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed"));
}
