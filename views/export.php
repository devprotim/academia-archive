<?php
function exportToHTML($data)
{
    $html = '<div class="wrapper">';
    $html .= '<div class="content">';
    $html .= '<table class="table table-hover table-bordered table-striped container">';
    $html .= '<thead>';
    $html .= '<tr>';
    $html .= '<th>Sr. No.</th>';
    $html .= '<th>Profile Image</th>';
    $html .= '<th>ID Back</th>';
    $html .= '<th>ID Front</th>';
    $html .= '<th>Campus</th>';
    $html .= '<th>Name</th>';
    $html .= '<th>Last Name</th>';
    $html .= '<th>Gender</th>';
    $html .= '<th>Email</th>';
    $html .= '<th>Reg. No.</th>';
    $html .= '<th>Reg. Date</th>';
    $html .= '<th>Department</th>';
    $html .= '<th>Topic</th>';
    $html .= '<th>Supervisor</th>';
    $html .= '<th>Co-Supervisor</th>';
    $html .= '</tr>';
    $html .= '</thead>';
    $html .= '<tbody>';

    foreach ($data as $row) {
        $html .= '<tr>';
        $html .= '<td>' . $row['sr_no'] . '</td>';
        $html .= '<td>';
        $html .= (!empty($row['profile_image'])) ? '<img src="' . $row['profile_image'] . '" alt="Profile Image" width="50">' : 'No Image';
        $html .= '</td>';
        $html .= '<td>';
        $html .= (!empty($row['idBack'])) ? '<img src="' . $row['idBack'] . '" alt="ID Back" width="50">' : 'No Image';
        $html .= '</td>';
        $html .= '<td>';
        $html .= (!empty($row['idFront'])) ? '<img src="' . $row['idFront'] . '" alt="ID Front" width="50">' : 'No Image';
        $html .= '</td>';
        $html .= '<td>' . $row['campus'] . '</td>';
        $html .= '<td>' . $row['name'] . '</td>';
        $html .= '<td>' . $row['last_name'] . '</td>';
        $html .= '<td>' . $row['gender'] . '</td>';
        $html .= '<td>' . $row['email'] . '</td>';
        $html .= '<td>' . $row['reg_no'] . '</td>';
        $html .= '<td>' . $row['reg_date'] . '</td>';
        $html .= '<td>' . $row['department'] . '</td>';
        $html .= '<td>' . $row['topic'] . '</td>';
        $html .= '<td>' . $row['superviser'] . '</td>';
        $html .= '<td>' . $row['co_superviser'] . '</td>';
        $html .= '</tr>';
    }

    $html .= '</tbody>';
    $html .= '</table>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}
include("../config/dbcon.php");
// Fetch data from the database
$query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
          FROM student_table st
          LEFT JOIN document_table dt ON st.reg_no = dt.reg_no";
$result = mysqli_query($connection, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Export data to HTML format
$htmlContent = exportToHTML($data);

// Output the HTML content
echo $htmlContent;
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["html_content"])) {
    // Get the HTML content from the POST data
    $htmlContent = $_POST["html_content"];

    // Set headers for file download
    header('Content-Type: text/html');
    header('Content-Disposition: attachment; filename="exported_data.html"');

    // Output the HTML content
    echo $htmlContent;
    exit; // Terminate script execution after sending the file
} else {
    // Handle invalid or missing POST data
    header("HTTP/1.1 400 Bad Request");
    echo "Invalid request";
    exit;
}
