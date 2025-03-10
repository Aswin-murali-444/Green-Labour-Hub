<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==0){

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $rentalPrice = isset($_POST['rental_price']) ? $_POST['rental_price'] : '';
                $rentalEquipments = isset($_POST['rental_equipments']) ? $_POST['rental_equipments'] : '';
                $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : ''; // Get quantity from form
                
                $check_sql = "SELECT * FROM tbl_rental WHERE rental_equipments = '$rentalEquipments'";
                $check_result = $conn->query($check_sql);

                if ($check_result->num_rows > 0) {
                    $errorMessage = "Rental equipment with name'$rentalEquipments' already exists.";
                } else {
                
    
                // Image upload handling
                $targetDir = "./uploads/"; // Specify the directory where you want to store the uploaded images
                $targetFile = $targetDir . basename($_FILES["rental_image"]["name"]); // Get the file name of the uploaded image
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["rental_image"]["tmp_name"]);
                if($check !== false) {
                    // Allow only certain file formats
                    $allowedTypes = array('jpg', 'jpeg', 'png', 'gif');
                    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
                    if(in_array($imageFileType, $allowedTypes)) {
                        if (move_uploaded_file($_FILES["rental_image"]["tmp_name"], $targetFile)) {
                            // Prepare SQL statement to insert data into the table
                            $sql = "INSERT INTO tbl_rental ( rental_price, rental_equipments, rental_image, quantity) 
                                    VALUES ( '$rentalPrice', '$rentalEquipments', '$targetFile', '$quantity')"; // Add quantity to SQL query
                            
                            // Execute the query
                            if ($conn->query($sql) === TRUE) {
                            ?>
                                <!DOCTYPE html>
                                <html lang="en">
                                <head>
                                    <meta charset="UTF-8">
                                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                    <title>Document</title>
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <style>
                                        /* Blue and green theme */
                                        .swal-title {
                                            color: #007bff; /* Blue */
                                        }
                                        .swal-icon-success .swal-icon {
                                            border-color: #28a745; /* Green */
                                        }
                                        .swal-icon-success .swal-icon::before {
                                            background-color: #28a745; /* Green */
                                        }
                                    </style>
                                </head>
                                <body>
                                </body>
                                <script>
                                    // Display SweetAlert
                                    Swal.fire({
                                        title: 'Green Labor Hub',
                                        text: 'Rental added successfully',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 2000 // Disappear after 2 seconds
                                    });
                                </script>
                                </html>
                            <?php
                            } else {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }
                    } else {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    }
                } else {
                    echo "File is not an image.";
                }
            }
        }
            ?>
        
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
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
    <!-- icon font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/icon/font-awesome/css/font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">


</head>

<style>




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
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">John Doe</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Joseph William</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="waves-effect waves-light">
                                        <div class="media">
                                            <img class="d-flex align-self-center img-radius"
                                                src="assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                            <div class="media-body">
                                                <h5 class="notification-user">Sara Soudein</h5>
                                                <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer
                                                    elit.</p>
                                                <span class="notification-time">30 minutes ago</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <ul class="nav-right">
                                <li class="user-profile header-notification">
                                    <a href="#!" class="waves-effect waves-light">
                                        <img src="assets/images/admin-3d-illustration-icon-png.webp" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span>Admin</span>
                                        <i class="ti-angle-down"></i>
                                    </a>
                                    <ul class="show-notification profile-notification">
                                        <li class="waves-effect waves-light">
                                            <a href="user-profile.html">
                                                <i class="ti-user"></i> Profile
                                            </a>
                                        </li>
                                        <li class="waves-effect waves-light">
                                            <a href="../logout.php">
                                                <i class="ti-power-off"></i> Logout
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
                                    <img class="img-80 img-radius"
                                        src="assets/images/admin-3d-illustration-icon-png.webp"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Admin<i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>

                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
                                            <a href="#"><i class="ti-user"></i>View Profile</a>
                                            <a href="../logout.php"><i class="ti-power-off"></i>Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="p-15 p-b-0">
                                <form class="form-material">
                                    <div class="form-group form-primary">
                                        <input type="text" name="footer-email" class="form-control">
                                        <span class="form-bar"></span>
                                        <label class="float-label"><i class="fa fa-search m-r-10"></i>Search </label>
                                    </div>
                                </form>
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="admin.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-dashboard"></i><b></b></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>

                                </li>
                            </ul>

                            <div class="pcoded-navigation-label">Work Management</div>
<ul class="pcoded-item pcoded-left-item">
    <!-- Manage Works Section -->
    <li class="pcoded-hasmenu">
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-dropbox-alt"></i><b>BC</b></span>
            <span class="pcoded-mtext"> Manage Works </span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu">
            <li class=" ">
                <a href="addwork.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Add Work</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class=" ">
                <a href="updatework.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Update Work</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="deletework.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Delete Work</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>

 <!-- Add a divider or header between the sections -->
<div class="pcoded-navigation-label">Rental Management</div>
<ul class="pcoded-item pcoded-left-item">
    <!-- Manage Rentals Section -->
    <li class="pcoded-hasmenu active"> <!-- Add 'active' class to make 'Manage Rentals' active -->
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-shopping-cart"></i><b>RM</b></span>
            <span class="pcoded-mtext">Manage Rentals</span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu show"> <!-- Add 'show' class to make submenu visible -->
            <li class="active"> <!-- Add 'active' class to make 'Add Rental' active -->
                <a href="addrental.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Add Rental</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
                <a href="managerentals.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Manage rentals</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </li>
