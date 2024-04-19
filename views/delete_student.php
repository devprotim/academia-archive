<?php
// Include the database connection file
include("../config/dbcon.php");

// Check if the reg_no parameter is provided
if (isset($_POST['reg_no'])) {
    $reg_no = $_POST['reg_no'];

    // Delete the record from the document_table
    $deleteDocumentQuery = "DELETE FROM document_table WHERE reg_no = '$reg_no'";
    $result = mysqli_query($connection, $deleteDocumentQuery);

    if ($result) {
        // If the record is deleted from document_table, delete from student_table
        $deleteStudentQuery = "DELETE FROM student_table WHERE reg_no = '$reg_no'";
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
