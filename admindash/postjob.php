<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==1){
?>
<?php
    $user_id=$_SESSION['user_id'];
if(isset($_POST['submit'])) {
    $user_name = $_SESSION['username'];
    $jobTitle = $_POST['job_title'];
    $jobDescription = $_POST['job_description'];
    $location = $_POST['location'];
    $employmentType = $_POST['employment_type'];
    $workSchedule = $_POST['work_schedule'];
    $date_of_work = $_POST['date_of_work'];
    $salary = 0; // Default value
    if(isset($_POST['salary'])) {
        $salary = $_POST['salary'];
    }
    $contactInfo = $_POST['contact_info'];

    // File upload handling
    if(isset($_FILES['work_image'])) {
        $file_name = $_FILES['work_image']['name'];
        $file_tmp_name = $_FILES['work_image']['tmp_name'];
        $file_type = $_FILES['work_image']['type'];
        
        // Specify the destination folder
        $destination_folder = "documents1/";

        // Move the uploaded file to the destination folder
        if(move_uploaded_file($file_tmp_name, $destination_folder . $file_name)) {
            // Prepare SQL query
            $sql = "INSERT INTO tbl_post_job (user_name, job_title, job_description, location, employment_type, work_schedule, date_of_work, salary, contact_info, work_image_before) VALUES ('$user_name', '$jobTitle', '$jobDescription', '$location', '$employmentType', '$workSchedule', '$date_of_work', $salary, '$contactInfo', '$file_name')";

            // Execute SQL query
            if ($conn->query($sql) === TRUE) {
                // Call the JavaScript function to show the success message
                echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            showSuccessMessage();
                        });
                      </script>';
            } else {
                // Error message
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            // Error moving file
            echo "Error moving file to destination folder.";
        }
    } else {
        // File not uploaded
        echo "No file uploaded.";
    }

}
?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showSuccessMessage() {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Successfully uploaded',
        }).then((result) => {
            // Wait for 5 seconds before redirecting to managepost.php
            setTimeout(function() {
                window.location.href = 'manageposts.php';
            }, 3000); // 5000 milliseconds = 5 seconds
        });
    }
