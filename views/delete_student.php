<?php
// Include the database connection file
include("../config/dbcon.php");

// Check if the student_id parameter is provided
if (isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    // Delete the record from the document_table
    $deleteDocumentQuery = "DELETE FROM document_table WHERE student_id = '$studentId'";
    $result = mysqli_query($connection, $deleteDocumentQuery);

    if ($result) {
        // If the record is deleted from document_table, delete from student_table
        $deleteStudentQuery = "DELETE FROM student_table WHERE student_id = '$studentId'";
        $result = mysqli_query($connection, $deleteStudentQuery);

        if ($result) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record from student_table: " . mysqli_error($connection);
        }
    } else {
        echo "Error deleting record from document_table: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request";
}
