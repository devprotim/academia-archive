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

function fetchData($department = null)
{
    global $connection;
    $baseUrl = 'https://www.localhost/pspm/';

    // Build the query
    $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
              FROM student_table st
              LEFT JOIN document_table dt ON st.reg_no = dt.reg_no
              WHERE st.is_approved = 1";

    // Add the department filter if provided
    if ($department !== null) {
        $query .= " AND st.department = '$department'";
    }

    $result = $connection->query($query);
    $data = array();

    // Fetch data and store in array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Append base URL to image paths
            $row['profile_image'] = $baseUrl . str_replace('../', '', $row['profile_image']);
            $row['idBack'] = $baseUrl . str_replace('../', '', $row['idBack']);
            $row['idFront'] = $baseUrl . str_replace('../', '', $row['idFront']);
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
    if (isset($_GET['action']) && $_GET['action'] === 'fetchData') {
        $department = isset($_GET['department']) ? $_GET['department'] : null;
        fetchData($department);
    } else {
        // Handle other endpoints if needed
        http_response_code(404);
        echo json_encode(array("message" => "Endpoint not found"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed"));
}

$connection->close();
