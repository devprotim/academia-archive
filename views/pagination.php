<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
<style>
    .active::after {
        content: none;
    }
</style>

</html>
<?php
// Connect to the database
// include("../config/dbcon.php");

// Get the current page and is_approved parameter
if (!isset($_GET['page'])) {
    $page_no = 1;
} else {
    $page_no = $_GET['page'];
}

// $is_approved = 0;



$current_route = basename($_SERVER['REQUEST_URI']);
if (strpos($current_route, 'home') !== false) {
    $is_approved = 0;
} elseif (strpos($current_route, 'approved_student') == false) {
    $is_approved = 1;
}
// echo "Current page: " . $current_route . "<br>";
// echo "Is approved: " . $is_approved . "<br>";

$records_per_page = 10; // Number of records per page

// Calculate the offset for the query
$offset = ($page_no - 1) * $records_per_page;

// Prepare the SQL query
$query = "SELECT st.*, dt.profile_image, dt.idBack, dt.idFront
          FROM student_table st
          LEFT JOIN document_table dt ON st.reg_no = dt.reg_no
          WHERE st.is_approved = $is_approved
          LIMIT $records_per_page OFFSET $offset";

$result = mysqli_query($connection, $query);

// Count total records for pagination
$count_query = "SELECT COUNT(*) as total FROM student_table WHERE is_approved = $is_approved";
$count_result = mysqli_query($connection, $count_query);
$count_row = mysqli_fetch_assoc($count_result);
$total_records = $count_row['total'];
$total_no_of_pages = ceil($total_records / $records_per_page);
$next_page = $page_no + 1;
$previous_page = $page_no - 1;
$second_last = $total_no_of_pages - 1;
$adjacents = "2";

?>

<!-- Pagination Links -->
<nav>
    <ul class="pagination pagination-sm">
        <?php
        if ($page_no > 1) {
            echo "<li class='page-item'><a class='page-link' href='?page=1'>First Page</a></li>";
        }
        ?>

        <li class="page-item" <?php if ($page_no <= 1) {
                                    echo "class='disabled'";
                                } ?>>
            <a class="page-link" <?php if ($page_no > 1) {
                                        echo "href='?page=$previous_page'";
                                    } ?>>Previous</a>
        </li>

        <?php
        if ($total_no_of_pages <= 10) {
            for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                if ($counter == $page_no) {
                    echo "<li class='active page-item'><a class='page-link'>$counter</a></li>";
                } else {
                    echo "<li class='page-item'><a class='page-link' href='?page=$counter'>$counter</a></li>";
                }
            }
        } elseif ($total_no_of_pages > 10) {

            if ($page_no <= 4) {
                for ($counter = 1; $counter < 8; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?page=$counter'>$counter</a></li>";
                    }
                }
                echo "<li><a class='page-link'>...</a></li>";
                echo "<li><a class='page-link' href='?page=$second_last'>$second_last</a></li>";
                echo "<li><a class='page-link' href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";
            } elseif ($page_no > 4 && $page_no < $total_no_of_pages - 4) {
                echo "<li><a class='page-link' href='?page=1'>1</a></li>";
                echo "<li><a class='page-link' href='?page=2'>2</a></li>";
                echo "<li><a class='page-link'>...</a></li>";
                for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    } else {
                        echo "<li><a class='page-link' href='?page=$counter'>$counter</a></li>";
                    }
                }
                echo "<li><a class='page-link'>...</a></li>";
                echo "<li><a class='page-link' href='?page=$second_last'>$second_last</a></li>";
                echo "<li><a class='page-link' href='?page=$total_no_of_pages'>$total_no_of_pages</a></li>";
            } else {
                echo "<li><a class='page-link' href='?page=1'>1</a></li>";
                echo "<li><a class='page-link' href='?page=2'>2</a></li>";
                echo "<li><a class='page-link'>...</a></li>";

                for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                    if ($counter == $page_no) {
                        echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?page=$counter'>$counter</a></li>";
                    }
                }
            }
        }
        ?>

        <li class="page-item" <?php if ($page_no >= $total_no_of_pages) {
                                    echo "class='disabled'";
                                } ?>>
            <a class="page-link" <?php if ($page_no < $total_no_of_pages) {
                                        echo "href='?page=$next_page'";
                                    } ?>>Next</a>
        </li>
        <?php if ($page_no < $total_no_of_pages) {
            echo "<li class='page-item'><a class='page-link' href='?page=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
        } ?>
    </ul>
</nav>