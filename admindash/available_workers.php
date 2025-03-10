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
            <style>
              .zoom-on-hover {
    transition: font-size 0.3s;
    cursor: zoom-in; /* Set cursor to zoom-in */
}

.zoom-on-hover:hover {
    font-size: 1.2em; /* Increase font size on hover */
    cursor: zoom-in; /* Set cursor to zoom-in */
}

            </style>
    
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
                                <li class="active">
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
                                <li class="">
                                    <a href="manageposts.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                        <span class="pcoded-mtext"> Manage Post </span>
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
                    <h5 class="m-b-10" style="font-size: 24px;">Avalilable Workers</h5>
                    <p class="m-b-0" style="font-size: 18px;">Hire From Here</p>
                </div>
            </div>
        </div>
    </div>
</div>
                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="row">
        <?php
        // Assuming $conn is your database connection
      $sql = "SELECT w.user_id, w.name, w.address, w.phone, w.gender, w.dob,
                vw.state, vw.district, vw.city, vw.self_image,
                vw.work_experience, vw.language, vw.interest,
                l.status
            FROM tbl_worker w
            JOIN tbl_worker_verify vw ON w.user_id = vw.user_id
            JOIN tbl_login l ON w.user_id = l.user_id
            WHERE l.status != 0";
        // Execute SQL query to fetch worker details
        $result = $conn->query($sql);

        

        // Function to calculate age based on the date of birth
        function calculate_age($dob)
        {
            $dob = new DateTime($dob);
            $now = new DateTime();
            $age = $now->diff($dob);
            return $age->y;
        }

        // Display worker details
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Display worker details
                ?>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <!-- Assuming you have a field for the worker's photo path in your database -->
                            <!-- Adjust the path accordingly -->
                            <img src="<?php echo './documents1/' . $row['self_image']; ?>" class="rounded-circle mb-3 zoom-on-hover" alt="<?php echo $row['name']; ?>" width="100" height="100">
                            <h5 class="card-title zoom-on-hover"><?php echo $row['name']; ?></h5>
                            <p class="card-text zoom-on-hover">Age: <?php echo calculate_age($row['dob']); ?></p>
                            <p class="card-text zoom-on-hover">Address: <?php echo $row['address'] . ', ' . $row['city']; ?></p>
                            <p class="card-text zoom-on-hover">Gender: <?php echo $row['gender']; ?></p>
                            <p class="card-text zoom-on-hover">Work Experience: <?php echo $row['work_experience']; ?> </p>
                            <!-- Placeholder for salary -->
                            <p class="card-text zoom-on-hover">Interest: <?php echo $row['interest']; ?></p>
                            <p class="card-text zoom-on-hover">Language: <?php echo $row['language']; ?></p>
                            <button class="btn btn-primary mr-2 zoom-on-hover hire-worker-btn" data-user-id="<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#hireWorkerModal">Hire</button>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No workers found.";
        }
        ?>
    </div>
</div>

<!-- Modal for hiring worker -->
<!-- Modal for hiring worker -->
<div class="modal fade" id="hireWorkerModal" tabindex="-1" aria-labelledby="hireWorkerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="hireWorkerModalLabel">Hire Worker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="hireWorkerForm">
                    <input type="hidden" name="workerId"> <!-- Hidden field to store worker ID -->
                    <input type="hidden" name="userId"> <!-- Hidden field to store user ID -->
                    

                    <div class="form-group">
                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                    <div class="form-group">
    <label for="areaOfInterest">Required Work:</label>
    <select class="form-control" id="areaOfInterest" name="areaOfInterest" required>
        <option value="">Choose an Option</option>
        <?php
        $sql = "SELECT work_name, salary_per_hour FROM tbl_work WHERE status = 1;";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            ?>
            <option value="<?php echo $row['work_name']; ?>"><?php echo $row['work_name']; ?></option>
        <?php
        }
        ?>
    </select>
</div>


<div class="form-group">
    <label for="salary">Salary/Hour:</label>
    <input type="number" class="form-control" id="salary" name="salary"  required readonly>
