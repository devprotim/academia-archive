<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
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

<body>
    <div class="wrapper">
        <div class="content">
            <?php
            include("../views/header.php");
            include("../config/dbcon.php");
            ?>

            <h3 class="text-center">Student Data Form</h3>

            <form id="studentForm" action="insert_data.php" method="post">

                <div class="">
                    <div class="row">
                        <!-- <div class="col-md-6">
                            <div class="mb-3">
                                <label for="id" class="form-label">ID</label>
                                <input type="text" class="form-control" id="id" name="id">
                            </div>
                        </div> -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="student_id" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="student_id" name="student_id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="discipline" class="form-label">Discipline</label>
                                <input type="text" class="form-control" id="discipline" name="discipline">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="topic" class="form-label">Topic</label>
                                <input type="text" class="form-control" id="topic" name="topic">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="superviser" class="form-label">Supervisor</label>
                                <input type="text" class="form-control" id="superviser" name="superviser">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="co_superviser" class="form-label">Co-Supervisor</label>
                                <input type="text" class="form-control" id="co_superviser" name="co_superviser">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                        </div>
                    </div>
                    <a role="button" class="btn btn-secondary" href="/academia-archive/index.php">Cancel</a>
                    <input type="submit" class="btn btn-primary" value="Add Student" name="add_students"></input>


                </div>
            </form>
        </div>
    </div>

</body>
<?php
include("../views/footer.php");

?>