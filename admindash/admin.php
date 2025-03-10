<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==0){
            ?>
                <?php
    
    $user_id=$_SESSION['user_id'];
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


    <script>
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            // Redirect the user to the login page if accessed through history
            window.location.href = "../logout.php";
      }
</script>
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
                                    <img src="assets/images/admin-3d-illustration-icon-png.webp" class="img-radius" alt="User-Profile-Image">
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
                                    <img class="img-80 img-radius" src="assets/images/admin-3d-illustration-icon-png.webp"
                                        alt="User-Profile-Image">
                                    <div class="user-details">
                                        <span id="more-details">Admin<i class="fa fa-caret-down"></i></span>
                                    </div>
                                </div>
                                
                                <div class="main-menu-content">
                                    <ul>
                                        <li class="more-details">
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
                                <li class="active">
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
    <li class="pcoded-hasmenu "> <!-- Add 'active' class to make 'Manage Works' active -->
        <a href="javascript:void(0)" class="waves-effect waves-dark">
            <span class="pcoded-micon"><i class="ti-dropbox-alt"></i><b>BC</b></span>
            <span class="pcoded-mtext"> Manage Works </span>
            <span class="pcoded-mcaret"></span>
        </a>
        <ul class="pcoded-submenu show"> <!-- Add 'show' class to make submenu visible -->
            <li class=""> <!-- Add 'active' class to make 'Add Work' active -->
                <a href="addwork.php" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                    <span class="pcoded-mtext">Add Work</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="">
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
                <li class="pcoded-hasmenu">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-shopping-cart"></i><b>RM</b></span>
                        <span class="pcoded-mtext">Manage Rentals</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="addrental.php" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                                <span class="pcoded-mtext">Add Rental</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
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
                                    <a href="admin.php" class="waves-effect waves-dark">
                                        <span class="pcoded-micon"><i class="ti-export"></i><b></b></span>
                                        <span class="pcoded-mtext"> Equipment Rental</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="">
                                    <a href="admin.php" class="waves-effect waves-dark">
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
                    <h5 class="m-b-10" style="font-size: 24px;">Dashboard</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Welcome To Green labour Hub </p>
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
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: #3b5997; color: white; font-weight: bold;">
                        Verified Workers
                    </div>
                    <div class="card-body">
                        <!-- Content for Registered Workers -->
                        <?php
                        $sql = "SELECT COUNT(*) AS total_workers FROM tbl_worker_verify where status=1";
                        $result = mysqli_query($conn, $sql);
                        
                        // Check if there is any result
                        if (mysqli_num_rows($result) > 0) {
                            // Get the total number of registered workers
                            $row = mysqli_fetch_assoc($result);
                            $total_workers = $row['total_workers'];
                            
                            // Display the total number of registered workers
                            echo "<h3 style='font-size: 16px;'>Total Registered Workers: " . $total_workers . "</h3>";

                        } else {
                            echo "No registered workers found";
                        }
                        ?>
                    
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: #dc3545; color: white; font-weight: bold;">
                        Deactivated Workers
                    </div>
                    <div class="card-body">
                        <!-- Content for Deactivated Workers -->
                        <?php
                         $sql = "SELECT COUNT(*) AS total_workers FROM tbl_login where status =0";
                         $result = mysqli_query($conn, $sql);
                         
                         // Check if there is any result
                         if (mysqli_num_rows($result) > 0) {
                             // Get the total number of registered workers
                             $row = mysqli_fetch_assoc($result);
                             $total_workers = $row['total_workers'];
                             
                             // Display the total number of registered workers
                             echo "<h3 style='font-size: 16px;'>Total Deactivated Workers: " . $total_workers . "</h3>";
 
                         } else {
                             echo "No registered workers found";
                         }
                         ?>
                        
                       
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-header" style="background-color: #007bff; color: white; font-weight: bold;">
                         Registered Farmers
                    </div>
                    <div class="card-body">
                    <?php
                         $sql = "SELECT COUNT(*) AS total_workers FROM tbl_farmer";
                         $result = mysqli_query($conn, $sql);
                         
                         // Check if there is any result
                         if (mysqli_num_rows($result) > 0) {
                             // Get the total number of registered workers
                             $row = mysqli_fetch_assoc($result);
                             $total_workers = $row['total_workers'];
                             
                             // Display the total number of registered workers
                             echo "<h3 style='font-size: 16px;'>Total Registered Farmers: " . $total_workers . "</h3>";
 
                         } else {
                             echo "No registered workers found";
                         }
                         ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                            <div class="table-responsive">
                                        <table class="table table-bordered table-striped "  >
<thead class="thead-dark">
    <!-- Header row -->
    <div style="background-color: #3b5997; padding: 10px;">
    <h1 style="color: white; font-weight: bold; font-size: 24px;">Registered Workers</h1>
</div>

</div>
</div>
</thead>


                                                <tr>
                                                    <th scope="col">Sl No</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Photo</th>
                                                    <th scope="col">User ID</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">DOB</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Status</th>
                                                    
                                                </tr>
                                            </thead>
                                            <!-- Table body -->
                                            <tbody >
                                                <?php
                $sql = "SELECT v.user_id, v.state,v.district,v.city, v.govtdoc, v.education_qualification, v.work_experience, v.interest, v.reference, v.language,v.status, w.phone, w.dob, w.address, w.name, w.gender, v.self_image
                        FROM tbl_worker_verify AS v
                        JOIN tbl_worker AS w ON v.user_id = w.user_id";
                require_once "../connect.php";
                $result = $conn->query($sql);
                $sl=1;
                if ($result->num_rows > 0) {
                    while ($rows = $result->fetch_assoc()) {
                        $_SESSION['username']=$rows['user_id'];
                ?>
                                                <tr>     
                                                    <td class="align-middle">
                                                        <?php echo $sl; ?>
                                                    </td>
                                                    <td class="align-middle"><a href="view_more.php?user_id=<?php echo $rows['user_id'];?>"><font color="black"><?php echo $rows['name']; ?></font></a>
                                                        
                                                    </td>
                                                    <td class="align-middle"><a href="view_more.php?user_id=<?php echo $rows['user_id'];?>">
                                                        <?php echo "<img src='./documents1/{$rows['self_image']}' alt='Self Image' width='80' height='80' style='border-radius: 50%;'>"; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php echo $rows['user_id']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php echo $rows['gender']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php echo $rows['dob']; ?>
                                                    </td>
                                                    <td class="align-middle">
                                                        <?php echo $rows['phone']; ?>
                                                    </td>
                                                    
                                                    <?php if($rows['status'] == 1): ?>
    <td class="align-middle">
        <a href="deactivate.php?user_id=<?php echo $rows['user_id'];?>" class="btn btn-danger btn-sm">Deactivate</a>
    </td>
<?php else: ?>
    <td class="align-middle">
        <a href="activate.php?user_id=<?php echo $rows['user_id'];?>" class="btn btn-success btn-sm">Activate</a>
    </td>
<?php endif; ?>

                                                        </td>
                                                    
                                                    </td>
                                                    
                                                    <?php $sl=$sl+1; ?>
                                                </tr>
                                                <?php
                    }
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
