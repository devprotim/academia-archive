<?php
// Include the database connection file
include("../config/dbcon.php");

// Check if the student_id parameter is provided
if (isset($_POST['reg_no'])) {
    $reg_no = $_POST['reg_no'];

    // Update the record in the student_table
    $updateQuery = "UPDATE student_table SET is_approved = 1, approved_on = CURDATE() WHERE reg_no = '$reg_no'";
    $result = mysqli_query($connection, $updateQuery);

    if ($result) {
        // echo "Record updated successfully";

        /*For popup window and to redirect to xxxx page*/
        echo   '<script type="text/javascript"> 
            alert("Approved!!!"); 
            
            </script>';
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
} else {
    echo "Invalid request";
}
