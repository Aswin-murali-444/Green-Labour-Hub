<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==0){
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
<!-- Bootstrap CSS -->
<link href="path/to/bootstrap.min.css" rel="stylesheet">

<!-- jQuery -->
<script src="path/to/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="path/to/bootstrap.min.js"></script>


</head>

<style>

.card {
    border-radius: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 130%; /* Adjust the width as needed */
    max-width: 1500px; /* Limit the maximum width */
    margin: 20px auto; /* Center the card horizontally */
}

.card-title {
    font-size: 1.5rem;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: center;
}

th {
    font-weight: bold;
}

.number-column {
    width: 50px;
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
            <li class=""> <!-- Add 'active' class to make 'Add Rental' active -->
                <a href="addrental.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Add Rental</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="active">
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
                    <p class="m-b-0" style="font-size: 18px;"> Edit & Delete Rentals </p>
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
                                        <div class="col-md-7">


                                        
    <div class="card p-8">
        
        <div class="card-body">
            <h5 class="card-title">Rental Details</h5>
            <div class="table-responsive">
            <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                           <th class="number-column">No:</th>
                            <th>Rental Equipments</th>
                            <th> Price</th>
                            <th>Quantity</th>
                            <th>Rental Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
    // Fetch rental details from the database and loop through them
    $sql = "SELECT * FROM tbl_rental WHERE status = 1";
    $result = $conn->query($sql);
    $counter = 1; // Initialize counter
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$counter."</td>"; // Display the counter
            echo "<td>".$row['rental_equipments']."</td>";
            echo "<td>".$row['rental_price']."</td>";
            echo "<td>".$row['quantity']."</td>";

            echo "<td><img src=\"" . $row['rental_image'] . "\" width=\"100\" height=\"100\"></td>";

            echo "<td>
            <a href='#' class='edit-rental' data-bs-toggle='modal' data-bs-target='#editRentalModal' 
               data-rental-id='".$row['rental_id']."' 
               data-rental-equipments='".$row['rental_equipments']."' 
               data-rental-price='".$row['rental_price']."' 
               data-quantity='".$row['quantity']."' 
               data-rental-image='".$row['rental_image']."'><i class='fa fa-pencil'></i></a> | 
            <a href='delete_rental.php?id=".$row['rental_id']."'><i class='fa fa-trash'></i></a>
          </td>";
    
      
            echo "</tr>";
            $counter++; // Increment the counter
        }
    } else {
        echo "<tr><td colspan='5'>No rentals found</td></tr>";
    }
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function deleteRental(rentalId) {
        // Display a SweetAlert confirmation dialog
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            // If the user confirms deletion
            if (result.isConfirmed) {
                // Redirect to delete_rental.php with the rental ID
                window.location.href = 'delete_rental.php?id=' + rentalId;
            }
        });
    }
</script>


<!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- JavaScript to populate quantity in the modal -->
<script>
    $(document).ready(function() {
        $('.edit-rental').on('click', function() {
            var quantity = $(this).data('quantity');
            $('#editRentalQuantity').val(quantity);
            // Clear any previous error message
            $('#editRentalQuantityError').text('');
        });
    });
</script>


</tbody>

                </table>
            </div>
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

                                    <!-- Modal for Editing Rental Details -->
<div class="modal fade" id="editRentalModal" tabindex="-1" aria-labelledby="editRentalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRentalModalLabel">Edit Rental Details</h5>
                <button type="button" class="btn-close" aria-label="Close" onclick="$('#editRentalModal').modal('hide')" style="position: absolute; top: 10px; right: 10px;">
  <span aria-hidden="true">&times;</span>
