<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==2){
            ?>
                <?php
    
    $user_id=$_SESSION['user_id'];
    ?>
<?php
    if(isset($_SESSION['username'])){
// Fetch user details from tbl_worker table
$sql2 = "SELECT * FROM tbl_worker WHERE user_id = '$user_id';";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();

$sql1 = "SELECT * FROM tbl_worker_verify WHERE user_id='$user_id';";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc(); // Assuming only one row is expected
// Update user details in tbl_worker table
if (isset($_POST['submit'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    $city = $_POST['city'];
    $state = $_POST['state']; // Initialize state variable
    $work_experience = $_POST['work_experience']; // Initialize work_experience variable
    $interest = $_POST['interest']; // Initialize interest variable

    // Check if a new profile image is uploaded
        if (isset($_FILES['self_image'])) {
            // Process file upload
            $target_dir1 = "documents1/";
            $image_name1 = $_FILES['self_image']['name'];
            $target_file = $target_dir1 . basename($image_name1);

            // Move uploaded file to destination directory
            if (move_uploaded_file($_FILES["self_image"]["tmp_name"], $target_file)) {
                // File uploaded successfully, update database with new file name
                $image_name = $_FILES['self_image']['name'];

                // Update database with $image_name
                $update_image_sql = "UPDATE tbl_worker_verify SET self_image='$image_name' WHERE user_id='$user_id'";
                if ($conn->query($update_image_sql) === TRUE) {
                    // Image name updated successfully
                    echo "Profile picture updated successfully.";
                } else {
                    // Handle error updating image name in database
                    echo "Error updating image name in database: " . $conn->error;
                }
            } else {
                // Handle error moving uploaded file
                echo "Error uploading file.";
            }
        }

    // Update user details in the tbl_worker table
    $update_worker_sql = "UPDATE tbl_worker SET name='$name', gender='$gender', phone='$phone', address='$address', dob='$dob' WHERE user_id='$user_id'";
    if ($conn->query($update_worker_sql) === TRUE) {
        // Update user details in tbl_worker_verify table
        $update_verify_sql = "UPDATE tbl_worker_verify SET state='$state',city='$city', work_experience='$work_experience', interest='$interest' WHERE user_id='$user_id'";
        if ($conn->query($update_verify_sql) === TRUE) {
            // Redirect to profile page after successful update
            echo "<script>window.location.href = 'worker.php';</script>";
            exit();
        } else {
            // Handle update error for tbl_worker_verify table
            echo "Error updating record in tbl_worker_verify: " . $conn->error;
        }
    } else {
        // Handle update error for tbl_worker table
        echo "Error updating record in tbl_worker: " . $conn->error;
    }
}
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
                                    <?php
                                        $s1="SELECT self_image FROM tbl_worker_verify WHERE user_id='$user_id';";
                                        $r1=$conn->query($s1);
                                        if($r1->num_rows>0){
                                            $ro1=$r1->fetch_assoc();  
                                            echo "<img src='./documents1/{$ro1['self_image']}' alt='Self Image' height='40px' style='border-radius: 50%;'>";
                                        }else{
                                            ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                    <?php
                                        }
                                                                        
                                          ?>
                                    <span>
                                        <?php 
                                         
                                        $sql= "SELECT name from tbl_worker where user_id='$user_id';";
                                        $result = $conn->query($sql);
                                        $row = $result->fetch_assoc();
                                        echo $row['name'];
                                         ?>
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li class="waves-effect waves-light">
                                        <a href="profile.php">
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
                                    <?php
                                        $s1="SELECT self_image FROM tbl_worker_verify WHERE user_id='$user_id';";
                                        $r1=$conn->query($s1);
                                        if($r1->num_rows>0){
                                            $ro1=$r1->fetch_assoc();  
                                            echo "<img src='./documents1/{$ro1['self_image']}' alt='Self Image' height='40px' style='border-radius: 50%;'>";
                                        }else{
                                            ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person" viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                    <?php
                                        }
                                                                        
                                          ?>
                                    <div class="user-details">
                                        <span id="more-details">
                                            <?php $user_id=$_SESSION['user_id'];
                                        require_once "../connect.php";
                                        $sql= "SELECT name from tbl_worker where user_id='$user_id'";
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
                                            
                                        <a href="profile.php" style="color:#007bff"><i class="ti-user"></i>View Profile</a>
                                            <a href="../logout.php"><i class="ti-layout-sidebar-left"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="worker.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="details_worker.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-lock"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Verify Profile</span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="available_jobs.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-search"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Available jobs </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="rental.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-truck"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Rent Equipments </span>
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
                                            <h5 class="m-b-10"></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-header">
                                    <div class="page-block">
                                        <div class="row align-items-center">
                                            <div class="col-md-8">
                                                <div class="page-header-title">
                                                    <h5 class="m-b-10">User Profile</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Edit Profile</h5>
                                                    <form onsubmit="return validateForm();" action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="name"> Name:</label>
        <div class="input-group">
            <input type="text" class="form-control" id="name" name="name" onblur="validateName()" oninput="validateName()" value="<?php echo isset($row2["name"]) ? $row2["name"] : ''; ?>" readonly>
            <div class="input-group-append">
                <span class="input-group-text" onclick="enableEdit('name')"><i class="fa fa-pencil"></i></span>
            </div>
        </div>
        <span id="nameError" class="text-danger"></span>
    </div>
    <div class="form-group">
    <label for="gender">Gender:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="gender" name="gender"
            value="<?php echo isset($row2['gender']) ? $row2['gender'] : ''; ?>" readonly
            onblur="validateGender()" oninput="validateGender()">
        <div class="input-group-append">
            <span class="input-group-text" onclick="enableEdit('gender')"><i class="fa fa-pencil"></i></span>
        </div>
    </div>
    <!-- Display error message -->
    <span id="genderError" class="text-danger"></span>
</div>


<div class="form-group">
    <label for="dob">DOB:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="dob" name="dob"
            value="<?php echo isset($row2["dob"]) ? $row2["dob"] : ''; ?>" readonly
            onblur="validateDob()" oninput="validateDob()">
        <div class="input-group-append">
            <span class="input-group-text" onclick="enableEdit('dob')"><i class="fa fa-pencil"></i></span>
        </div>
    </div>
    <!-- Display error message -->
    <span id="dobError" class="text-danger"></span>
</div>


<div class="form-group">
    <label for="phone">Phone:</label>
    <div class="input-group">
        <input type="text" class="form-control" id="phone" name="phone"
            value="<?php echo isset($row2["phone"]) ? $row2["phone"] : ''; ?>" readonly
            onblur="validatePhone()" oninput="validatePhone()">
        <div class="input-group-append">
            <span class="input-group-text" onclick="enableEdit('phone')"><i class="fa fa-pencil"></i></span>
        </div>
    </div>
    <!-- Display error message -->
    <span id="phoneError" class="text-danger"></span>
</div>


                                                        <div class="form-group">
                                                            <label for="address">Address:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="address"
                                                                    name="address" value="<?php echo isset($row2["address"]) ? $row2["address"] : '' ; ?>" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        onclick="enableEdit('address')"><i
                                                                            class="fa fa-pencil"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="state">State:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="state"
                                                                    name="state" value="<?php echo isset($row1["state"]) ? $row1["state"] : '' ; ?>" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        onclick="enableEdit('state')"><i
                                                                            class="fa fa-pencil"></i></span>
                                                                </div>
                                                            </div>
                                                            <label for="city">City:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="city"
                                                                    name="city" value="<?php echo isset($row1["city"]) ? $row1["city"] : '' ; ?>" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        onclick="enableEdit('city')"><i
                                                                            class="fa fa-pencil"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="work_experience">Work Experience:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control"
                                                                    id="work_experience" name="work_experience"
                                                                    value="<?php echo isset($row1["work_experience"]) ?
                                                                    $row1["work_experience"] : '' ; ?>" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        onclick="enableEdit('work_experience')"><i
                                                                            class="fa fa-pencil"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="interest">Interest:</label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" id="interest"
                                                                    name="interest" value="<?php echo isset($row1["interest"]) ? $row1["interest"] : '' ; ?>" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text"
                                                                        onclick="enableEdit('interest')"><i
                                                                            class="fa fa-pencil"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                               <label for="self_image">Self Image:</label>
                                                            <div class="input-group">
                                                              <!-- Display the current image -->
<?php
if (isset($row1['self_image'])) {
    echo "<img src='./documents1/{$row1['self_image']}' alt='Self Image' height='40px' style='border-radius: 50%;'>";
} else {
    echo " Image not found";
}
?>

                                                                <!-- Input field for uploading a new image -->
                                                                <div class="input-group-append">
                                                                    <input type="file" name="self_image"
                                                                        id="self_image">
                                                                </div>
                                                            </div>
                                                        </div>



                                                        <!-- Repeat this pattern for other user details -->
                                                        <button type="submit" name="submit" class="btn btn-primary">Update
                                                            Profile</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function enableEdit(inputId) {
                                    var inputField = document.getElementById(inputId);
                                    inputField.removeAttribute('readonly');
                                }
                                
                                function validateName() {
    var fullName = document.getElementById('name').value;
    var nameError = document.getElementById('nameError');

    // Validate name (should start with a capital letter and allow spaces between words and periods)
    if (!/^[A-Z][a-zA-Z]*(?:\s[A-Z]\.?\s?[a-zA-Z]*)+$/.test(fullName)) {
        if (fullName.trim() === '') {
            nameError.innerText = 'Name is required.';
        } else {
            nameError.innerText = 'Invalid name format. Please enter a valid name with a capital letter, allowing spaces and periods. You can include initials separated by periods. After the first name, only one or two spaces are allowed for the last name.';
        }
        return false;
    } else if (fullName.replace(/\s+/g, ' ').length > 20) {
        nameError.innerText = 'The combined length of first name and last name, including the space, should not exceed 20 characters.';
        return false;
    } else {
        nameError.innerText = '';
        return true;
    }
}

function validateGender() {
    var gender = document.getElementById('gender').value;
    var genderError = document.getElementById('genderError');

    // Validate gender
    if (gender.trim().toLowerCase() !== 'male' && gender.trim().toLowerCase() !== 'female') {
        genderError.innerText = 'Please enter either "Male" or "Female".';
        return false;
    } else {
        genderError.innerText = '';
        return true;
    }
}
function validateDob() {
    var dob = document.getElementById('dob').value;
    var dobError = document.getElementById('dobError');

    // Validate date of birth
    var today = new Date();
    var birthDate = new Date(dob);
    var age = today.getFullYear() - birthDate.getFullYear();
    var monthDiff = today.getMonth() - birthDate.getMonth();
    var dateFormatRegex = /^\d{4}-\d{2}-\d{2}$/;
    if (!dateFormatRegex.test(dob)) {
        dobError.innerText = 'Invalid date format. Please enter a date in YYYY-MM-DD format.';
        return false;
    } else {
        dobError.innerText = '';
        return true;
    }
    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }

    if (dob.trim() === '') {
        dobError.innerText = 'Please enter your date of birth.';
        return false;
    } else if (age < 18) {
        dobError.innerText = 'You must be 18 years old or older.';
        return false;
    } else {
        dobError.innerText = '';
        return true;
    }
}


function validatePhone() {
    var phone = document.getElementById('phone').value;
    var phoneError = document.getElementById('phoneError');

    // Validate phone number (for example, should be a valid format)
    var phoneRegex = /^[6-9]\d{9}$/;
    var repeatingDigitsRegex = /(\d)\1{4}/; // Regex to check for 5 consecutive repeating digits

    if (
        phone.trim() === '' ||                    // Check if phone number is empty
        !phoneRegex.test(phone) ||                // Check if phone number matches the format
        repeatingDigitsRegex.test(phone)         // Check if there are five consecutive repeating digits
    ) {
        phoneError.innerText = 'Please enter a valid phone number.';
        return false;
    } else {
        phoneError.innerText = '';
        return true;
    }
}
function validateForm() {
                // Call individual validation functions for each field
                return (
                  validateName() &&
                  validatePhone() &&
                  validateDob() &&
                  validateDob() &&
                  validateGender()
                );
              }


                            </script>


                            <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
                            <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
                            <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
                            <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js "></script>
                            <!-- waves js -->
                            <script src="assets/pages/waves/js/waves.min.js"></script>
                            <!-- jquery slimscroll js -->
                            <script type="text/javascript"
                                src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>

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