</div>
<div class="form-group">
    <label for="numberOfDays">Number of Days:</label>
    <input type="number" class="form-control" id="numberOfDays" name="numberOfDays" min="1" pattern="[1-9][0-9]*" required value="1">
    <div id="numberOfDaysError" class="text-danger"></div>
    <small class="form-text text-muted">Please enter a positive number greater than 0.</small>
</div>

<script>
    $(document).ready(function() {
        $('#areaOfInterest').change(function() {
            var selectedWorkName = $(this).val();
            $.ajax({
                url: 'get_salary.php', // Change to the correct URL of your PHP file
                type: 'POST',
                data: {workName: selectedWorkName},
                success: function(response) {
                    $('#salary').val(response);
                },
                error: function() {
                    console.log('Error occurred while fetching salary.');
                }
            });
        });
    });
</script>


<script>
    
    $(document).ready(function() {
        $('#areaOfInterest').change(function() {
            var selectedWorkName = $(this).val();
            $.ajax({
                url: 'get_salary.php', // Change to the correct URL of your PHP file
                type: 'POST',
                data: {workName: selectedWorkName},
                success: function(response) {
                    $('#salary').val(response);
                },
                error: function() {
                    console.log('Error occurred while fetching salary.');
                }
            });
        });
    });
</script>

<div class="form-group">
            <label for="totalPayment">Total Payment:</label>
            <input type="number" class="form-control" id="totalPayment" name="totalPayment" required readonly>
        </div>



 <script>
 $(document).ready(function() {
    $('#numberOfDays').on('input', function() {
        calculateTotalPayment();
    });

    $('#areaOfInterest').change(function() {
        calculateTotalPayment();
    });
});

function calculateTotalPayment() {
    var numberOfDays = parseInt($('#numberOfDays').val());
    var salaryPerHour = parseFloat($('#salary').val());
    var totalPayment = numberOfDays * 8 * salaryPerHour; // Assuming 8 hours of work per day
    
    $('#totalPayment').val(totalPayment.toFixed(2));
}
</script>


                    <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript code for custom validation -->
<script>
    
    $(document).ready(function() {
        $('#hireWorkerForm').submit(function(event) {
            event.preventDefault();

            var numberOfDays = $('#numberOfDays').val();
            var salary = $('#salary').val();

            // Validate number of days
            if (numberOfDays <= 0) {
                $('#numberOfDaysError').text('Please enter a positive number greater than 0.');
                return;
            } else {
                $('#numberOfDaysError').text('');
            }

            

            // If all validations pass, submit the form
            this.submit();
        });
    });
</scrip>


                  
               


<!-- Include necessary libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript code to handle Hire Worker button click -->


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<!-- JavaScript code for handling form submission and Razorpay payment -->
<script>
$(document).ready(function() {
    $('#hireWorkerForm').submit(function(event) {
        event.preventDefault();

        var numberOfDays = $('#numberOfDays').val();
        var salary = $('#salary').val();

        // Validate number of days
        if (numberOfDays <= 0) {
            $('#numberOfDaysError').text('Please enter a positive number greater than 0.');
            return;
        } else {
            $('#numberOfDaysError').text('');
        }

        // Initialize Razorpay options
        var options = {
            "key": "rzp_test_Ws6NiqGNPeLRwC", // Replace with your actual test key_id
            "amount": parseFloat($('#totalPayment').val()) * 100, // Amount should be in paisa
            "currency": "INR",
            "name": "Your Company Name",
            "description": "Payment for hiring worker",
            "handler": function(response) {
                // On successful payment, submit the form with Razorpay payment ID
                $('#hireWorkerForm').append('<input type="hidden" name="razorpay_payment_id" value="' + response.razorpay_payment_id + '">');
                $('#hireWorkerForm')[0].submit();
            },
            "prefill": {
                "name": "Customer Name",
                "email": "customer@example.com",
                "contact": "Customer Phone Number"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        // Create a new Razorpay object with the options
        var rzp = new Razorpay(options);

        // Open Razorpay payment modal
        rzp.open();
    });
});
</script>





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