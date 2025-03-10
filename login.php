<?php
if(isset($_POST['signin'])){
    $your_name=$_POST['your_name'];
    $your_pass=$_POST['your_pass'];
    session_start();
    require_once "connect.php";
    $sql="SELECT user_id,user_type,status FROM tbl_login WHERE user_id='$your_name' AND password='$your_pass'";
    $result=$conn->query($sql);
    if($result->num_rows>0){
        $row=$result->fetch_assoc();
        $_SESSION['user_type']=$row['user_type'];
        $_SESSION['user_id']=$row['user_id'];
        $user_type=$row['user_type'];
        $status=$row['status'];
        if($user_type==0){
          $_SESSION['username']=$row['user_id'];
            header("location: ../glh/admindash/admin.php");
        } elseif($user_type==1){
          $_SESSION['username']=$row['user_id'];
            header("location: ../glh/admindash/farmer.php");
        } elseif($user_type==2){
            if($status==1){
              $_SESSION['username']=$row['user_id'];
                header("location: ../glh/admindash/worker.php");
            } else {
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <style>
                        .my-popup {
                            width: 500px;
                            height: 380px;
                        }
                    </style>
                </head>
                <body>
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "You Have Been Blocked...!",
                            customClass: {
                                popup: 'my-popup',
                            }
                        });
                    </script>
                </body>
                </html>
                <?php
            }
        }
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <style>
                .my-popup {
                    width: 500px;
                    height: 380px;
                }
            </style>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Incorrect credentials",
                    customClass: {
                        popup: 'my-popup',
                    }
                });
            </script>
        </body>
        </html>
        <?php
    }
}
?>


<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Green Labor Hub</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  

  <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css"
rel="stylesheet"
/>


  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  
  
</head>
<style>
 
 .signin {
    display: flex;
    flex-direction: column;
    background-color: #f4f4f4; /* Set your desired background color */
}

.signin-form {
    max-width: 400px;
    margin: 10px; /* Adjust margin as needed */
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.signin-image {
    max-width: 400px;
    margin: 10px; /* Adjust margin as needed */
    text-align: center;
    margin-top: 10px;
}

.signin-image img {
    width: 100%;
    border-radius: 80px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.signin-image img:hover {
    transform: scale(1.05); /* Adjust the scale factor for hover effect */
}

  .form-group {
    margin-bottom: 20px;
  }
  label {
    display: block;
    font-size: 16px;
    margin-bottom: 8px;
    color: #333;
  }
  .signin-image figure {
    margin: 0;
  }

  .signin-image img {
    width: 100%;
    max-width: 200px; /* Adjust the maximum width as needed */
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
  }

  .signin-image img:hover {
    transform: scale(1.05); /* Adjust the scale factor for hover effect */
  }

  .signin-form {
    flex: 1; /* Take remaining space */
  }

  .signin-image img {
    width: 100%;
    border-radius: 80px;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
  }
  

  input[type="text"],
  input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: #ffffff;
    border: none;
    padding: 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  .create-account-link {
    text-align: center;
    margin-top: 15px;
    font-size: 16px;
  }

  .create-account-link a {
    color: #3498db;
    text-decoration: none;
    font-weight: bold;
  }

  .create-account-link a:hover {
    text-decoration: underline;
  }
  .signin-content
    {
    display: flex;
    justify-content: space-around;
    align-items: center;


  }
  .signin{
    height: 100dvh;
  }
  .footer_section{
    position: fixed;
    bottom: 0px;
    width: 100vw;
}
  .hero_area{
  min-height: 100dvh;
 }
 #passwordError,
 #usernameError{
  font-size: small;
  color: red;
 }
 .dropdown-menu {
    background-color: #fff; /* Background color */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Box shadow for a subtle lift */
    border: 1px solid #ddd; /* Border color */
}

.dropdown-item {
    color: #07d403; /* Text color */
}

.dropdown-item:hover {
    background-color: #030303; /* Background color on hover */
}
.dropdown-menu {
      background-color: #fff; /* Background color */
      box-shadow: 0 4px 8px rgba(15, 12, 26, 0.1); /* Box shadow for a subtle lift */
      border: 1px solid #ddd; /* Border color */
  }
  
  .dropdown-item {
      color: #07d403; /* Text color */
  }
  
  .dropdown-item:hover {
      background-color: #faf9fcf1; /* Background color on hover */
  }
  
  
</style>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="contact_nav">
            <a href="#">
            <i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>              <span>
                9496035164
              </span>
            </a>
            <a href="#">
            <i class="fa fa-envelope-o" aria-hidden="true" style="color:#fff; "></i>
              <span>
                green_hub2024@gmail.com
              </span>
            </a>
          </div>
        </div>
      </div>
      <div class="header_bottom ">
        <div class="container-fluid ">
          <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand"  href="index.php"><img src="logo.gif">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.php"> About</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="service.php">Service</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link " href="login.php">Login</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="signup.php" id="servicesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sign up
                  </a>
                  <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                      <!-- Dropdown items go here -->
                      <a class="dropdown-item" href="farmerlogin.php">Worker</a>
                      <a class="dropdown-item" href="signup.php">Farmer</a>
                  </div>
              </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="images/bg1.png" alt="sign up image"></figure>
                    
                </div>
                
    
                <div class="signin-form">
                    <h2 class="form-title">Login</h2>
                    <form method="POST" class="register-form" action="#">
    <div class="form-group">
        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
        <input type="text" name="your_name" id="your_name" placeholder="User ID" onblur="validateUsername()" oninput="validateUsername()"/>
        <label id="usernameError"></label>
    </div>
    <div class="form-group">
        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
        <input type="password" name="your_pass" id="your_pass" placeholder="Password" onblur="validatePassword()" oninput="validatePassword()"/>
        <label id="passwordError"></label>
    </div>
    <div class="form-group form-button">
        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in" />
        <p class="forgot-password-link"><a href="forgotpassword.php">Forgot Password?</a></p>
        <p class="create-account-link">Don't have an  Worker account? <a href="farmerlogin.php">Create an Account</a></p>
        
    </div>
</form>

                </div>
            </div>
        </div>
    </section>
    <script>
  function validateUsername() {
    var username = document.getElementById('your_name').value;
    var usernameError = document.getElementById('usernameError');
    
    if (username.trim() === '') {
      usernameError.textContent = 'Please enter your username.';
    } else if (/^\d+$/.test(username)) {
      usernameError.textContent = 'Username should not contain numbers.';
    } else {
      usernameError.textContent = '';
    }
  }

  function validatePassword() {
    var password = document.getElementById('your_pass').value;
    var passwordError = document.getElementById('passwordError');

    if (password.trim() === '') {
      passwordError.textContent = 'Please enter your password.';
    } else if (password.trim().length < 5) {
      passwordError.textContent = 'Password should contain at least 5 characters.';
    } else {
      passwordError.textContent = '';
    }
  }
</script>

    
  
  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
        
        <a href="#"> Designed & Developed by : Aswin Murali, AJCE</a>
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="js/custom.js"></script>


</body>

</html>
