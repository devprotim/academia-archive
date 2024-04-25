<?php
// Include the database connection file
include("../config/dbcon.php");
include("../views/header.php");
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
                    <th>Email</th>
                    <th>Reg. No.</th>
                    <th>Reg. Date</th>
                    <th>Department</th>
                    <th>Topic</th>
                    <th>Superviser</th>
                    <th>Co-Superviser</th>
                    <!-- <th>Action</th> -->
                    <!-- <th>Delete</th> -->
                </tr>
            </thead>
            <tbody>
            <tbody>
                <?php
                $query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
                          FROM student_table st
                          LEFT JOIN document_table dt ON st.reg_no = dt.reg_no where st.is_approved = 1";
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
                        <td><?php echo $row['email']; ?></td>

                        <td><?php echo $row['reg_no']; ?></td>
                        <td><?php echo $row['reg_date']; ?></td>

                        <td><?php echo $row['department']; ?></td>
                        <td><?php echo $row['topic']; ?></td>
                        <td><?php echo $row['superviser']; ?></td>
                        <td><?php echo $row['co_superviser']; ?></td>
                        <!-- <td>
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="actionDropdown">
                                    <?php if ($row['is_approved'] == 0) : ?>
                                        <li><a class="dropdown-item text-success" href="#" data-student_id="<?php echo $row['reg_no']; ?>" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</a></li>
                                    <?php endif; ?>
                                    <li><a class="dropdown-item text-danger" href="#" data-student_id="<?php echo $row['reg_no']; ?>" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a></li>
                                </ul>
                            </div>
                        </td> -->
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?php
include("../views/footer.php");

?>


<!-- <form action="export.php" method="post">
    <input type="hidden" name="html_content" value="<?php echo htmlentities($htmlContent); ?>">
    <button type="submit" class="btn btn-primary">Export to HTML</button>
</form> -->