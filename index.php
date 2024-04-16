<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Archive</title>
    <!-- <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <style>
        .wrapper {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }
    </style>
</head>

<?php
// include("../academia-archive/views/header.php");


?>

<body>
    <div class="wrapper">
        <div class="content">
            <div class="container my-5">
                <div class="jumbotron bg-light p-5 rounded-3">
                    <h1 class="display-4">Welcome to the Academia Archive</h1>
                    <p class="lead">This application helps you manage data for PhD students.</p>
                    <hr class="my-4">
                    <p>Click the buttons below to get started:</p>
                    <a class="btn btn-primary btn-lg" href="/academia-archive/views/add_students.php" role="button">Add as Student</a>
                    <a class="btn btn-success btn-lg" href="/academia-archive/views/home.php" role="button">Login as Admin</a>
                </div>
            </div>
        </div>
    </div>
</body>

<?php
include("../academia-archive/views/footer.php");
?>

</html>