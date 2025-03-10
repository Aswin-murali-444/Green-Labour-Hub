<?php
// Include the file for database connection
require_once "../connect.php";

// Check if the payment_id, rental_id, and total_amount are set in the URL parameters
if (isset($_GET['payment_id'], $_GET['rental_id'], $_GET['total_amount'])) {
    $paymentId = $_GET['payment_id'];
    $rentalId = $_GET['rental_id'];
    $totalAmount = $_GET['total_amount'];

    // Insert payment details into the database
    $sql = "INSERT INTO payment_details (payment_id, rental_id, total_amount) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $paymentId, $rentalId, $totalAmount);

    if ($stmt->execute()) {
        // Insertion successful
        echo "<script>alert('Payment details inserted successfully.');</script>";
        echo "<script>window.location.href = 'rental.php';</script>";
        exit; // To prevent further execution
    } else {
        // Insertion failed
        echo "<script>alert('Failed to insert payment details.');</script>";
        echo "<script>window.location.href = 'rental.php';</script>";
        exit; // To prevent further execution
    }
} else {
    // Required parameters not provided
    echo "<script>alert('Required parameters not provided.');</script>";
    echo "<script>window.location.href = 'rental.php';</script>";
    exit; // To prevent further execution
}
?>
