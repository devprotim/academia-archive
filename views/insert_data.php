<?php
if (isset($_POST['add_students'])) {
    // Retrieve form data
    // $sr_no = $_POST['sr_no'];

    $campus = $_POST['campus'];
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $reg_no = $_POST['reg_no'];
    $reg_date = $_POST['reg_date'];
    $department = $_POST['department'];
    $topic = $_POST['topic'];
    $superviser = $_POST['superviser'];
    $co_superviser = $_POST['co_superviser'];


    // Connect to the database
    $conn = new mysqli("localhost", "root", "", "academia-archive");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert data into the student_table
    $sql = "INSERT INTO student_table (campus, name, last_name, gender, email, reg_no, reg_date, department, topic, superviser, co_superviser)
            VALUES ( '$campus', '$name', '$last_name',  '$gender', '$email', '$reg_no', '$reg_date', '$department', '$topic', '$superviser', '$co_superviser' )";

    if ($conn->query($sql) === TRUE) {
        // File upload handling
        $profile_image = $_FILES['profile_image'];
        $idFront = $_FILES['idFront'];
        $idBack = $_FILES['idBack'];

        // Check if files were actually uploaded
        if (!empty($profile_image['tmp_name']) || !empty($idFront['tmp_name']) || !empty($idBack['tmp_name'])) {
            // Process and move uploaded files
            $profile_image_path = processUploadedFile($profile_image, '../uploads/profile_images/');
            $idFront_path = processUploadedFile($idFront, '../uploads/id_front_images/');
            $idBack_path = processUploadedFile($idBack, '../uploads/id_back_images/');

            // Prepare and execute SQL query to insert data into the document_table
            $sql = "INSERT INTO document_table (reg_no, profile_image, idFront, idBack)
                    VALUES ('$reg_no', '$profile_image_path', '$idFront_path', '$idBack_path')";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully with uploaded files";
                $msg = "New record created successfully with uploaded files";
                header("Location: add_students.php?error=" . urlencode($msg));
            } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
                $msg = "Error: " . $sql . "<br>" . $conn->error;
                header("Location: add_students.php?error=" . urlencode($msg));
            }
        } else {
            // Prepare and execute SQL query to insert data into the document_table with empty file paths
            $sql = "INSERT INTO document_table (reg_no, profile_image, idFront, idBack)
                    VALUES ('$reg_no', '', '', '')";

            if ($conn->query($sql) === TRUE) {
                $msg = "New record created successfully with uploaded files";
                header("Location: add_students.php?error=" . urlencode($msg));
            } else {
                $msg = "Error: " . $sql . "<br>" . $conn->error;
                header("Location: add_students.php?error=" . urlencode($msg));
            }
        }
    } else {
        $msg = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: add_students.php?error=" . urlencode($msg));
    }

    // Close database connection
    $conn->close();
}

function processUploadedFile($file, $upload_dir)
{
    // Check if the file was actually uploaded
    if ($file['error'] == UPLOAD_ERR_OK) {
        // Get the file extension
        $file_ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

        // Generate a unique file name
        $file_name = uniqid('', true) . '.' . $file_ext;

        // Check if the file type is allowed
        $allowed = array("jpg", "jpeg", "png", "gif");
        if (in_array($file_ext, $allowed)) {
            // Move the uploaded file to the desired directory
            $upload_path = $upload_dir . $file_name;
            if (move_uploaded_file($file['tmp_name'], $upload_path)) {
                return $upload_path;
            } else {
                echo "Error uploading file";
                return '';
            }
        } else {
            echo "Error: Unsupported file type";
            return '';
        }
    } else {
        echo "Error uploading file: " . $file['error'];
        return '';
    }
}
