<?php
// Include the database connection file
include("../config/dbcon.php");
include("../views/header.php");

$page_no = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) ?: 1;
$results_per_page = 10;
$offset = ($page_no - 1) * $results_per_page;

$query_count = "SELECT COUNT(*) AS total FROM student_table WHERE is_approved = 1";
$result_count = mysqli_query($connection, $query_count);
$number_of_result = mysqli_num_rows($result_count);

// $row_count = mysqli_fetch_assoc($result_count);
// $total_records = $row_count['total'];
$total_pages = ceil($number_of_result / $results_per_page);

$query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
          FROM student_table st
          LEFT JOIN document_table dt ON st.reg_no = dt.reg_no
          WHERE st.is_approved = 1
          LIMIT $offset, $results_per_page";
$result = mysqli_query($connection, $query);
?>

<div class="wrapper">
    <div class="content">
        <div class="overflow-auto" style="width: 95vw;">

            <table class="table table-hover table-bordered table-striped container">
                <nav class="mt-5">
                    <ul class="pagination pagination-sm justify-content-center">
                        <?php if ($page_no > 1) : ?>
                            <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                        <?php endif; ?>

                        <li class="page-item <?= ($page_no <= 1) ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= ($page_no > 1) ? '?page=' . ($page_no - 1) : '#' ?>">Previous</a>
                        </li>

                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?= ($i == $page_no) ? 'active' : '' ?>">
                                <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <li class="page-item <?= ($page_no >= $total_pages) ? 'disabled' : '' ?>">
                            <a class="page-link" href="<?= ($page_no < $total_pages) ? '?page=' . ($page_no + 1) : '#' ?>">Next</a>
                        </li>

                        <?php if ($page_no < $total_pages) : ?>
                            <li class="page-item"><a class="page-link" href="?page=<?= $total_pages; ?>">Last</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <h1 class="text-center mt-4 mb-3 ">
                    <u>Approved Students</u>
                </h1>

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
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <nav>
                <ul class="pagination pagination-sm justify-content-center">
                    <?php if ($page_no > 1) : ?>
                        <li class="page-item"><a class="page-link" href="?page=1">First</a></li>
                    <?php endif; ?>

                    <li class="page-item <?= ($page_no <= 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= ($page_no > 1) ? '?page=' . ($page_no - 1) : '#' ?>">Previous</a>
                    </li>

                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?= ($i == $page_no) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                        </li>
                    <?php endfor; ?>

                    <li class="page-item <?= ($page_no >= $total_pages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= ($page_no < $total_pages) ? '?page=' . ($page_no + 1) : '#' ?>">Next</a>
                    </li>

                    <?php if ($page_no < $total_pages) : ?>
                        <li class="page-item"><a class="page-link" href="?page=<?= $total_pages; ?>">Last</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    include("../views/footer.php");
    ?>
</div>

<!-- Modal for Images -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-between">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <div class="modal-header">
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
</script>