</ul>

                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="">
                                            <a href="farmerinfo.php" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-user"></i><b></b></span>
                                                <span class="pcoded-mtext">Farmer Info</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="">
                                            <a href="#" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-export"></i><b></b></span>
                                                <span class="pcoded-mtext"> Equipment Rental</span>
                                                <span class="pcoded-mcaret"></span>
                                            </a>
                                        </li>
                                    </ul>
                                    <ul class="pcoded-item pcoded-left-item">
                                        <li class="">
                                            <a href="#" class="waves-effect waves-dark">
                                                <span class="pcoded-micon"><i class="ti-import"></i><b></b></span>
                                                <span class="pcoded-mtext">Rented Eqipments</span>
                                                <span class="pcoded-mcaret"></span>
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
                    <h5 class="m-b-10" style="font-size: 24px;">Manage Rentals</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Add Rentals</p>
                </div>
            </div>
        </div>
    </div>
</div>

                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="container-fluid">
                                    <div class="container">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Rental Form</h5>
                                                        <form action="#" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="rentalEquipments">Rental Equipments</label>
        <input type="text" class="form-control" id="rentalEquipments" name="rental_equipments" placeholder="Enter rental equipments" required>
        <span id="rentalEquipmentsError" class="text-danger"></span> <!-- Placeholder for error message -->
        <?php if(isset($errorMessage)): ?>
        <p style="color:red;"><?php echo $errorMessage; ?></p>
    <?php endif; ?>
    </div>
    <div class="form-group">
        <label for="quantity">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity" min="1" required>
        <span id="quantityError" class="text-danger"></span> <!-- Placeholder for error message -->
    </div>
    <div class="form-group">
        <label for="rentalPrice">Rental Price</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">₹</span> <!-- Rupee symbol -->
            </div>
            <input type="text" class="form-control" id="rentalPrice" name="rental_price" placeholder="Enter rental price" required>
        </div>
        <span id="rentalPriceError" class="text-danger"></span> <!-- Placeholder for error message -->
    </div>
    <div class="form-group">
        <label for="rentalImage">Rental Image</label>
        <input type="file" class="form-control-file" id="rentalImage" name="rental_image">
        <span id="rentalImageError" class="text-danger"></span> <!-- Placeholder for error message -->
    </div>
    <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
</form>

<script>
    // Function to validate rental equipments
    // Function to validate rental equipments
   // Function to validate rental equipments
   function validateRentalEquipments() {
        var rentalEquipments = document.getElementById("editRentalEquipments").value.trim();
        var isValid = /^[A-Z][a-zA-Z\s]*$/.test(rentalEquipments);
        document.getElementById("editRentalEquipmentsError").textContent = isValid ? "" : "Rental equipments should contain only letters with the first letter capitalized.";
        return isValid;
    }

function validateQuantity() {
    var quantity = document.getElementById("quantity").value;
    var isValid = /^\d+$/.test(quantity) && parseInt(quantity) > 0; // Allow only positive integers
    
    // Additional condition to disallow zero and negative values
    isValid = isValid && /^[1-9]\d*$/.test(quantity); // Ensure it's not starting with zero

    document.getElementById("quantityError").textContent = isValid ? "" : "Quantity should be a positive integer greater than 0 and should not contain leading zeros.";
    return isValid;
}


    // Function to validate rental price
    function validateRentalPrice() {
    var rentalPrice = document.getElementById("rentalPrice").value;
    var isValid = /^\d+(\.\d{1,2})?$/.test(rentalPrice) && parseFloat(rentalPrice) > 0; // Allowing decimal numbers
    
    // Additional condition to disallow zero and negative values
    isValid = isValid && parseFloat(rentalPrice) > 0; 

    document.getElementById("rentalPriceError").textContent = isValid ? "" : "Rental price should be a positive number greater than 0.";
    return isValid;
}


    // Function to validate rental image
    function validateRentalImage() {
        var rentalImage = document.getElementById("rentalImage");
        var isValid = rentalImage.files.length === 0 || (rentalImage.files[0].type.startsWith("image/") && !rentalImage.files[0].name.toLowerCase().endsWith(".pdf"));
        document.getElementById("rentalImageError").textContent = isValid ? "" : "Please upload an image file.";
        return isValid;
    }

    // Function to validate form on submit
    function validateForm() {
        var isRentalEquipmentsValid = validateRentalEquipments();
        var isQuantityValid = validateQuantity();
        var isRentalPriceValid = validateRentalPrice();
        var isRentalImageValid = validateRentalImage();
        return isRentalEquipmentsValid && isRentalPriceValid && isRentalImageValid;
    }

    // Attach event listeners to input fields for real-time validation
    document.getElementById("rentalEquipments").addEventListener("input", validateRentalEquipments);
     // Attach event listener to quantity field for real-time validation
     document.getElementById("quantity").addEventListener("input", validateQuantity);
    document.getElementById("rentalPrice").addEventListener("input", validateRentalPrice);
    document.getElementById("rentalImage").addEventListener("change", validateRentalImage);
</script>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></script>
                                    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js "></script>
                                    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
                                    <script type="text/javascript"
                                        src="assets/js/bootstrap/js/bootstrap.min.js "></script>
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
        header("Location: ../index.php");
        exit; 
    } 
    ?>
<?php
        }
        else {
            header("Location: ../index.php");
            exit; // Stop further execution
        }
?>
