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
                    <th>Campus</th>
                    <th>Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Reg. No.</th>
                    <th>Reg. Date</th>
                    <th>Department</th>
                    <th>Topic</th>
                    <th>Superviser</th>
                    <th>Co-Superviser</th>
                    <th>Action</th>
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
                          FROM student_table st
                          LEFT JOIN document_table dt ON st.reg_no = dt.reg_no";
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['sr_no']; ?></td>
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
                        <td><?php echo $row['campus']; ?></td>

                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['last_name']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['email']; ?></td>

                        <td><?php echo $row['reg_no']; ?></td>
                        <td><?php echo $row['reg_date']; ?></td>

                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><?php echo $row['superviser']; ?></td>
                        <td><?php echo $row['co_superviser']; ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <?php if ($row['is_approved'] == 0) : ?>
                                        <li><a class="dropdown-item text-success" href="#" data-reg_no="<?php echo $row['reg_no']; ?>" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item text-danger" href="#" data-reg_no="<?php echo $row['reg_no']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></li>
                                </ul>
                            </div>
                        </td>

                        <!-- <td><a href="#" class="btn btn-success">Update</a></td>
                        <td><a href="#" data-student_id="<?php echo $row['reg_no']; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></td> -->
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
        <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to approve this record?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger" id="confirmApprove">Yes</button>
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
            var reg_no = button.data('reg_no'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#confirmDelete').click(function() {
                deleteRecord(reg_no);
                modal.modal('hide'); // Hide the modal after clicking Yes
            });
        });
    });


    function deleteRecord(reg_no) {
        // Make an AJAX request to the delete script
        $.ajax({
            url: 'delete_student.php',
            type: 'POST',
            data: {
                reg_no: reg_no
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

    $(document).ready(function() {
        $('#approveModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var reg_no = button.data('reg_no'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#confirmApprove').click(function() {
                updateRecord(reg_no);
                modal.modal('hide'); // Hide the modal after clicking Yes
            });
        });
    });


    function updateRecord(reg_no) {
        // Make an AJAX request to the delete script
        $.ajax({
            url: 'approve_student.php',
            type: 'POST',
            data: {
                reg_no: reg_no
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