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
<style>
        .card-img-top {
        object-fit: cover;
        height: 200px; /* Set a fixed height for all images */
        .card-img-top {
        transition: transform 0.3s ease;
    }

    .card-img-top:hover {
        transform: scale(1.1); /* Adjust the scale factor as needed */
    }
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
                                            <i class="ti-user"></i>  View Profile
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
                                <li class="active">
                                    <a href="#" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-truck"></i><b>D</b></span>
                                        <span class="pcoded-mtext">Rent Equipments </span>
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
                    <h5 class="m-b-10" style="font-size: 24px;">Rental Page</h5>
                    <p class="m-b-0" style="font-size: 18px;">Agricultural Equipments Rental</p>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="container">
    <h1 class="mt-5 mb-4">Rental Equipments</h1>
    <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php
// Include the file for database connection
require_once "../connect.php";

// Query to fetch rental items from tbl_rental
$sql = "SELECT * FROM tbl_rental WHERE status = 1"; // Assuming status 1 means the item is active
$result = mysqli_query($conn, $sql);

// Check if there are any results
if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output rental item card
        ?>
        <div class="col">
            <div class="card h-100">
                <img src="<?php echo $row['rental_image']; ?>" class="card-img-top img-fluid" alt="<?php echo $row['rental_equipments']; ?>" style="max-height: 200px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['rental_equipments']; ?></h5>
                    <p class="card-text">Price: ₹<?php echo $row['rental_price']; ?> | Quantity: <span id="quantity_<?php echo $row['rental_id']; ?>"><?php echo $row['quantity']; ?></span></p>
                    <button class="btn btn-primary rent-now" data-id="<?php echo $row['rental_id']; ?>" data-price="<?php echo $row['rental_price']; ?>">Rent Now</button> <!-- Add data attributes to store rental item ID and price -->
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo "<p>No active rental items found.</p>";
}

// Close the database connection
mysqli_close($conn);
?>
</div>
</div>

<!-- Include necessary libraries -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- JavaScript code to handle Rent Now button click -->
<!-- Modal HTML -->
<div id="quantityModal" class="modal fade" tabindex="-1" aria-labelledby="quantityModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quantityModalLabel">Enter Quantity</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="number" id="quantityInput" class="form-control" placeholder="Enter quantity" min="1" oninput="validity.valid||(value='');" required>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmQuantity">Confirm</button>
            </div>
        </div>
    </div>
</div>


<!-- Updated JavaScript code -->
<!-- Include jQuery -->

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript code -->
<script>
    $(document).ready(function() {
        $('.rent-now').click(function(event) {
            event.preventDefault();
            
            // Show the quantity modal
            $('#quantityModal').modal('show');
            
            // Set rental ID and price in modal data attributes
            var rentalId = $(this).data('id');
            var rentalPrice = $(this).data('price');
            $('#quantityModal').data('rental-id', rentalId);
            $('#quantityModal').data('rental-price', rentalPrice);
        });

        // Confirm button click handler in modal
        $('#confirmQuantity').click(function() {
            var quantity = $('#quantityInput').val();
            if (quantity === null || quantity === "" || isNaN(quantity) || parseInt(quantity) <= 0) {
                // If quantity is not valid or user cancels, hide the modal and exit
                $('#quantityModal').modal('hide');
                return;
            }

            var rentalId = $('#quantityModal').data('rental-id');
            var rentalPrice = $('#quantityModal').data('rental-price');

            // Calculate total amount
            var totalAmount = rentalPrice * quantity;

            // Update total payment field with the calculated amount
            $('#totalPayment').val(totalAmount);

            // Initialize Razorpay options
            var options = {
                "key": "rzp_test_Ws6NiqGNPeLRwC",
                "amount": totalAmount * 100, // Convert to currency subunits (e.g., paisa for INR)
                "currency": "INR",
                "name": "Green Labor Hub",
                "description": "Rent for Equipment (" + quantity + " units)", // Include quantity in the description
                "image": "https://example.com/logo.png", // URL to your logo
                "theme": {
                    "color": "#3399cc" // Customize theme color
                },
                "handler": function(response) {
                    // On successful payment, redirect to the payment details page
                    window.location.href = "payment_details.php?payment_id=" + response.razorpay_payment_id + "&rental_id=" + rentalId + "&total_amount=" + totalAmount;
                }
            };

            // Create a new Razorpay object with the options
            var rzp1 = new Razorpay(options);

            // Open Razorpay payment widget
            rzp1.open();

            // Hide the modal after initiating payment
            $('#quantityModal').modal('hide');
        });

        // Ajax to fetch rental price based on quantity
        $('#quantityInput').on('input', function() {
            var quantity = $(this).val();
            var rentalId = $('#quantityModal').data('rental-id');
            // Perform AJAX request to fetch price for the specified quantity
        });
    });
</script>

<!-- Include the modal content -->
<div id="modalContent"></div>

<script>
    // Load the modal content dynamically
    $(document).ready(function() {
        $('#modalContent').load('payment_details_modal.html');
    });
</script>

<?php
// Include the file for database connection

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are present
    if (isset($_POST['quantity'], $_POST['rental_id'], $_POST['total_payment'])) {
        $quantity = $_POST['quantity']; // Corrected field name
        $rentalId = $_POST['rental_id'];
        $totalPayment = $_POST['total_payment'];

        // Query to update the quantity in the database
        $sql = "UPDATE tbl_rental SET quantity = quantity - $quantity WHERE rental_id = $rentalId";

        // Execute the update query
        if (mysqli_query($conn, $sql)) {
            // If the update is successful, you can proceed with further actions
            // For example, you can insert booking details into another table or display a success message
            echo json_encode(['success' => true]);
            exit;
        } else {
            // If the update fails, return an error response
            echo json_encode(['success' => false, 'error' => 'Failed to update quantity: ' . mysqli_error($conn)]);
            exit;
        }
    } else {
        // If any required field is missing, return an error response
        echo json_encode(['success' => false, 'error' => 'Missing required fields.']);
        exit;
    }
}
?>







                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="assets/js/jquery/jquery.min.js "></scrip>
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
