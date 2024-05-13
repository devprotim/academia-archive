<?php
include("../views/header.php");

?>
<div class="wrapper">
    <div class="content d-flex justify-content-center">
        <div class="d-flex justify-content-center container bg-light p-3 p-md-5 m-2 m-md-5 rounded-3 centered">
            <form id="studentForm" action="insert_data.php" method="post" enctype="multipart/form-data" class="col-12 col-md-8">
                <h1 class="text-center ">PhD Scholar Data Form</h1>

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
                            <label for="male" class="cursor-pointer">Male</label>
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="female" class="cursor-pointer">Female</label>
                            <input type="radio" id="other" name="gender" value="Other" required>
                            <label for="other" class="cursor-pointer">Others</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="country" class="form-label">Campus <span class="required">*</span></label>
                        <div class="radio-options">
                            <input type="radio" id="aus" name="campus" value="AUS" checked required>
                            <label for="aus" class="cursor-pointer">AUS</label>
                            <input type="radio" id="audc" name="campus" value="AUDC" required>
                            <label for="audc" class="cursor-pointer">AUDC</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3 ">
                            <label for="phone" class="form-label">Phone Number: <span class="required">*</span></label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="^\d{10}$" placeholder="Enter your phone number" required>
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
                            <label for="reg_date" class="form-label ">Year of Registration <i class="text-secondary">(Format: 2010-2011)</i> <span class="required">*</span></label>
                            <select class="form-select cursor-pointer" id="reg_date" name="reg_date" required>
                                <?php
                                // Get the current year
                                $currentYear = date("Y");

                                // Starting year for the dropdown
                                $startYear = 1994;

                                // Loop through years to create options
                                for ($year = $startYear; $year <= $currentYear; $year++) {
                                    // Calculate the end year
                                    $endYear = $year + 1;

                                    // Display the option
                                    echo "<option value='$year-$endYear'>$year-$endYear</option>";
                                }
                                ?>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <!-- <div id="aus_department_dropdown" class="mb-3">
                            <label for="department_aus" class="form-label">Departments for AUS Campus <span class="required">*</span></label>
                            <select class="form-select form-control" aria-label="Dept select example" id="department_aus" name="department" required>
                                <option value="">Select Department</option>
                                <?php
                                include 'departments.php';
                                foreach ($departments as $department) {
                                    echo "<option value=\"$department\">$department</option>";
                                }
                                ?>
                            </select>
                        </div> -->

                        <div id="department_dropdown" class="mb-3">
                            <label for="department" class="form-label">Departments <span class="required">*</span></label>
                            <select class="form-select form-control cursor-pointer" aria-label="Dept select example" id="department" name="department" required>
                            </select>
                        </div>
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

                <div class="row mb-3">
                    <p><i class="text-secondary"> Supported image types: (.jpeg, .jpg, .png, .webp, .svg)
                            <br> File size limit: 200KB
                        </i></p>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="profile_image" class="form-label">Profile Image <span class="required">*</span></label>
                            <input class="form-control" type="file" id="profile_image" name="profile_image" accept="image/*" onchange="validateFileSize(this)" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="idFront" class="form-label">Library ID Front <span class="required">*</span></label>
                            <input class="form-control" type="file" id="idFront" name="idFront" accept="image/*" onchange="validateFileSize(this)" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="idBack" class="form-label">Library ID Back <span class="required">*</span></label>
                            <input class="form-control" type="file" id="idBack" name="idBack" accept="image/*" onchange="validateFileSize(this)" required>
                        </div>
                    </div>
                </div>
                <div class="row flex-wrap-reverse flex-md-nowrap justify-content-between">
                    <div class="col-md-3"> <a role="button" class="btn btn-secondary w-100" onclick="window.history.back();">Cancel</a>
                    </div>
                    <div class="col-md-3">
                        <!-- <input id="submitBtn" class="btn btn-primary" type="submit">
                        <span id="spinner" class="spinner-border spinner-border-sm" aria-hidden="true" style="display: none;"></span>
                        <input type="submit" id="statusText" class=" " value="Submit" name="add_students"></input>
                        </input> -->
                        <input type="submit" id="statusText" class="btn btn-primary w-100" value="Submit" name="add_students"></input>

                    </div>



                </div>

                <?php
                // Display error message if provided
                // if (isset($_GET['error'])) {
                //     $msg = $_GET['error'];
                //     echo "<p style=' text-align: center; color: green'>$msg</p>";
                // }
                ?>
            </form>
        </div>
    </div>
