<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Archive</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>

<body>
    <div class="wrapper">
        <div class="content">
            <?php
            include("../views/header.php");
            session_start();

            // If the admin is not logged in, redirect to the login page
            if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
                header('Location: admin_login.php');
                exit;
            }
            include("../config/dbcon.php");
            ?>

            <table class="table table-hover table-bordered table-striped container">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>student_id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>discipline</th>
                        <th>topic</th>
                        <th>superviser</th>
                        <th>co_superviser</th>
                        <th>email</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $query = "select * from student_table";
                    $result = mysqli_query($connection, $query);
                    // print_r($result);

                    // if(!$result){
                    //     die("failed".mysqli.error());
                    // }else {
                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>
                        <tr>
                            <td>
                                <?php echo $row['id']; ?>
                            </td>
                            <td>
                                <?php echo $row['student_id']; ?>
                            </td>
                            <td>
                                <?php echo $row['first_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['last_name']; ?>
                            </td>
                            <td>
                                <?php echo $row['discipline']; ?>
                            </td>
                            <td>
                                <?php echo $row['topic']; ?>
                            </td>
                            <td>
                                <?php echo $row['superviser']; ?>
                            </td>
                            <td>
                                <?php echo $row['co_superviser']; ?>
                            </td>
                            <td>
                                <?php echo $row['email']; ?>
                            </td>
                            <td><a href="#" class="btn btn-success">Update</a></td>
                            <td><a href="#" <?php echo $row['id'] ?> class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></td>

                        </tr>
                    <?php
                    }
                    // }
                    ?>
                </tbody>

            </table>

            <!-- <a role="button" type="button" class="btn btn-primary" href="/academia-archive/views/add_students.php"> Add Students
            </a> -->

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Modal title</h5>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this record?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
                        </div>
                    </div>
                </div>
            </div>


        </div><?php
                include("../views/footer.php");

                ?>


    </div>
</body>

</html>