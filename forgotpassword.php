<?php

// Start or resume the session
session_start();

// Reset session variables as needed
$_SESSION = array(); // Reset all session variables

// Destroy the session
session_destroy();

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require './admindash/vendor/autoload.php';

require 'connect.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
        $randomOTP = mt_rand(100000, 999999);
        echo "<script>console.log('" . $randomOTP . "')</script>";
        $updateSql = "UPDATE tbl_login SET Gcode = $randomOTP WHERE user_id = '$email'";

        if ($conn->query($updateSql)) {
            $_SESSION['forgot_password_email'] = $email;

            // Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);

            try {
                // Server settings
                $mail->SMTPDebug = 0;                // Enable verbose debug output
                $mail->isSMTP();                                            // Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'aswinmurali444@gmail.com';       // SMTP username
                $mail->Password   = 'bvop lvtm dfhv itpe';                  // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable explicit TLS encryption
                $mail->Port       = 587;                                    // Use 587 for STARTTLS, or 465 for implicit TLS (SMTPS)
                $mail->isHTML(true);
                // Recipients
                $mail->setFrom('aswinmurali444@gmail.com', 'Aswin');
                $mail->addAddress($email, 'Sample');  // Add a recipient

                // Set email format to HTML
                $mail->Subject = 'Password Reset OTP for Your Account';
                $mail->Body = '
                <html>
                <body>
                    <h1>Password Reset OTP</h1>
            
                    <p>Dear [User],</p>
            
                    <p>We have received a request to reset the password for your account associated with the email address <strong>[user@email.com]</strong>. To proceed with the password reset, please use the following One-Time Password (OTP):</p>
            
                    <h2>Your OTP: <span style="color: #007bff;">' . $randomOTP . '</span></h2>
            
                    <p>Please enter this OTP on the password reset page to complete the process. If you did not initiate this request, please ignore this email. Ensure the security of your account by not sharing this OTP with anyone.</p>
            
                    <p>If you have any questions or concerns, please contact our support team.</p>
            
                    <p>Thank you, <br>[Your Company Name] Team</p>
                </body>
                </html>';

                if ($mail->send()) {
                    header("Location: otp.php");
                } else {
                    echo "<script>
                            alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
                          </script>";
                }
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $updateSql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Green Labor Hub</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa; /* Set a light background color */
        }
        .container-fluid {
            min-height: 100vh; /* Set minimum height to viewport height */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background-color: #ffffff; /* Set background color for form container */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="form-container">
            <form action="#" method="post" onsubmit="return validateForm()">
                <h2 class="mb-4">Account Recovery</h2>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control form-control-lg" name="email" id="floatingInput" placeholder="name@example.com" oninput="validateUsername()">
                    <label for="floatingInput">Enter your email address</label>
                </div>

                <!-- Error message div -->
                <div id="errorMessage"></div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                        <label class="form-check-label" for="exampleCheck1">
                            Enter the email address associated with your account.
                        </label>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100 mb-4">Send OTP</button>
            </form>
            
            <!-- Back button -->
            <a href="./login.php" class="btn btn-outline-primary btn-back">&#8249; Back</a>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('floatingInput').addEventListener('input', function() {
                validateEmail();
            });
        });

        function validateEmail() {
            var emailInput = document.getElementById('floatingInput').value.trim();
            var errorMessageDiv = document.getElementById('errorMessage');

            var emailRegex = /^[a-zA-Z]+[a-zA-Z0-9._]*@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;

            if (emailInput.length < 4 || !emailRegex.test(emailInput)) {
                errorMessageDiv.textContent = 'Invalid email format';
            } else {
                errorMessageDiv.textContent = '';
            }
        }

        function validateForm() {
            var emailInput = document.getElementById('floatingInput').value.trim();
            var errorMessageDiv = document.getElementById('errorMessage');

            var emailRegex = /^[a-zA-Z]+[a-zA-Z0-9._]*@[a-zA-Z]+\.[a-zA-Z]{2,4}$/;

            if (emailInput.length < 4 || !emailRegex.test(emailInput)) {
                errorMessageDiv.textContent = 'Invalid email address';
                return false;
            }
            return true;
        }
    </script>
</body>

</html>
