<?php
// Include the local database connection file
// require_once '../config/dbcon.php';

// Include the server database connection file
// define("HOSTNAME", "localhost");
// define("USERNAME", "pspmuser");
// define("PASSWORD", "Pspm@2024");
// define("DATABASE", "pspm");

$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

// Check if the connection was successful
if (!$connection) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Define the data you want to insert
$campus = "AUS";
$name = "John";
$last_name = "Doe";
$gender = "Male";
$reg_no = "123456789";
$reg_date = "2022-2023";
$degree = "Master's in Computer Science"; // Escape single quotes in this value
$degree = mysqli_real_escape_string($connection, $degree);
$topic = "Artificial Intelligence";
$superviser = "Dr. Jane Smith";
$co_superviser = "Dr. Michael Johnson";

// Define the departments array
$departments = array(
    "Linguistics", "Bengali", "Hindi", "Manipuri", "Sanskrit", "Indian Comparative Literature", "Urdu", "English", "Arabic", "French", "Economics", "Commerce", "Political Science", "History", "Sociology", "Social Work", "Mass Communication", "Visual Arts", "Performing Arts", "Philosophy", "Physics", "Chemistry", "Mathematics", "Computer Science", "Statistics", "Central Instrumentation Laboratory (CIL)", "Life Science and Bio-informatics", "Microbiology", "Biotechnology", "Business Administration", "Hospitality and Tourism Management", "Ecology Environment Science", "Agricultural Engineering", "Computer Science and Engineering", "Electronics and Communication Engineering", "Applied Science & Humanities", "Pharmaceutical Science", "Earth Science", "Library & Information Science", "Law", "Educational Science"
);

// Loop through each department and insert data
foreach ($departments as $index => $department) {
    // Generate unique phone and email
    $phone = "9000000" . ($index + 1); // Example: 90000001, 90000002, etc.
    $email = "john.doe" . ($index + 1) . "@example.com"; // Example: john.doe1@example.com, john.doe2@example.com, etc.

    // Prepare and execute SQL query to insert data into the student_table
    $sql = "INSERT INTO student_table (name, last_name, gender, campus, phone, email, reg_no, reg_date, department, degree, topic, superviser, co_superviser)
            VALUES ('$name', '$last_name', '$gender', '$campus', '$phone', '$email', '$reg_no', '$reg_date', '$department', '$degree', '$topic', '$superviser', '$co_superviser')";

    if ($connection->query($sql) === TRUE) {
        // Prepare and execute SQL query to insert data into the document_table with empty file paths
        $sql = "INSERT INTO document_table (reg_no, profile_image, idFront, idBack)
                VALUES ('$reg_no', '', '', '')";

        if ($connection->query($sql) === TRUE) {
            echo "New record created successfully for department: $department<br>";
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
        }
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

// Close the database connection
$connection->close();
