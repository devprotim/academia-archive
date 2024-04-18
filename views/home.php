<?php
include("../views/header.php");
// session_start();

// If the admin is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: admin_login.php');
    exit;
}
include("../config/dbcon.php");
?>

<div class="wrapper">
    <div class="content">
        <table class="table table-hover table-bordered table-striped container">
            <thead>
                <tr>
                    <th>Sr. No.</th>
                    <th>Profile Image</th>
                    <th>ID Back</th>
                    <th>ID Front</th>
                    <th>Student Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Discipline</th>
                    <th>Topic</th>
                    <th>Superviser</th>
                    <th>Co Superviser</th>
                    <th>Email</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
                          FROM student_table st
                          LEFT JOIN document_table dt ON st.student_id = dt.student_id";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td>
                            <?php if (!empty($row['profile_image'])) : ?>
                                <img src="<?php echo $row['profile_image']; ?>" alt="Profile Image" width="50">
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($row['idBack'])) : ?>
                                <img src="<?php echo $row['idBack']; ?>" alt="ID Back" width="50">
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($row['idFront'])) : ?>
                                <img src="<?php echo $row['idFront']; ?>" alt="ID Front" width="50">
                            <?php else : ?>
                                No Image
                            <?php endif; ?>
                        </td>
                        <td><?php echo $row['student_id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['discipline']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><?php echo $row['superviser']; ?></td>
                        <td><?php echo $row['co_superviser']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a href="#" class="btn btn-success">Update</a></td>
                        <td><a href="#" data-student_id="<?php echo $row['student_id']; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <!-- Modal for delete confirmation -->
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
    </div>
    <?php
    include("../views/footer.php");
    ?>
</div>
<script>
    $(document).ready(function() {
        $('#deleteModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var studentId = button.data('student_id'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#confirmDelete').click(function() {
                deleteRecord(studentId);
                modal.modal('hide'); // Hide the modal after clicking Yes
            });
        });
    });


    function deleteRecord(studentId) {
        // Make an AJAX request to the delete script
        $.ajax({
            url: 'delete_student.php',
            type: 'POST',
            data: {
                student_id: studentId
            },
            success: function(response) {
                // Handle the response from the server
                console.log(response);
                // Optionally, you can reload the page or update the table
                location.reload();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }
</script>