</button>


            </div>
            <div class="modal-body">
                <!-- Form for editing rental details -->
                <form id="editRentalForm" action="update_rental.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="editRentalEquipments" class="form-label">Rental Equipments</label>
        <input type="text" class="form-control" id="editRentalEquipments" name="rental_equipments">
        <span id="editRentalEquipmentsError" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="editRentalPrice" class="form-label">Rental Price</label>
        <input type="text" class="form-control" id="editRentalPrice" name="rental_price">
        <span id="editRentalPriceError" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="editRentalQuantity" class="form-label">Quantity</label>
        <input type="text" class="form-control" id="editRentalQuantity" name="quantity">
        <span id="editRentalQuantityError" class="text-danger"></span>
    </div>
    <div class="mb-3">
        <label for="editRentalNewImage" class="form-label">New Rental Image</label>
        <input type="file" class="form-control" id="editRentalNewImage" name="rental_image">
        <span id="editRentalImageError" class="text-danger"></span>
    </div>
    <input type="hidden" id="editRentalId" name="rental_id">
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>

<script>
    // Function to validate rental equipments
    function validateRentalEquipments() {
        var rentalEquipments = document.getElementById("editRentalEquipments").value.trim();
        var isValid = /^[A-Z][a-zA-Z\s]*$/.test(rentalEquipments);
        document.getElementById("editRentalEquipmentsError").textContent = isValid ? "" : "Rental equipments should contain only letters with the first letter capitalized.";
        return isValid;
    }

    // Function to validate rental price
    function validateRentalPrice() {
        var rentalPrice = document.getElementById("editRentalPrice").value;
        var isValid = /^\d+(\.\d{1,2})?$/.test(rentalPrice) && parseFloat(rentalPrice) > 0;
        document.getElementById("editRentalPriceError").textContent = isValid ? "" : "Rental price should be a positive number greater than 0.";
        return isValid;
    }

    // Function to validate quantity
    function validateRentalQuantity() {
        var quantity = document.getElementById("editRentalQuantity").value;
        var isValid = /^\d+$/.test(quantity) && parseInt(quantity) > 0;
        document.getElementById("editRentalQuantityError").textContent = isValid ? "" : "Quantity should be a positive integer greater than 0.";
        return isValid;
    }

    // Function to validate rental image
    function validateRentalImage() {
        var rentalImage = document.getElementById("editRentalNewImage").value;
        var isValid = rentalImage.trim() !== "";
        document.getElementById("editRentalImageError").textContent = isValid ? "" : "Please upload an image file.";
        return isValid;
    }

    // Function to validate form on submit
    function validateForm() {
        var isRentalEquipmentsValid = validateRentalEquipments();
        var isRentalPriceValid = validateRentalPrice();
        var isRentalQuantityValid = validateRentalQuantity();
        var isRentalImageValid = validateRentalImage();
        return isRentalEquipmentsValid && isRentalPriceValid && isRentalQuantityValid && isRentalImageValid;
    }

    // Attach event listeners to input fields for real-time validation
    document.getElementById("editRentalEquipments").addEventListener("input", validateRentalEquipments);
    document.getElementById("editRentalPrice").addEventListener("input", validateRentalPrice);
    document.getElementById("editRentalQuantity").addEventListener("input", validateRentalQuantity);
    document.getElementById("editRentalNewImage").addEventListener("change", validateRentalImage);
</script>

            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript to handle editing rental details
    $(document).ready(function() {
        // When edit icon is clicked, populate modal fields with rental details
        $('table').on('click', '.edit-rental', function() {
            var rentalId = $(this).data('rental-id');
            var rentalEquipments = $(this).data('rental-equipments');
            var rentalPrice = $(this).data('rental-price');
            var rentalImage = $(this).data('rental-image');
            
            var imageUrl = rentalImage;
            
            $('#editRentalId').val(rentalId);
            $('#editRentalEquipments').val(rentalEquipments);
            $('#editRentalPrice').val(rentalPrice);
            $('#currentRentalImage').attr('src', imageUrl).css('width', '200px'); // Set width to 200px
            
            $('#editRentalModal').modal('show');
        });
    }); 
</script>

                                    
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
