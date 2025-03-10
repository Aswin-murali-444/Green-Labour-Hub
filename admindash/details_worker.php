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
$user_id=$_SESSION['user_id'];
$sql="SELECT status FROM tbl_worker_verify WHERE user_id='$user_id' AND status=1;";
require_once "../connect.php";
$result=$conn->query($sql);
if($result->num_rows>0){
    ?>

    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        
    </body>
    <script>
Swal.fire({
  icon: "success",
  title: "You are verified",
  showConfirmButton: false,
  timer: 1000
}).then((result) => {
  // Check if the timer completed
  if (result.dismiss === Swal.DismissReason.timer) {
    // Redirect the user to another page
    window.location.href = "worker.php";
  }
});
    </script>
    </html>
    <?php
}
else{
    ?>
    <?php
    if (isset($_POST['submit'])) {
        // Check if the file upload field is not empty
        if (isset($_FILES['government_id']) && !empty($_FILES['government_id']['name'])) {
            // Handle form submission and file upload
            $user_id = $_SESSION['user_id'];
            $state = $_POST['state'];
            $district = $_POST['city'];
            $city1 = $_POST['city1'];
            $pin = $_POST['pin'];

            $image_name = $_FILES['government_id']['name'];
            $target_dir = "documents/";
            $target_file_government = $target_dir . basename($image_name);

            $target_dir1 = "documents1/";
            $image_name1 = $_FILES['profile_id']['name'];
            $target_file_profile = $target_dir1 . basename($image_name1);

            $educational_qualifications = $_POST['educational_qualifications'];
            $work_experience = $_POST['work_experience'];
            $area_of_interest = $_POST['area_of_interest'];
            $references = $_POST['references'];
            $language_proficiency = $_POST['language_proficiency'];

            // Check for file upload errors
            if ($_FILES['government_id']['error'] !== UPLOAD_ERR_OK) {
                echo "Error uploading government ID file. Error code: " . $_FILES['government_id']['error'];
                exit();
            }

            // Move the uploaded files to the target directory
            if (
                move_uploaded_file($_FILES['government_id']['tmp_name'], $target_file_government) &&
                move_uploaded_file($_FILES['profile_id']['tmp_name'], $target_file_profile)
            ) {
                require_once "../connect.php";
                $sql = "INSERT INTO tbl_worker_verify (user_id, state, district,city, govtdoc, education_qualification, work_experience, interest, reference, language, self_image) 
                        VALUES ('$user_id', '$state', '$district','$city1', '$image_name', '$educational_qualifications', '$work_experience', '$area_of_interest', '$references', '$language_proficiency', '$image_name1')";

                if ($conn->query($sql) === TRUE) {
                    
                    // Redirect the user to worker.php after successful form submission
                    header("Location: worker.php");
                    exit(); // Ensure that no further code is executed after the redirect
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                // File upload failed
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            // File upload field is empty
            echo "Please select a file to upload.";
        }
    }
}
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Green labour hub</title>
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
<style>
     #map-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
      }

      .input-group {
        flex: .4;
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      

      .input-group input {
        width: 100%;
        box-sizing: border-box;
      }
      #map {
        height: 500px;
        width: 100%;
      }
    /* Bootstrap custom file input style */
.custom-file-input::-webkit-file-upload-button {
  visibility: hidden;
}

.custom-file-input::before {
  content: 'Choose file';
  display: inline-block;
  background: #007bff;
  color: white;
  padding: 0.375rem 0.75rem;
  border-radius: 0.25rem;
}

.custom-file-input:hover::before {
  background: #0056b3;
}

.custom-file-input:active::before {
  background: #004d99;
}

.custom-file-label {
  margin-top: 0.25rem;
}

.custom-file-label::after {
  content: 'Browse';
}

</style>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
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
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
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
                                            <a href="profile.php"><i class="ti-user"></i>View Profile</a>
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
                                <li class="active">
                                    <a href="details_worker.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-lock"></i><b></b></span>
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
                    <h5 class="m-b-10" style="font-size: 24px;">Worker</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Profile Verification </p>
                </div>
            </div>
        </div>
    </div>
</div>  
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                            <div class="main-body">
                            <div class="main-body">
    <form class="p-5" method="POST" action="#" enctype="multipart/form-data">
        <div class="form-row">
        <div class="form-group col-md-2">
    <label for="inputPin">Pin</label>
    <input type="text" class="form-control" id="inputPin" name="pin" placeholder="Enter your Pin code" required>
    <span id="pinError" style="color: red;"></span>
</div>
            <div class="form-group col-md-2">
                <button type="button" class="btn btn-primary mt-4" onclick="fetchStateAndCity()">Show Details</button>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="inputState">State</label>
                <select id="inputState" class="form-control" name="state" required>
                    <option selected disabled>Choose...</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="inputCity">District</label>
                <select id="inputCity" class="form-control" name="city" required>
                    <option selected disabled>Choose...</option>
                </select>
            </div>
        </div>
        <div class="form-row">
    <div class="form-group col-md-6">
        <label for="inputID">Government-issued ID</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputID" name="government_id" required onchange="validateFile('inputID')">
            <label class="custom-file-label" for="inputID">Choose</label>
        </div>
    </div>
    <div class="form-group col-md-6">
        <label for="inputProfileID">Passport size Photo</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputProfileID" name="profile_id" required onchange="validateFile('inputProfileID')">
            <label class="custom-file-label" for="inputProfileID">Choose file</label>
        </div>
    </div>
</div>


<div id="map-container">
      
      <div id="map"></div>
      <div class="input-group">
        <label for="location">Selected Location:</label>
        <input type="text" id="location" readonly>
      </div>
      <div class="input-group">
        <label for="city">City:</label>
        <input type="text"  name="city1" id="city" readonly>
      </div>
    </div>
    <div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputSkills">Area of interest</label>
        <select class="form-control" id="inputSkills" name="area_of_interest" required>
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
        </select>
    </div>
</div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputQualifications">Educational Qualifications</label>
                <select class="form-control" id="inputQualifications" name="educational_qualifications" required>
                    <option selected disabled>Choose...</option>
                    <option>Below 10th</option>
                    <option>Below Higher Secondary</option>
                    <option>Diploma</option>
                    <option>Others</option>
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="inputExperience">Work Experience</label>
                <select class="form-control" id="inputExperience" name="work_experience" required>
                    <option selected disabled>Choose...</option>
                    <option>No Experience</option>
                    <option>Less than 1 year</option>
                    <option>1-3 years</option>
                    <option>3-5 years</option>
                    <option>5-10 years</option>
                    <option>More than 10 years</option>
                </select>
            </div>
        </div>
       
<div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputReferences">References</label>
        <textarea class="form-control" id="inputReferences" name="references" rows="3" placeholder="Last work Details" required></textarea>
    </div>
</div>

        <div class="form-row">
    <div class="form-group col-md-12">
        <label for="inputLanguageProficiency">Language Proficiency</label>
        <textarea class="form-control" id="inputLanguageProficiency" name="language_proficiency" placeholder="Example: Malayalam, Hindi, Tamil, English" required></textarea>
    </div>
</div>

        <div class="form-row">
            <div class="form-group col-md-12">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>
        </div>
    </form>
</div>
<script>
   function validateLanguageProficiency() {
    var textarea = document.getElementById('inputLanguageProficiency');
    var languageInput = textarea.value.trim();
    var languages = languageInput.split(',');

    // Define an array of valid communication languages in lowercase
    var validLanguages = ['malayalam', 'hindi', 'tamil', 'english', 'bengali', 'telugu', 'marathi', 'urdu', 'gujarati', 'kannada', 'odia', 'punjabi', 'assamese'];

    // Check if all entered languages are valid communication languages
    for (var i = 0; i < languages.length; i++) {
        var language = languages[i].trim().toLowerCase(); // Trim and convert to lowercase
        // Capitalize the first letter
        language = language.charAt(0).toUpperCase() + language.slice(1);
        if (!validLanguages.includes(language.toLowerCase())) {
            textarea.setCustomValidity('Please enter only communication languages.');
            textarea.reportValidity();
            return false; // Exit function if an invalid language is found
        }
    }

    // If all languages are valid, clear any previous validation message
    textarea.setCustomValidity('');
    return true;
}

// Attach the validation function to the textarea's change event
document.getElementById('inputLanguageProficiency').addEventListener('change', validateLanguageProficiency);

    //
    function validateFile(inputId) {
    var input = document.getElementById(inputId);
    var fileName = input.value;
    var validExtensions = ['jpg', 'jpeg', 'png', 'gif'];

    // Get the file extension
    var fileExtension = fileName.split('.').pop().toLowerCase();

    // Check if the file extension is valid
    if (validExtensions.includes(fileExtension)) {
        // Valid file extension, clear any existing error message
        input.setCustomValidity('');
        // Update the label to display the selected file name
        var label = input.nextElementSibling;
        label.textContent = fileName;
    } else {
        // Invalid file extension
        if (fileExtension === 'pdf') {
            // PDF file uploaded, display error message
            input.setCustomValidity('PDF files are not allowed. Only JPEG, PNG, and GIF images are allowed.');
        } else {
            // Other invalid file types
            input.setCustomValidity('Only JPEG, PNG, and GIF images are allowed.');
        }
        // Display the error message
        input.reportValidity();
        // Reset the label
        var label = input.nextElementSibling;
        label.textContent = 'Choose image';
        // Clear the input value to prevent uploading
        input.value = '';
    }
}



    //
    async function fetchStateAndCity() {
    var pin = document.getElementById('inputPin').value;
    var apiUrl = 'https://api.postalpincode.in/pincode/' + pin;
    var pinError = document.getElementById('pinError'); // Get reference to the error message element

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data && data[0] && data[0].Status === 'Error') {
                throw new Error('Invalid PIN code');
            }
            if (data && data[0] && data[0].PostOffice && data[0].PostOffice.length > 0) {
                var state = data[0].PostOffice[0].State;
                var city = data[0].PostOffice[0].District;

                // Populate state and city dropdowns with data
                document.getElementById('inputState').innerHTML = '<option selected>' + state + '</option>';
                document.getElementById('inputCity').innerHTML = '<option selected>' + city + '</option>';

                // Clear any previous error message
                pinError.textContent = '';

                // Fetch latitude and longitude of the district
                fetchDistrictCoordinates(city);
            } else {
                console.error('No data found for the given PIN code');
            }
        })
        .catch(error => {
            console.error('Error fetching state and city:', error);
            // Update the error message element with the error message
            pinError.textContent = 'Invalid PIN code. Please enter a valid PIN.';
        });
}

