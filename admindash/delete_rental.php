<?php
// Check if the rental ID is provided via GET request
if(isset($_GET['id'])) {
    // Include your database connection file
    require_once "../connect.php";
    
    // Sanitize the rental ID
    $rentalId = $_GET['id'];
    
    // Prepare and execute SQL delete statement
    $sql = "UPDATE tbl_rental SET status=0 WHERE rental_id=$rentalId";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the page where rentals are displayed
        header("Location: managerentals.php");
        exit();
    } else {
        // Handle errors
        echo "Error deleting record: " . $conn->error;
    }
    
    // Close database connection
    $conn->close();
} else {
    // Redirect back to the page where rentals are displayed if rental ID is not provided
    header("Location: managerentals.php");
    exit();
}
?>
