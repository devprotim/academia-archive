<?php
include("../views/header.php");
// include("../config/dbcon.php");
// include("../a")
?>
<div class="wrapper">
    <div class="content">
        <div class="d-flex justify-content-center container bg-light p-5 rounded-3 centered">
            <form id="studentForm" action="insert_data.php" method="post" enctype="multipart/form-data" class="col-8">
                <h1 class="text-center">PhD Student Data Form</h1>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="required">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" required pattern="[A-Za-z ]+" placeholder="Enter your name">
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
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender <span class="required">*</span></label>
                        <div class="radio-options">
                            <input type="radio" id="male" name="gender" value="Male" checked required>
                            <label for="male">Male</label>
                            <input type="radio" id="female" name="gender" value="Female" required>
                            <label for="female">Female</label>
                            <input type="radio" id="other" name="gender" value="Other" required>
                            <label for="other">Other</label>
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
                            <label for="phone" class="form-label">Phone Number:</label>
                            <input class="form-control" type="tel" id="phone" name="phone" pattern="^(\+?\d{1,3}[\s-]?)?\(?\d{3}\)?[\s-]?\d{3}[\s-]?\d{4}$" placeholder="123-456-7890" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="required">*</span></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" required>
                        </div>
                        <?php
                        // Display error message if provided and it's related to email duplication
                        if (isset($_GET['error']) && strpos($_GET['error'], "Email already exists") !== false) {
                            $dupemail = $_GET['error'];
                            echo "<p style='color: red;'>$dupemail</p>";
                        }
                        ?>
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
                            <label for="reg_date" class="form-label">Date of Registration <span class="required">*</span></label>
                            <input type="date" class="form-control" id="reg_date" name="reg_date" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="department" class="form-label">Department <span class="required">*</span></label>
                            <select class="form-select form-control" aria-label="Dept select example" id="department" name="department">
                                <option value="">Select Department</option>
                                <option value="Physics">Physics</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Mathematics">Mathematics</option>
                                <option value="Biology">Biology</option>
                                <option value="Computer-science">Computer Science</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="topic" class="form-label">Area and Research Topic <span class="required">*</span></label>
                            <input type="text" class="form-control" id="topic" name="topic" placeholder="Enter your research topic" required pattern="[A-Za-z ]+">
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
                            <label for="co_superviser" class="form-label">Co-Supervisor(if any)</label>
                            <input type="text" class="form-control" id="co_superviser" name="co_superviser" placeholder="Enter your co-supervisor's name (if any)" pattern="[A-Za-z ]+">
                        </div>
                    </div>
                </div>

                <div class="row">
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
                if (isset($_GET['error']) && strpos($_GET['error'], "Email already exists") == true) {
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