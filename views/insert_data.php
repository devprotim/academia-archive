<?php
if (isset($_POST['add_students'])) {
    // Retrieve form data
    // $id = $_POST['id'];
    $student_id = $_POST['student_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $discipline = $_POST['discipline'];
    $topic = $_POST['topic'];
    $superviser = $_POST['superviser'];
    $co_superviser = $_POST['co_superviser'];
    $email = $_POST['email'];

    // Here you can perform validation on the form data

    // Connect to the database (replace placeholders with your actual database credentials)
    $conn = new mysqli("localhost", "root", "", "academia-archive");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute SQL query to insert data into the database
    $sql = "INSERT INTO students ( student_id, first_name, last_name, discipline, topic, superviser, co_superviser, email) 
            VALUES ( '$student_id', '$first_name', '$last_name', '$discipline', '$topic', '$superviser', '$co_superviser', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close database connection
    $conn->close();
}
