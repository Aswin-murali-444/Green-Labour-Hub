<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==1){
            ?>
                <?php
    
    $user_id=$_SESSION['user_id'];
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Worker Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="keywords"
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="Codedthemes" />
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="assets/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">


    <script>
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            // Redirect the user to the login page if accessed through history
            window.location.href = "../logout.php";
           }
</script>
</head>

<body>
<div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <div class="mobile-search waves-effect waves-light">
                            <div class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close"><i
                                                class="ti-close input-group-text"></i></span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn"><i
                                                class="ti-search input-group-text"></i></span>
                                    </div>
                                </div>
                             </div>
                        </div>
                        <a href="#">
                            <span class="p-3">Green labour Hub</span>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a>
                                </div>
                            </li>
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-red"></span>
                                </a>
                                <ul class="show-notification">
                                    <li>
                                        <h6>Notifications</h6>
                                        <label class="label label-danger">New</label>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius" src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <a href="#!" class="waves-effect waves-light">
                                    <img src="assets/images/avatar-4.jpg" class="img-radius" alt="User-Profile-Image">
                                    <span>
                                    <?php 
                                         
                                         $sql= "SELECT name from tbl_farmer where user_id='$user_id';";
                                         $result = $conn->query($sql);
                                         $row = $result->fetch_assoc();
                                         echo $row['name'];
                                          ?>
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="#">
                                            <i class="ti-user"></i> Profile
                                        </a>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <a href="../logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="">
                                <div class="main-menu-header">
                                    <img class="img-80 img-radius" src="assets/images/avatar-4.jpg"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">
                                        <?php 
                                        $sql= "SELECT name from tbl_farmer where user_id='$user_id'";
                                        $result = $conn->query($sql);
                                        $row=$result->fetch_assoc();
                                        echo $row['name'];
                                         ?> <i class="fa fa-caret-down"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="../logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="farmer.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="available_workers.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-search"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Available Workers </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="postjob.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Post jobs </span>
                                    </a>
                                </li>
                                <li class="active">
                                    <a href="manageposts.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                        <span class="pcoded-mtext"> Manage Post  </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <!-- Page-header start -->
                        <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10" style="font-size: 24px;">Manage Posts</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Edit Posted Jobs</p>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                            <?php
