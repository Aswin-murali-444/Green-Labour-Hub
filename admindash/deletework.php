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
    <li class="pcoded-hasmenu active"> <!-- Add 'active' class to make 'Manage Works' active -->
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
            <li class="active">
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
                    <h5 class="m-b-10" style="font-size: 24px;">Manage Work</h5>
                    <p class="m-b-0" style="font-size: 18px;"> Delete Work </p>
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
                <table class="table">
    <thead>
        <tr>
            <th>Work Name</th>
            <th>Salary/Hour</th>
            <th>Experience</th>
            <th>Action</th> <!-- Add a column for actions -->
        </tr>
    </thead>
    <tbody>
        <?php
            $sql = "SELECT * FROM tbl_work WHERE status = 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
        <tr>
    <td><?php echo $row['work_name']; ?></td>
    <td><?php echo $row['salary_per_hour']; ?></td>
    <td><?php echo $row['experience']; ?></td>
    <td>
        <!-- Delete icon -->
        <button class="btn btn-danger delete-btn" data-id="<?php echo $row['work_id']; ?>">
            <i class="fa fa-trash"></i> <!-- Trash icon -->
        </button>
    </td>
</tr>

        <?php
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
        ?>
    </tbody>
</table>

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
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
$(document).ready(function(){
    $('.delete-btn').click(function(){
        var id = $(this).data('id');
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'delete_work.php',
                    method: 'POST',
                    data: { id: id },
                    success: function(response){
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your entry has been deleted.',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        }).then(function() {
                            // Reload the page or update the table
                            location.reload();
                        });
                    },
                    error: function(xhr, status, error){
                        console.error(xhr.responseText);
                    }
                });
            }
        });
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