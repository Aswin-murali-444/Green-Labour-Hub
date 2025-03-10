<?php
session_start();

if (!isset($_SESSION['forgot_password_email'])) {
    header("Location: forgotpassword.php");
    exit; // Terminate script execution after redirection
}

$email = $_SESSION['forgot_password_email'];

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
    if (isset($_POST['otp'])) {
        $otp = $_POST['otp'];
        $otpCheck = ""; // Define $otpCheck variable before the while loop
        $checkSql = "SELECT * FROM tbl_login WHERE user_id = '$email'";
        $result = $conn->query($checkSql);

        // Check if the query was successful
        if ($result) {
            // Fetch the data from the result set
            while ($row = $result->fetch_assoc()) {
                // Output the email to the console
                // Note: The correct syntax is console.log, not console . log
                $otpCheck = $row['Gcode'];
                echo "<script>console.log('" . $row['Gcode'] . "');</script>";
            }
        } else {
            // Handle the case where the query was not successful
            echo "<script>alert('Query failed: " . $conn->error . "');</script>";
        }
        if ($otpCheck == $otp) {
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>
            <body>
                <script>
                    Swal.fire({
                        icon: "success",
                        title: "OTP verified",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = 'resetpassword.php';
                    });
                </script>
            </body>

            </html>
            <?php // Terminate script execution after successful OTP verification
        }
        else{
            ?>
 <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            </head>

            <body>
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "OTP Invalid",
                        timer: 2000,
                        showConfirmButton: false,
                    }).then(() => {
                        window.location.href = 'otp.php';
                    });
                </script>
            </body>

            </html>
            <?php
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Green Labor Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        /* Custom CSS styles */
        #errorMessage {
            color: red;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6 col-lg-5 col-xl-4">
                <div class="card border-secondary shadow-lg p-4">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <a href="index.html" class="text-decoration-none">
                                <h3 class="text-primary">Green Labor Hub</h3>
                            </a>
                            <h5 class="mb-0">OTP</h5>
                        </div>
                        <form action="#" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <input type="number" class="form-control" name="otp" id="floatingInput" placeholder="Enter your OTP" oninput="validateOtp()">
                                <small id="errorMessage" class="form-text text-danger"></small>
                            </div>
                            <div id="countdown" class="mb-3" style="color: #007bff;"></div>
                            <div class="form-group mb-3">
                                <label class="form-check-label" for="exampleCheck1" style="color: lightgreen;">
                                    Enter the OTP received in your registered Email Address!
                                </label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-info btn-block">Submit OTP</button>
                        </form>
                        <a href="./login.php" class="btn btn-outline-primary btn-block">&#8249; Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Script -->
    <script>
        // Set the countdown duration in seconds
        const countdownDuration = 150;

        // Initialize the countdown
        let countdown = countdownDuration;

        // Function to update the countdown timer
        function updateCountdown() {
            const minutes = Math.floor(countdown / 60);
            const seconds = countdown % 60;
            document.getElementById('countdown').innerHTML = `Time remaining: ${minutes}m ${seconds}s`;

            if (countdown === 0) {
                window.location.href = "./forgotpassword.php";
                sessionStorage.clear(); // Clear all session storage
            } else {
                countdown--;
                setTimeout(updateCountdown, 1000); // Update every second
            }
        }

        // Start the countdown when the page loads
        updateCountdown();

        // Function to validate OTP
        function validateOtp() {
            var otpInput = document.getElementById('floatingInput').value.trim();
            var errorMessageDiv = document.getElementById('errorMessage');

            var otpRegex = /^\d{6}$/;

            if (!otpRegex.test(otpInput)) {
                errorMessageDiv.textContent = 'Enter valid 6 digit OTP';
            } else {
                errorMessageDiv.textContent = '';
            }
        }

        // Function to validate form submission
        function validateForm() {
            var otpInput = document.getElementById('floatingInput').value.trim();
            var errorMessageDiv = document.getElementById('errorMessage');

            var otpRegex = /^\d{6}$/;

            if (!otpRegex.test(otpInput)) {
                errorMessageDiv.textContent = 'Enter valid 6 digit OTP';
                return false;
            } else {
                errorMessageDiv.textContent = '';
                return true;
            }
        }
    </script>
</body>

</html>
