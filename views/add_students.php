<?php
include("../views/header.php");
// include("../config/dbcon.php");
// include("../a")
?>
<div class="wrapper">
    <div class="content">
        <div class="d-flex justify-content-center container bg-light p-3 p-md-5 rounded-3 centered">
            <form id="studentForm" action="insert_data.php" method="post" enctype="multipart/form-data" class="col-12 col-md-8">
                <h1 class="text-center ">PhD Student Data Form</h1>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z ]+" placeholder="Enter your first and middle name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name </label>
                            <input type="text" class="form-control" id="last_name" name="last_name" pattern="[A-Za-z ]+" placeholder="Enter your last name">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender <span class="required">*</span></label>
                        <div class="radio-options">
                            <input type="radio" id="male" name="gender" value="Male" checked required>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="Other" required>
                            <label for="other">Others</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Campus <span class="required">*</span></label>
                        <div class="radio-options">
                            <input type="radio" id="aus" name="campus" value="AUS" checked required>
                            <label for="aus">AUS</label>
                            <input type="radio" id="audc" name="campus" value="AUDC" required>
                            <label for="audc">AUDC</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="phone" class="form-label">Phone Number: <span class="required">*</span></label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="^\d{10}$" placeholder="1234567890" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" pattern="^\[a-zA-Z0-9.!#$%&'\*+/=?^\_\`{|}~-\]+@\[a-zA-Z0-9\](?:\[a-zA-Z0-9-\]{0,61}\[a-zA-Z0-9\])?(?:\\.\[a-zA-Z0-9\](?:\[a-zA-Z0-9-\]{0,61}\[a-zA-Z0-9\])?)\*$" required>
                            <div id="emailError" class="text-danger mt-1"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="reg_no" class="form-label">Registration no. <span class="required">*</span></label>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" placeholder="Enter your registration number" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="reg_date" class="form-label">Year of Registration <i class="text-secondary">(Format: 2010-2011)</i> <span class="required">*</span></label>
                            <input type="text" class="form-control" id="reg_date" name="reg_date" placeholder="Enter reg. year" required>
                        </div>


                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div id="aus_department_dropdown" class="mb-3">
                            <label for="department_aus" class="form-label">Departments for AUS Campus <span class="required">*</span></label>
                            <select class="form-select form-control" aria-label="Dept select example" id="department_aus" name="department" required>
                                <option value="">Select Department</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <!-- Add more options for AUS departments as needed -->
                            </select>
                        </div>

                        <!-- <div id="audc_department_dropdown" class="mb-3" style="display: none;">
                            <label for="department_audc" class="form-label">Departments for AUDC Campus <span class="required">*</span></label>
                            <select class="form-select form-control" aria-label="Dept select example" id="department_audc" name="department" required>
                                <option value="">Select Department</option>
                                <option value="Department1">Department 1</option>
                                <option value="Department2">Department 2</option>
                        </select>
                    </div> -->

                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Area and Research Topic <i class="text-secondary">(100 Characters max.)</i> <span class="required">*</span></label>
                            <textarea class="form-control" id="topic" name="topic" placeholder="Enter your research topic" required pattern="[A-Za-z ]+" maxlength="100" minlength="20" style="resize: none; height: 100px;"></textarea>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="superviser" class="form-label">Supervisor <span class="required">*</span></label>
                            <input type="text" class="form-control" id="superviser" name="superviser" placeholder="Enter your supervisor's name" required pattern="[A-Za-z ]+">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="co_superviser" class="form-label">Co-Supervisor <i class="text-secondary">(if any)</i> </label>
                            <input type="text" class="form-control" id="co_superviser" name="co_superviser" placeholder="Enter your co-supervisor's name" pattern="[A-Za-z ]+">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <p> <i class="text-secondary"> Supported image types: (.jpeg, .jpg, .png, .webp, .svg)</i></p>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image <span class="required">*</span></label>
                            <input class="form-control" type="file" id="profile_image" name="profile_image" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="idFront" class="form-label">Library ID Front <span class="required">*</span></label>
                            <input class="form-control" type="file" id="idFront" name="idFront" accept="image/*">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="idBack" class="form-label">Library ID Back <span class="required">*</span></label>
                            <input class="form-control" type="file" id="idBack" name="idBack" accept="image/*">
                        </div>
                    </div>
                </div>
                <a role="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Add Student" name="add_students"></input>

                <?php
                // Display error message if provided
                if (isset($_GET['error'])) {
                    $msg = $_GET['error'];
                    echo "<p style=' text-align: center; color: green'>$msg</p>";
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include("../views/footer.php");
?>

<script>
    const emailInput = document.getElementById('email');
    const emailErrorDiv = document.getElementById('emailError');

    emailInput.addEventListener('input', function() {
        const email = this.value;

        // Clear previous error message
        emailErrorDiv.textContent = '';

        // Check if email is valid
        if (email.trim() !== '') {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'check_email.php?email=' + encodeURIComponent(email), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.exists) {
                        emailErrorDiv.textContent = 'Email already exists in the database.';
                    }
                }
            };
            xhr.send();
        }
    });

    // function showDepartmentDropdown() {
    //     var ausRadio = document.getElementById('aus');
    //     var ausDepartmentDropdown = document.getElementById('aus_department_dropdown');
    //     var audcRadio = document.getElementById('audc');
    //     var audcDepartmentDropdown = document.getElementById('audc_department_dropdown');

    //     if (ausRadio.checked) {
    //         ausDepartmentDropdown.style.display = 'block';
    //         audcDepartmentDropdown.style.display = 'none';
    //     } else if (audcRadio.checked) {
    //         ausDepartmentDropdown.style.display = 'none';
    //         audcDepartmentDropdown.style.display = 'block';
    //     }
    // }


    var yearRangeInput = document.getElementById('reg_date');

    yearRangeInput.addEventListener('input', function() {
        var yearPattern = /^(\d{4})-(\d{4})$/;
        var match = yearPattern.exec(this.value);
        if (match) {
            var startYear = parseInt(match[1]);
            var endYear = parseInt(match[2]);
            var currentYear = new Date().getFullYear();

            // Check if startYear is less than 1994
            if (startYear < 1994) {
                // this.value = ''; // Reset input value
                startYear = 1994;
                // return; // Exit the function
            }

            // Ensure endYear is always one more than startYear
            if (endYear !== startYear + 1) {
                endYear = startYear + 1;
            }

            // Check if endYear is greater than the current year
            if (endYear > currentYear) {
                endYear = currentYear;
            }

            this.value = startYear + '-' + endYear;
        }
    });
</script>

<!-- DevP90524 -->
<!-- <li class="menu-item-has-children dropdown">
    <a href="#"><i class="fa fa-address-card"></i>Admission</a>
    <ul class="sub-menu dropdown-menu multi-level">
        <li class="menu-item-has-children dropdown">
            <a href="#"><i class="fa fa-circle"></i>Prospectus</a>
            <ul class="sub-menu dropdown-menu multi-level">
                <li><a href="http://www.aus.ac.in/wp-content/uploads/2023/08/Common-UG-PG-PhD-Prospectus-2023-24-1.pdf"><i class="fa fa-circle"></i>Prospectus(2023-24)</a></li>
            </ul>
        </li>
    </ul>
    <ul class="sub-menu dropdown-menu multi-level" style="top: 70px;">
        <li>
            <a href="https://ausexamination.ac.in/admission/" style="top: 140px"><i class="fa fa-circle"></i>Admission Portal</a>
        </li>
    </ul>
</li> -->