<?php
session_start();

if (!isset($_SESSION['forgot_password_email'])) {
    header("Location: forgotpassword.php");
    exit();
}

$email = $_SESSION['forgot_password_email'];
require 'connect.php';


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    echo "<script type='text/javascript'>console.log('1')</script>";

    if (isset($_POST['confirmpassword'])) {
        echo "<script type='text/javascript'>console.log('2')</script>";

        $newpassword = $_POST['newpassword'];
        $confirmpassword = $_POST['confirmpassword'];

        if ($newpassword == $confirmpassword) {
            echo "<script type='text/javascript'>console.log('3')</script>";

            $selectUserIdQuery = "SELECT user_id FROM tbl_login WHERE user_id = '$email'";
            $resultUserId = $conn->query($selectUserIdQuery);


            if ($resultUserId && $resultUserId->num_rows > 0) {
                $row = $resultUserId->fetch_assoc();
                $userId = $row['user_id'];

                $updateLoginQuery = "UPDATE tbl_login SET password = '$newpassword' WHERE user_id = '$userId'";
                $resultUpdateLogin = $conn->query($updateLoginQuery);

                if ($resultUpdateLogin) {
                    // Success code here
                    echo "<script type='text/javascript'>console.log('Password updated successfully')</script>";
                } else {
                    // Error code here
                    echo "<script type='text/javascript'>console.log('Failed to update password')</script>";
                }

                $_SESSION = array();
                session_destroy();
?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Password Changed Successfully</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                </head>

                <body>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "Password Changed Successfully",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(() => {
                            window.location.href = 'login.php';
                        });
                    </script>
                </body>

                </html>
            <?php

            } else {
                echo "<script type='text/javascript'>console.log('5')</script>";
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
                            title: "Something went wrong!",
                            timer: 2000,
                            showConfirmButton: false,
                        }).then(() => {
                            window.location.href = 'forgotpassword.php';
                        });
                    </script>
                </body>

                </html>
<?php
                $_SESSION['error'] = "Something went wrong";
            }
        } else {
            $_SESSION['error'] = "Passwords do not match";
            header("Location: forgotpassword.php");
            exit();
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

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .error-message {
            color: red;
        }

        /* Additional styling */
        .container {
            max-width: 500px;
            background-color: #f0f0f0; /* Change background color here */
            border-radius: 15px; /* Add border radius for better aesthetics */
            padding: 20px; /* Add padding for spacing */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Spinner -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle d-none">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <!-- End Spinner -->

        <!-- Forgot Password Section -->
        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-auto">
            <div class="text-center mb-4">
                <a href="index.html" class="text-decoration-none">
                    <h3 class="text-primary">Green Labor Hub</h3>
                </a>
                <h5>Reset Password</h5>
            </div>
            <form action="#" method="post" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">Enter new password</label>
                    <input type="password" class="form-control" name="newpassword" id="newPassword" placeholder="New Password" oninput="validatePassword()">
                    <!-- Error message for new password -->
                    <div id="password-error" class="error-message"></div>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm new password</label>
                    <input type="password" class="form-control" name="confirmpassword" id="confirmPassword" placeholder="Confirm Password" oninput="validateConfirmPassword()">
                    <!-- Error message for confirm password -->
                    <div id="confirm-password-error" class="error-message"></div>
                </div>

                <!-- Countdown timer -->
                <div id="countdown" class="mb-3 text-center" style="color: #007bff;"></div>

                <!-- Error message div -->
                <div id="errorMessage" class="mb-3 text-center"></div>

                <button type="submit" name="submit" class="btn btn-success w-100">Change Password</button>
            </form>
        </div>
        <!-- End Forgot Password Section -->
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

    <!-- Your Custom Scripts -->
    <script>
            document.addEventListener('DOMContentLoaded', function() {
                const form = document.querySelector('form');

                function showError(input, message, errorId) {
                    document.getElementById(errorId).textContent = message;
                }

                function showSuccess(errorId) {
                    document.getElementById(errorId).textContent = '';
                }

                function validateField(input, regex, message, errorId) {
                    const value = input.value.trim();
                    const isValid = regex.test(value);
                    isValid ? showSuccess(errorId) : showError(input, message, errorId);
                    return isValid;
                }

                function validatePassword() {
                    const input = document.getElementById('newPassword');
                    const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$/;
                    const message =
                        'Password must be at least 6 characters long with an uppercase letter, a digit, and a special character.';
                    return validateField(input, regex, message, 'password-error');
                }

                function validateConfirmPassword() {
                    const passwordInput = document.getElementById('newPassword');
                    const confirmPasswordInput = document.getElementById('confirmPassword');
                    const message = 'Passwords do not match.';
                    return validateField(confirmPasswordInput, new RegExp(`^${passwordInput.value}$`), message,
                        'confirm-password-error');
                }

                function validateForm() {
                    return validatePassword() && validateConfirmPassword();
                }

                form.addEventListener('submit', function(event) {
                    if (!validateForm()) {
                        event.preventDefault(); // Prevent form submission if validation fails
                    } else {

                    }
                });

                form.addEventListener('input', function(event) {
                    const inputElement = event.target;
                    switch (inputElement.id) {
                        case 'newPassword':
                            validatePassword();
                            break;
                        case 'confirmPassword':
                            validateConfirmPassword();
                            break;

                        default:
                            break;
                    }
                });
            });
        </script>
</body>

</html>
