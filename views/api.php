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

function fetchData($department = null, $campus = null, $pageNum = 1, $resultsPerPage = 5)
{
    global $connection;
    $baseUrl = 'https://www.localhost/pspm/';

    // Base query for counting and fetching
    $baseQuery = "FROM student_table st
                  LEFT JOIN document_table dt ON st.reg_no = dt.reg_no
                  WHERE st.is_approved = 1";

    // Add the department filter if provided
    if ($department !== null) {
        $baseQuery .= " AND st.department = '$department'";
    }

    // Add the campus filter if provided
    if ($campus !== null) {
        $baseQuery .= " AND st.campus = '$campus'";
    }

    // Query to count total records
    $countQuery = "SELECT COUNT(*) as total " . $baseQuery;
    $countResult = $connection->query($countQuery);
    $totalCount = $countResult->fetch_assoc()['total'];

    // Calculate offset for pagination
    $offset = ($pageNum - 1) * $resultsPerPage;

    // Query to fetch data with pagination
    $fetchQuery = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront " . $baseQuery;
    $fetchQuery .= " LIMIT $resultsPerPage OFFSET $offset";

    $result = $connection->query($fetchQuery);
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

    // Calculate result count
    $resultCount = count($data);
    $result_limit = 5;

    // Return data as JSON including total count and result count
    header('Content-Type: application/json');
    echo json_encode(array("total_count" => $totalCount, "result_count" => $resultCount, "result_limit" => $result_limit,  "data" => $data));
}

// Handle API requests
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action']) && $_GET['action'] === 'fetchData') {
        $department = isset($_GET['department']) ? $_GET['department'] : null;
        $campus = isset($_GET['campus']) ? $_GET['campus'] : null;
        $pageNum = isset($_GET['pageNum']) ? intval($_GET['pageNum']) : 1;  // Default to 1 if not provided
        $resultsPerPage = isset($_GET['resultsPerPage']) ? intval($_GET['resultsPerPage']) : 5;  // Default to 5 if not provided
        fetchData($department, $campus, $pageNum, $resultsPerPage);
    } else {
        http_response_code(404);
        echo json_encode(array("message" => "Endpoint not found"));
    }
} else {
    http_response_code(405);
    echo json_encode(array("message" => "Method not allowed"));
}

$connection->close();