</div>
<?php
include("../views/footer.php");
?>

<script>
    // document.addEventListener('DOMContentLoaded', function() {
    //     const submitBtn = document.getElementById('submitBtn');
    //     const spinner = document.getElementById('spinner');
    //     const statusText = document.getElementById('statusText');

    //     // Add a submit event listener to the form
    //     document.querySelector('form').addEventListener('submit', function() {
    //         // Show the spinner and change the text to "Loading..."
    //         spinner.style.display = 'inline-block';
    //         statusText.textContent = 'Loading...';
    //         submitBtn.disabled = true; // Disable the button to prevent multiple submissions
    //     });
    // });


    document.addEventListener('DOMContentLoaded', function() {
        var departmentDropdown = document.getElementById('department');
        var campusRadios = document.getElementsByName('campus');

        // Function to populate departments based on campus selection
        function populateDepartments(campus) {
            departmentDropdown.innerHTML = ''; // Clear previous options
            var departments = <?php echo json_encode($departments); ?>[campus];
            departments.forEach(function(department) {
                var option = document.createElement('option');
                option.value = department;
                option.textContent = department;
                departmentDropdown.appendChild(option);
            });
        }

        // Event listener for campus radio buttons
        campusRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                if (radio.checked) {
                    populateDepartments(radio.value);
                }
            });
        });

        // Populate departments for the initially checked campus
        populateDepartments(document.querySelector('input[name="campus"]:checked').value);
    });


    const emailInput = document.getElementById('email');
    const emailErrorDiv = document.getElementById('emailError');
    const form = document.querySelector('form');

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

    form.addEventListener('submit', function(event) {
        // Prevent form submission if there are errors
        if (emailErrorDiv.textContent !== '') {
            event.preventDefault();
        }
    });

    function validateFileSize(input) {
        const MAX_FILE_SIZE = 204800; // 200 KB in bytes
        const fileSize = input.files[0]?.size;
        const errorMessage = input.parentNode.querySelector('.file-size-error');

        if (fileSize && fileSize > MAX_FILE_SIZE) {
            if (errorMessage) {
                errorMessage.textContent = `${input.files[0].name} exceeds the maximum file size of 200 KB.`;
            } else {
                const errorDiv = document.createElement('div');
                errorDiv.classList.add('file-size-error', 'text-danger');
                errorDiv.textContent = `${input.files[0].name} exceeds the maximum file size of 200 KB.`;
                input.parentNode.appendChild(errorDiv);
            }
            input.value = ""; // Clear the file input
            return false;
        } else if (errorMessage) {
            errorMessage.textContent = "";
        }
        return true;
    }


    // var yearRangeInput = document.getElementById('reg_date');
    // yearRangeInput.addEventListener('input', function() {
    //     var yearPattern = /^(\d{4})-(\d{4})$/;
    //     var match = yearPattern.exec(this.value);
    //     var errorMessage = document.getElementById('error-message');

    //     if (match) {
    //         var startYear = parseInt(match[1]);
    //         var endYear = parseInt(match[2]);
    //         var currentYear = new Date().getFullYear();

    //         // Check if startYear is less than 1994
    //         if (startYear < 1994) {
    //             startYear = 1994;
    //         }

    //         if (startYear > currentYear) {
    //             startYear = currentYear;
    //             endYear = startYear - 1;
    //         }

    //         // Ensure endYear is always one more than startYear
    //         if (endYear !== startYear + 1) {
    //             endYear = startYear + 1;
    //         }

    //         // Check if endYear is greater than the current year
    //         if (endYear > currentYear) {
    //             endYear = currentYear + 1;
    //         }

    //         this.value = startYear + '-' + endYear;
    //         errorMessage.textContent = ''; // Clear error message
    //     } else {
    //         errorMessage.textContent = 'Invalid format. Please enter a year range in the format YYYY-YYYY.';
    //     }
    // });
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