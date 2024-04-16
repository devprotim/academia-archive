<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Academia Archive</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">


                <!-- <li class="nav-item">
                        <a class="nav-link" href="/views/index.php">View Students</a>
                    </li> -->

                <?php
                session_start();
                $is_logged_in = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
                if ($is_logged_in) {
                    echo '<li class="nav-item">
                    <a class="nav-link" href="add_students.php">Add Student</a>
                </li>';
                    echo '<li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>';
                    echo '<li class="nav-item"><a class="nav-link" href="/academia-archive/views/logout.php">Logout</a></li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<script src="../node_modules/jquery/dist/jquery.min.js"></script>
<script src="../node_modules/@popperjs/core/dist/umd/popper.min.js"></script>
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

<body>