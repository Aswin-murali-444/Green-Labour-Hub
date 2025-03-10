<?php
session_start();

// Check if the user is logged in and the session is not already destroyed
if (isset($_SESSION['username']) && session_status() === PHP_SESSION_ACTIVE) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: login.php");
exit();
?>
