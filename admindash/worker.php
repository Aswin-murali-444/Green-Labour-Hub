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

<body>


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
                                <li class="active">
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
                    <h5 class="m-b-10" style="font-size: 24px;">Dashboard</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Welcome as Worker </p>
                </div>
            </div>
        </div>
    </div>
</div>

                        <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                        <!-- Main-body start -->
<div class="main-body">
    <div class="container">
        <h2 class="text-center">My Rental Details</h2>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <?php
                // Include the file for database connection
                require_once "../connect.php";

                // Fetch payment details along with rental information
                $sql = "SELECT 
                            pd.payment_id,
                            re.rental_id,
                            re.rental_image,
                            re.quantity AS rental_equipment_quantity,
                            pd.total_amount,
                            pd.payment_date
                        FROM 
                            payment_details pd
                        JOIN 
                            tbl_rental re ON pd.rental_id = re.rental_id";
                $result = $conn->query($sql);
                ?>

                <!-- Display fetched data in a table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-blue">
                            <tr>
                                <th scope="col">Sl. No.</th>
                                <th scope="col">Payment ID</th>
                                <th scope="col">Rental Image</th>
                                <th scope="col">Rental Equipment Quantity</th>
                                <th scope="col">Total Amount</th>
                                <th scope="col">Payment Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $serialNumber = 1;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $serialNumber++ . "</td>";
                                    echo "<td>" . $row["payment_id"] . "</td>";
                                    echo "<td><img src='" . $row["rental_image"] . "' alt='Rental Image' class='img-fluid'></td>";
                                    echo "<td>" . $row["rental_equipment_quantity"] . "</td>";
                                    echo "<td>" . $row["total_amount"] . "</td>";
                                    echo "<td>" . $row["payment_date"] . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>No payment details found</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


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
