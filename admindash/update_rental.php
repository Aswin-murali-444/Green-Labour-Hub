<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    require_once "../connect.php";
    
    // Retrieve form data
    $rentalId = $_POST['rental_id'];
    $rentalEquipments = $_POST['rental_equipments'];
    $rentalPrice = $_POST['rental_price'];
    $quantity = $_POST['quantity'];
    
    // Retrieve the existing image path from the database
    $sql_select_image = "SELECT rental_image FROM tbl_rental WHERE rental_id = $rentalId";
    $result_select_image = $conn->query($sql_select_image);
    if ($result_select_image->num_rows > 0) {
        $row_select_image = $result_select_image->fetch_assoc();
        $existingImage = $row_select_image['rental_image'];
    } else {
        // Handle the case where the rental ID is not found
        // You may display an error message or handle it as per your application's logic
    }

    // Check if a new image is uploaded
    if ($_FILES['rental_image']['size'] > 0) {
        // Upload the new image
        $targetDir = "./uploads/";
        $targetFile = $targetDir . basename($_FILES["rental_image"]["name"]);
        if (move_uploaded_file($_FILES["rental_image"]["tmp_name"], $targetFile)) {
            // File upload successful, get the file path
            $rentalImage = $targetFile; // Update the file path to use the full path
        } else {
            // File upload failed
            echo "Error uploading file.";
            exit();
        }
    } else {
        // If no new image uploaded, retain the existing image path
        $rentalImage = $existingImage;
    }

    // Check if the rental equipment name already exists
    $check_sql = "SELECT * FROM tbl_rental WHERE rental_equipments = '$rentalEquipments' AND rental_id != $rentalId";
    $check_result = $conn->query($check_sql);
    if ($check_result->num_rows > 0) {
        // If the rental equipment already exists, display an error message
        echo "Rental equipment with name '$rentalEquipments' already exists.";
        exit();
    }
    
    // Prepare and execute SQL update statement
    $sql = "UPDATE tbl_rental SET rental_equipments='$rentalEquipments', rental_price='$rentalPrice', quantity='$quantity', rental_image='$rentalImage' WHERE rental_id=$rentalId";
    if ($conn->query($sql) === TRUE) {
        // Redirect to the page where the rentals are displayed
        header("Location: managerentals.php");
        exit();
    } else {
        // Handle errors
        echo "Error updating record: " . $conn->error;
    }
    
    // Close database connection
    $conn->close();
}
?>