</script>




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


    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }

        #map {
            height: 400px;
            width: 100%;
        }
        
    </style>
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
                                <li class="active">
                                    <a href="postjob.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Post jobs </span>
                                    </a>
                                </li>
                                <li class="">
                                    <a href="manageposts.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                        <span class="pcoded-mtext"> Manage Post  </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                    <div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10" style="font-size: 24px;">Post Jobs</h5>
                    <p class="m-b-0" style="font-size: 18px;"> </p>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="container mt-5">
                                    <h2 class="mb-4">Post a Job for Agricultural Workers</h2>
                                    <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="jobTitle">Job Title</label>
        <input type="text" class="form-control" id="jobTitle" name="job_title" placeholder="Enter job title" required>
        <span id="jobTitleError" class="text-danger"></span>
    </div>
    <div class="form-group">
        <label for="jobDescription">Job Description</label>
        <textarea class="form-control" id="jobDescription" name="job_description" rows="5" placeholder="Enter job description" required></textarea>
        <span id="jobDescriptionError" class="text-danger"></span>
    </div>
    <div class="form-row">
        <div id="map"></div>
        <div class="form-group col-md-6">
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" hidden required>
            <small id="locationHelp" class="form-text text-muted">Fetching your current location...</small>
        </div>
        <div class="form-group col-md-12">
            <br>
            <label for="employmentType">Type of Employment</label>
            <select id="employmentType" class="form-control" name="employment_type" required onchange="fetchSalary()">
            <option value="" selected disabled>Select an option</option>
                <?php
                    $sql="SELECT * FROM tbl_work WHERE status=1;";  
                    $result=$conn->query($sql);
                    while ($row = $result->fetch_assoc()){
                        ?>
                            <option value="<?php echo $row['work_name']; ?>"><?php echo $row['work_name']; ?></option>
                        <?php
                    }
                ?>
                <script>
                    function fetchSalary() {
    var employmentType = document.getElementById("employmentType").value;
    
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "fetch_salary.php?type=" + employmentType, true);
    
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            document.getElementById("salary").value = response;
        }
    };
    
    xhr.send();
}

                </script>
            </select>
            <span id="employmentTypeError" class="text-danger"></span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="dateOfWork">Date of Work</label>
            <input type="date" class="form-control" id="dateOfWork" name="date_of_work" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+2 months')); ?>" required>

            <span id="dateOfWorkError" class="text-danger"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="workSchedule">Work Schedule</label>
            <input type="text" class="form-control" id="workSchedule" name="work_schedule" placeholder="Number of days labor needed" required>
            <span id="workScheduleError" class="text-danger"></span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="salary">Salary</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">&#x20B9;</span>
                </div>
                <input type="text" class="form-control" id="salary" name="salary" placeholder="Enter salary" required>
            </div>
            <span id="salaryError" class="text-danger"></span>
        </div>
        <div class="form-group col-md-6">
            <label for="contactInfo">Contact Information</label>
            <input type="text" class="form-control" id="contactInfo" name="contact_info" placeholder="Enter contact information" required>
            <span id="contactInfoError" class="text-danger"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="workImage">Image of Work Before</label>
        <input type="file" class="form-control-file" id="workImage" name="work_image" required>
        <small id="imageHelp" class="form-text text-muted">Upload an image that represents the work before it's done.</small>
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





                                    <script
                                        src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                                    <script
                                        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                                    <script
                                        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        //
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1JUfF0tYI8aBqp3L_-7ItiiIBw3I9KIs&callback=initMap" async defer></script>

        <script>
    let map;
    let locationInput;
    let locationName;

    function initMap() {
        // Initialize map
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: -34.397, lng: 150.644 }, // Default center (Sydney, Australia)
            zoom: 12,
            tilt: 45, // Set tilt for 3D view
        });

        // Get the location input field
        locationInput = document.getElementById("location");
        locationName = document.getElementById("locationName");

        // Try HTML5 geolocation first
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    const pos = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude,
                    };
                    // Set center of map to current location
                    map.setCenter(pos);
                    // Update location input field
                    updateLocationInput(pos.lat, pos.lng);
                    // Fetch location name
                    fetchLocationName(pos.lat, pos.lng);
                    // Add marker for current location
                    new google.maps.Marker({
                        position: pos,
                        map: map,
                        title: "You are here",
                    });
                },
                (error) => {
                    // If HTML5 geolocation fails, log the error and fallback to IP geolocation
                    console.error("Error getting device location:", error);
                    fetchIPGeolocation();
                }
            );
        } else {
            // If browser doesn't support Geolocation, fallback to IP geolocation
            console.error("Geolocation is not supported by this browser");
            fetchIPGeolocation();
        }
    }

    function updateLocationInput(latitude, longitude) {
        // Update location input field with the live coordinates
        locationInput.value = `${latitude}, ${longitude}`;
    }

    function fetchLocationName(latitude, longitude) {
        const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=AIzaSyB1JUfF0tYI8aBqp3L_-7ItiiIBw3I9KIs`;

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data.status === "OK") {
                    const results = data.results;
                    if (results.length > 0) {
                        const address = results[0].formatted_address;
                        // Update location name field
                        locationInput.value = address;
                    } else {
                        console.error("No results found for the coordinates.");
                    }
                } else {
                    console.error("Geocoding API request failed with status:", data.status);
                }
            })
            .catch(error => console.error("Error fetching location name:", error));
    }

    function fetchIPGeolocation() {
        // Fetch IP address and use IP geolocation
        fetch('https://api.ipify.org?format=json')
            .then(response => response.json())
            .then(data => {
                const ipAddress = data.ip;

                // Fetch location data using IP address
                fetch(`https://ipinfo.io/${ipAddress}/json?token=YOUR_IPINFO_API_TOKEN`)
                    .then(response => response.json())
                    .then(locationData => {
                        // Extract latitude and longitude from location data
                        const [latitude, longitude] = locationData.loc.split(',');

                        // Set center of map to user's location from IP geolocation
                        map.setCenter({ lat: parseFloat(latitude), lng: parseFloat(longitude) });
                        // Add marker for user's location from IP geolocation
                        new google.maps.Marker({
                            position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
                            map: map,
                            title: 'Your Location'
                        });

                        // Fetch location name
                        fetchLocationName(latitude, longitude);

                        // Update location input field with IP geolocation
                        updateLocationInput(latitude, longitude);
                    })
                    .catch(error => console.error('Error fetching location data:', error));
            })
            .catch(error => console.error('Error fetching IP address:', error));
    }

    // Call the initMap function to initialize the map
    initMap();

</script>


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