// Handle form submission
if(isset($_POST['submit'])) {
    // Get form data
    $jobTitle = $_POST['job_title'];
    $jobDescription = $_POST['job_description'];
    $location = $_POST['location'];
    $employmentType = $_POST['employment_type'];
    $dateOfWork = $_POST['date_of_work'];
    $workSchedule = $_POST['work_schedule'];
    $salary = $_POST['salary'];
    $contactInfo = $_POST['contact_info'];
    
    // Retrieve post ID from $_GET
    $postId = $_GET['id'];

    // Handle image upload
    if(isset($_FILES['work_image']) && $_FILES['work_image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['work_image']['tmp_name'];
        $fileName = $_FILES['work_image']['name'];
        $fileSize = $_FILES['work_image']['size'];
        $fileType = $_FILES['work_image']['type'];
        
        // Define upload directory
        $uploadDir = 'uploads/';

        // Generate unique filename to prevent overwriting existing files
        $uniqueFilename = uniqid() . '_' . $fileName;
        $uploadPath = $uploadDir . $uniqueFilename;

        // Move the uploaded file to the desired location
        if(move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Update the database with the new filename
            $updateSql = "UPDATE tbl_post_job SET 
                          job_title = '$jobTitle', 
                          job_description = '$jobDescription', 
                          location = '$location', 
                          employment_type = '$employmentType', 
                          date_of_work = '$dateOfWork', 
                          work_schedule = '$workSchedule', 
                          salary = '$salary', 
                          contact_info = '$contactInfo',
                          work_image_before = '$uniqueFilename'
                          WHERE post_id = $postId";
            
            // Execute update query
            if ($conn->query($updateSql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Error moving uploaded file";
        }
    } else {
        echo "No file uploaded";
    }
}

// Fetch existing data from database
$postId = $_GET['id'];
$sql="SELECT * FROM tbl_post_job WHERE post_id =$postId;";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>

<form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter job title" value="<?php echo $row['job_title']; ?>" oninput="validateJobTitle()">
        <span id="jobTitleError" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="jobDescription">Job Description</label>
        <textarea class="form-control" id="jobDescription" name="job_description" rows="5" placeholder="Enter job description" oninput="validateJobDescription()"><?php echo $row['job_description']; ?></textarea>
        <span id="jobDescriptionError" class="text-danger"></span>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateOfWork">Date of Work</label>
            <input type="date" class="form-control" id="dateOfWork" name="date_of_work" value="<?php echo $row['date_of_work']; ?>" onchange="validateDateOfWork()">
            <span id="dateOfWorkError" class="text-danger"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="workSchedule">Work Schedule</label>
            <input type="text" class="form-control" id="workSchedule" name="work_schedule" placeholder="Number of days labor needed" value="<?php echo $row['work_schedule']; ?>" oninput="validateWorkSchedule()">
            <span id="workScheduleError" class="text-danger"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="contactInfo">Contact Information</label>
            <input type="text" class="form-control" id="contactInfo" name="contact_info" placeholder="Enter contact information" value="<?php echo $row['contact_info']; ?>" oninput="validateContactInfo()">
            <span id="contactInfoError" class="text-danger"></span>
        </div>
        <div class="form-group col-md-6">
            <!-- Add an empty column to fill space -->
        </div>
    </div>
    <div class="form-group">
        <label for="workImage">Image of Work Before</label>
        <input type="file" class="form-control-file" id="workImage" name="work_image" onchange="validateWorkImage()">
        <small id="imageHelp" class="form-text text-muted">Upload an image that represents the work before it's done.</small>
        <?php if(!empty($row['work_image_before'])): ?>
            <p>Current file: <?php echo $row['work_image_before']; ?></p>
        <?php endif; ?>
        <span id="workImageError" class="text-danger"></span>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<script>
    // Function to validate job title
    function validateJobTitle() {
    var jobTitle = document.getElementById("jobTitle").value.trim();
    var isValid = /^[A-Z][a-zA-Z\s]*$/.test(jobTitle); // First letter capitalized and only letters and spaces
    
    document.getElementById("jobTitleError").textContent = isValid ? "" : "Job title should start with a capital letter and contain only letters and spaces";
    return isValid;
}



    // Function to validate job description
    function validateJobDescription() {
        var jobDescription = document.getElementById("jobDescription").value.trim();
        var isValid = jobDescription !== "";
        document.getElementById("jobDescriptionError").textContent = isValid ? "" : "Please enter job description";
        return isValid;
    }

    // Function to validate type of employment
    function validateEmploymentType() {
        var employmentType = document.getElementById("employmentType").value;
        var isValid = employmentType !== "";
        document.getElementById("employmentTypeError").textContent = isValid ? "" : "Please select type of employment";
        return isValid;
    }

    // Function to validate date of work
    function validateDateOfWork() {
        var dateOfWork = document.getElementById("dateOfWork").value;
        var isValid = dateOfWork !== "";
        document.getElementById("dateOfWorkError").textContent = isValid ? "" : "Please select date of work";
        return isValid;
    }

    // Function to validate work schedule
    function validateWorkSchedule() {
    var workSchedule = document.getElementById("workSchedule").value.trim();
    var isValid = /^\d+$/.test(workSchedule) && parseInt(workSchedule) > 0; // Allow only positive integers
    
    document.getElementById("workScheduleError").textContent = isValid ? "" : "Work schedule should be a positive integer";
    return isValid;
}


    // Function to validate salary
    function validateSalary() {
        var salary = document.getElementById("salary").value.trim();
        var isValid = salary !== "";
        document.getElementById("salaryError").textContent = isValid ? "" : "Please enter salary";
        return isValid;
    }

    // Function to validate contact information
    function validateContactInfo() {
    var contactInfo = document.getElementById("contactInfo").value.trim();
    var isValid = /^[6-9]\d{9}$/.test(contactInfo) && !/(.)\1{4}/.test(contactInfo);
    document.getElementById("contactInfoError").textContent = isValid ? "" : "Please enter a valid 10-digit contact number.";
    return isValid;
}


    // Function to validate work image
    function validateWorkImage() {
    var workImage = document.getElementById("workImage");
    var isValid = workImage.files.length > 0;
    if (isValid) {
        var fileType = workImage.files[0].type;
        isValid = fileType.startsWith("image/") && !fileType.endsWith("pdf");
    }
    document.getElementById("workImageError").textContent = isValid ? "" : "Please upload an image file";
    return isValid;
}

    // Attach event listeners for live validation
    document.getElementById("jobTitle").addEventListener("input", validateJobTitle);
    document.getElementById("jobDescription").addEventListener("input", validateJobDescription);
    document.getElementById("employmentType").addEventListener("input", validateEmploymentType);
    document.getElementById("dateOfWork").addEventListener("input", validateDateOfWork);
    document.getElementById("workSchedule").addEventListener("input", validateWorkSchedule);
    document.getElementById("salary").addEventListener("input", validateSalary);
    document.getElementById("contactInfo").addEventListener("input", validateContactInfo);
    document.getElementById("workImage").addEventListener("input", validateWorkImage);

    // Function to validate the entire form on submit
    function validateForm() {
        var isValid = true;
        isValid &= validateJobTitle();
        isValid &= validateJobDescription();
        isValid &= validateEmploymentType();
        isValid &= validateDateOfWork();
        isValid &= validateWorkSchedule();
        isValid &= validateSalary();
        isValid &= validateContactInfo();
        isValid &= validateWorkImage();
        return isValid;
    }
</script>


                               

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="assets/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Custom js -->
    <script src="assets/js/pcoded.min.js"></script>
    <script src="assets/js/vertical/vertical-layout.min.js"></script>
    <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>
</body>

</html>
<?php 
    }else{
        echo "<script>window.location.href='../index.php'</script>";
    } 
    ?>
            <?php
        }
        else{
            echo "<script>window.location.href='../index.php'</script>";
            
        }


?>