async function fetchDistrictCoordinates(district) {
    const url = `https://nominatim.openstreetmap.org/search?city=${encodeURIComponent(district)}&format=json&accept-language=en`;

    try {
        const response = await fetch(url);
        const data = await response.json();
        if (data.length > 0) {
            const { lat, lon } = data[0];
            const districtLocation = new google.maps.LatLng(lat, lon);
            map.setCenter(districtLocation);
            map.setZoom(12); // Adjust the zoom level as needed
        } else {
            console.error('No location data found for the district:', district);
        }
    } catch (error) {
        console.error('Error fetching district coordinates:', error);
    }
}

function updateFileName(inputId) {
    var input = document.getElementById(inputId);
    var label = input.nextElementSibling;
    var fileName = input.files[0].name;
    label.textContent = fileName;
}
//map  

let map;
      let marker;

      async function initMap() {
        const { Map } = await google.maps.importLibrary("maps");
        map = new Map(document.getElementById("map"), {
          center: { lat: 20.5937, lng: 78.9629 }, // Default center of India
          zoom: 5,
        });

        map.addListener("click", function(event) {
          placeMarker(event.latLng);
          reverseGeocode(event.latLng);
        });
      }

      function placeMarker(location) {
        if (marker) {
          marker.setMap(null); // Remove previous marker
        }

        marker = new google.maps.Marker({
          position: location,
          map: map,
        });

        // Update form field with location details
        document.getElementById("location").value = location.lat() + ", " + location.lng();
      }

      async function reverseGeocode(latLng) {
        const [lat, lng] = [latLng.lat(), latLng.lng()];

        const url = `https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json&accept-language=en`;

        try {
          const response = await fetch(url);
          const data = await response.json();
          console.log("Reverse geocoding response:", data);

          const address = data.address;
          const city = address.city || address.town || address.village || "N/A";
          const district = address.county || address.district || "N/A";
          const state = address.state || "N/A";

          // Update form fields with location details
          document.getElementById("city").value = city;
          document.getElementById("district").value = district;
          document.getElementById("state").value = state;
        } catch (error) {
          console.error("Error fetching reverse geocoding data:", error);
        }
      }

      initMap();
      ////////////
   // Get references to the state elements


    </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    //
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPWelSP14yrJqb0FIG-QKjEtoi_9NTALA&callback=initMap" async defer></script>
  //
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
