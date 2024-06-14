<?php
include("../config/dbcon.php");
include("../views/header.php");
// session_start();
// If the admin is not logged in, redirect to the login page
if (!isset($_SESSION['loggedin']) || !$_SESSION['loggedin']) {
    header('Location: admin_login.php');
    exit;
}




// $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
//           FROM student_table st
//           LEFT JOIN document_table dt ON st.reg_no = dt.reg_no where st.is_approved = 0
// ";
// $result = mysqli_query($connection, $query);
?>

<div class="wrapper">
    <div class="content d-flex justify-content-center">

        <div class="overflow-auto" style="">
            <table class="table table-responsive table-hover table-bordered table-striped container p-0 rounded">

                <h1 class="text-center mt-4 mb-3 ">
                    <u>Pending Students</u>
                </h1>
                <?php
                include("../views/pagination.php");

                ?>
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
                        <th>Degree</th>
                        <th>Topic</th>
                        <th>Superviser</th>
                        <th>Co-Superviser</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['sr_no']; ?></td>
                            <td>
                                <?php if (!empty($row['profile_image'])) : ?>
                                    <a href="#imageModal" data-image="<?php echo $row['profile_image']; ?>" data-title="Profile Image" data-bs-toggle="modal">
                                        <img src="<?php echo $row['profile_image']; ?>" alt="Profile Image" width="50">
                                    </a>
                                <?php else : ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($row['idBack'])) : ?>
                                    <a href="#imageModal" data-image="<?php echo $row['idBack']; ?>" data-title="ID Back" data-bs-toggle="modal">
                                        <img src="<?php echo $row['idBack']; ?>" alt="ID Back" width="50">
                                    </a>
                                <?php else : ?>
                                    No Image
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($row['idFront'])) : ?>
                                    <a href="#imageModal" data-image="<?php echo $row['idFront']; ?>" data-title="ID Front" data-bs-toggle="modal">
                                        <img src="<?php echo $row['idFront']; ?>" alt="ID Front" width="50">
                                    </a>
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
                            <td><?php echo $row['degree']; ?></td>
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
                        </tr>
                    <?php endwhile; ?>
                </tbody>

            </table>
            <?php
            include("../views/pagination.php");

            ?>
        </div>

        <!-- Modal for delete confirmation -->
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
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
        <!-- Modal for approve confirmation -->
        <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
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

        <!-- Pagination -->

    </div>

    <?php include("../views/footer.php"); ?>
</div>
<!-- Modal for Images -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <div class="modal-header ">
                    <button type="button" class="btn-close border-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            </div>
            <div class="modal-body text-center">
                <img src="" alt="" class="img-fluid">
            </div>
            <!-- <div class="modal-footer">
            </div> -->
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#imageModal').on('show.bs.modal', function(e) {
            var imageUrl = $(e.relatedTarget).data('image');
            var imageTitle = $(e.relatedTarget).data('title');
            $(this).find('.modal-body img').attr('src', imageUrl);
            $(this).find('.modal-title').text(imageTitle);
        });
    });
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