<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Students</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="wrapper">
        <div class="content ">
            <?php
            include("../views/header.php");
            // include("../config/dbcon.php");
            ?>

            <h1 class="text-center">Student Data Form</h1>
            <div class="d-flex justify-content-center  ">
                <form id="studentForm" action="insert_data.php" method="post" class="col-8">

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
                                    <label for="image" class="form-label">Upload Image:</label>
                                    <input class="form-control" type="file" id="image" name="image" accept="image/*">
                                </div>
                            </div>
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
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="last_name" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="discipline" class="form-label">Discipline</label>
                                    <input type="text" class="form-control" id="discipline" name="discipline" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="topic" class="form-label">Topic</label>
                                    <input type="text" class="form-control" id="topic" name="topic" required>
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

                                <div class="mb-3 ">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                        </div>
                        <a role="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</a>
                        <input type="submit" class="btn btn-primary" value="Add Student" name="add_students"></input>


                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php
include("../views/footer.php");

?>

</html>