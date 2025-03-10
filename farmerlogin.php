<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
if(isset($_POST['signup'])){
    $name = $_POST['name'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $dob = $_POST['dob'];
    
    require_once "connect.php";
    
    // Check if user with the same email and password already exists
    $check_query = "SELECT * FROM tbl_worker WHERE user_id='$email' AND password='$pass'";
    $result = $conn->query($check_query);
    
    if($result->num_rows > 0) {
        // User already exists
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Failed</title>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Registration Failed",
                    text: "User already exists.",
                    customClass: {
                        popup: 'my-popup', // Define your CSS class here
                    }
                }).then(() => {
                    window.location.href = 'farmerlogin.php';
                });
            </script>
        </body>
        </html>
        <?php
    } else {
      $randomOTP = mt_rand(100000, 999999);

require './admindash/vendor/autoload.php'; // Path to autoload.php file



$mail = new PHPMailer(true); // Passing true enables exceptions

try {
    //Server settings
    $mail->isSMTP(); // Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
    $mail->SMTPAuth   = true; // Enable SMTP authentication
    $mail->Username   = 'aswinmurali444@gmail.com'; // SMTP username
    $mail->Password   = 'bvop lvtm dfhv itpe'; // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $email = $email; // Placeholder for recipient email address
    $mail->setFrom('aswinmurali444@gmail.com', 'Aswin');
    $mail->addAddress($email, 'Green Labour hub'); // Add a recipient

    // Content
    $mail->isHTML(true); // Set email format to HTML
    $mail->Subject = 'Account Verification';
    $mail->Body    = '
    <html>
    <body>
        <h1>Account Verification</h1>

        <p>Dear '.$name.',</p>

        <p>We have received a request to verify your account associated with the email address '.$email.'. To proceed with this account, please use the following One-Time Password (OTP):</p>

        <h2>Your OTP: <span style="color: #007bff;">' . $randomOTP . '</span></h2>

        <p>Please enter this OTP on the account verification OTP. If you did not initiate this request, please ignore this email. Ensure the security of your account by not sharing this OTP with anyone.</p>

        <p>If you have any questions or concerns, please contact our support team.</p>

        <p>Thank you, <br> <span style="color: #008000;"> GREEN LABOUR HUB Team </span> </p>
    </body>
    </html>';

    if($mail->send()){
      $session_lifetime = 120; 
      session_set_cookie_params($session_lifetime);

      session_start();
      $_SESSION['otp'] = $randomOTP;
      session_regenerate_id(true);
      $_SESSION['pass'] = $pass;
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;
      $_SESSION['address'] = $address;
      $_SESSION['phone'] = $phone;
      $_SESSION['gender'] = $gender;
      $_SESSION['dob'] = $dob;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
  
</body>
<script>
        $(document).ready(function () {
    Swal.fire({
        title: 'Enter OTP',
        input: 'text',
        inputPlaceholder: 'Enter OTP',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        cancelButtonText: 'Cancel',
        timer: 120000, 
        timerProgressBar: true,
    }).then((result) => {
        if (result.isConfirmed) {
            var enteredOTP = result.value;
            $.ajax({
                url: 'compare.php',
                type: 'POST',
                data: { enteredValue: enteredOTP },
                success: function (response) {
                    if (response == "matched") {
                        Swal.fire({
                            title: 'Success',
                            text: 'OTP matched',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            window.location.href = 'login_det.php';
                        });
                    } else {
                        Swal.fire('Error', 'OTP does not match', 'error');
                    }
                }
            });
        }
    });
});

    </script>
</html>
<?php

    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

        
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
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>
<style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
  }

  .signup {
    background-color: #f4f4f4;
    padding: 8% 0;
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
  }

  .signup-content {
    display: flex;
    justify-content: space-between;
    align-items: center;
    /* Align vertically in the center */
  }

  .signup-form {
    width: 85%;
    /* Adjusted width */
    padding: 1px;
    background-color: #fff;
    border-radius: 10px;
  }

  .form-title {
    color: #333;
    font-size: 29px;
    margin-bottom: 20px;
  }

  .form-group {
    margin-bottom: 10px;
    /* Reduced margin */
  }

  label {
    font-size: 16px;
    color: #555;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"],
  input[type="tel"],
  select {
    width: calc(100% - 24px);
    /* Adjusted width */
    padding: 12px;
    margin-top: 5px;
    margin-bottom: 10px;
    /* Reduced margin */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  select {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background: url('arrow-down.png') no-repeat right #fff;
    background-size: 12px;
    padding-right: 25px;
  }

  .form-button {
    text-align: center;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  .signup-image {
    width: 88%;
    /* Adjusted width */
  }

  .signup-image img {
    width: 100%;
    border-radius: 60px;
  }

  .signup-image-link {
    color: #333;
    text-decoration: none;
    font-size: 16px;
    margin-top: 15px;
    display: inline-block;
  }

  /* Responsive styles */
  @media (max-width: 768px) {
    .signup-content {
      flex-direction: column;
      align-items: center;
    }

    .signup-form,
    .signup-image {
      width: 100%;
    }
  }

  #nameError,
  #emailError,
  #passwordError,
  #repeatPasswordError,
  #phoneError,
  #genderError,
  #dobError,#lastNameError {
    font-size: small;
    color: red;
  }
  .gender-options {
    display: flex;

}
.password-container {
        position: relative;
    }
    .password-container input[type="password"] {
        padding-right: 30px; /* Adjust as needed */
    }
    .password-container .toggle-password {
        position: absolute;
        top: 50%;
        right: 5px; /* Adjust as needed */
        transform: translateY(-50%);
        cursor: pointer;
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
            <i class="fa fa-phone" aria-hidden="true" style="color: #fff;"></i>

              <span>
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
            <a class="navbar-brand" href="index.php"><img src="logo.gif"></a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                  <a class="nav-link" href="service.php">Services</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="signup.php">Sign up</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>

    <section class="signup" style="padding-top: 8%;">
      <div class="container">
        <div class="signup-content">
          <div class="signup-image">
            <figure><img src="images/bg1.png" alt="sing up image"></figure>
          </div>
          <div class="signup-form">
            <h2 class="form-title"> Worker Sign up</h2>
            <form method="POST" action="#" class="register-form" id="register-form" onsubmit="return validateForm()">
    <div class="form-group">
        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
        <input type="text" name="name" id="name" placeholder="Your  Full Name" required onblur="validateName()" oninput="validateName()" />
        <label id="nameError"></label>
    </div>
    
    <div class="form-group">
        <label for="email"><i class="zmdi zmdi-email"></i></label>
        <input type="email" name="email" id="email" placeholder="Your Email" required onblur="validateEmail()" oninput="validateEmail()" />
        <label id="emailError"></label>
    </div>
    <div class="form-group">
    <div class="input-group">
        <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" required onblur="validatePassword()" oninput="validatePassword()" />
        <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="togglePasswordVisibility()">
            <i class="bi bi-eye" id="passwordIcon"></i>
        </button>
    </div>
    <label id="passwordError" class="form-text text-danger"></label>
</div>



    <div class="form-group">
        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password" required onblur="validateRepeatPassword()" oninput="validateRepeatPassword()" />
        <label id="repeatPasswordError"></label>
    </div>
    <div class="form-group">
        <label for="phone"><i class="zmdi zmdi-phone"></i></label>
        <input type="tel" name="phone" id="phone" placeholder="Your Phone" required onblur="validatePhone()" oninput="validatePhone()" />
        <label id="phoneError"></label>
    </div>
    <div class="form-group">
        <label for="address"></label>
        <input type="text" name="address" id="address" placeholder="Your Address" required onblur="validateAddress()" oninput="validateAddress()" />
        <label id="addressError"></label>
    </div>
   
    <div class="form-group">
        <label for="gender"><i class="zmdi zmdi-male-female"></i> Gender</label>
        <div class="gender-options pl-2">
            <input type="radio" id="male" name="gender" value="male" class="pl-3" required>
            <label for="male" class="pl-1 pr-3">Male</label>
            
            <input type="radio" id="female" name="gender" value="female" class="pl-3" required>
            <label for="female" class="pl-1">Female</label>
        </div>
        <label id="genderError"></label>
    </div>
    <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" required min="1900-01-01" max="2006-12-31" onkeydown="return false"/>
        <label id="dobError"></label>
    </div> 
    <div class="form-group form-button">
        <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
    </div>
</form>

          <script>
function validateName() {
    var fullName = document.getElementById('name').value;
    var nameError = document.getElementById('nameError');

    if (!/^[A-Z][a-zA-Z]*(?:\s[A-Z]\.?\s?[a-zA-Z]*)+$/.test(fullName)) {
        nameError.innerText = 'Invalid name format: capitalize first letter, allow spaces, periods, and initials. Limit one or two spaces for the last name.';
        return false;
    } else if (fullName.replace(/\s+/g, ' ').length > 20) {
        nameError.innerText = 'Combined length of first and last name, including space, should not exceed 20 characters.';
        return false;
    } else {
        nameError.innerText = '';
        return true;
    }
}








              function validateAddress() {
                var address = document.getElementById('address').value;
                var addressError = document.getElementById('addressError');

                // Validate address (you can customize the validation logic)
                if (address.trim() === '') {
                  addressError.innerText = 'Please enter your address.';
                  return false;
                } else {
                  addressError.innerText = '';
                  return true;
                }
              }
              function validateEmail() {
    var email = document.getElementById('email').value;
    var emailError = document.getElementById('emailError');

    // Validate email
    var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    
    if (email.trim() === '') {
        emailError.innerText = 'Email address is required.';
        return false;
    } else if (!emailRegex.test(email) || /^\d+@/.test(email) || email.endsWith('gmailc.om')) {
        emailError.innerText = 'Please enter a valid email address.';
        return false;
    } else {
        emailError.innerText = '';
        return true;
    }
}

function togglePasswordVisibility() {
    var passwordInput = document.getElementById('pass');
    var passwordIcon = document.getElementById('passwordIcon');
    
    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordIcon.classList.remove('bi-eye');
        passwordIcon.classList.add('bi-eye-slash');
    } else {
        passwordInput.type = 'password';
        passwordIcon.classList.remove('bi-eye-slash');
        passwordIcon.classList.add('bi-eye');
    }
}


              function validatePassword() {
                var password = document.getElementById('pass').value;
                var passwordError = document.getElementById('passwordError');

                // Validate password (should contain a capital letter at the beginning and special characters)
                var passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]).{8,}$/;

                if (!passwordRegex.test(password)) {
                  passwordError.innerText = 'Password should contain a capital letter at the beginning and special characters.';
                  return false;
                } else {
                  passwordError.innerText = '';
                  return true;
                }
              }

              // simple 
              function validateRepeatPassword() {
                var password = document.getElementById('pass').value;
                var repeatPassword = document.getElementById('re_pass').value;
                var repeatPasswordError = document.getElementById('repeatPasswordError');

                // Validate repeated password
                if (repeatPassword.trim() === '' || repeatPassword !== password) {
                  repeatPasswordError.innerText = 'Passwords do not match.';
                  return false;
                } else {
                  repeatPasswordError.innerText = '';
                  return true;
                }
              }

              function validatePhone() {
    var phone = document.getElementById('phone').value;
    var phoneError = document.getElementById('phoneError');

    // Validate phone number (for example, should be a valid format)
    var phoneRegex = /^[6-9]\d{9}$/;
    var repeatingDigitsRegex = /(\d)\1{4}/; // Regex to check for 5 consecutive repeating digits

    if (
        phone.trim() === '' ||                    // Check if phone number is empty
        !phoneRegex.test(phone) ||                // Check if phone number matches the format
        repeatingDigitsRegex.test(phone)         // Check if there are five consecutive repeating digits
    ) {
        phoneError.innerText = 'Please enter a valid phone number.';
        return false;
    } else {
        phoneError.innerText = '';
        return true;
    }
}

              function validateGender() {
                var gender = document.getElementById('gender').value;
                var genderError = document.getElementById('genderError');

                // Validate gender
                if (gender.trim() === '') {
                  genderError.innerText = 'Please select your gender.';
                  return false;
                } else {
                  genderError.innerText = '';
                  return true;
                }
              }
              function validateDob() {
                var dob = document.getElementById('dob').value;
                var dobError = document.getElementById('dobError');

                // Validate date of birth
                // Add your custom validation logic for date of birth

                if (dob.trim() === '') {
                  dobError.innerText = 'Please enter your date of birth.';
                  return false;
                } else {
                  dobError.innerText = '';
                  return true;
                }
              }
              function validateForm() {
                // Call individual validation functions for each field
                return (
                  validateName() &&
                  validateEmail() &&
                  validatePassword() &&
                  validateRepeatPassword() &&
                  validatePhone()
                );
              }
            </script>


          </div>

        </div>
      </div>
    </section>

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
