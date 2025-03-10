<?php
// Include your database connection file
require_once "../connect.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve payment data from the POST request
    $razorpay_payment_id = $_POST['razorpay_payment_id'];
    $totalPayment = $_POST['totalPayment'];
    // Add more data as needed

    // Insert payment data into tbl_paymenthire
    $sql = "INSERT INTO tbl_paymenthire (razorpay_payment_id, payment_price) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $razorpay_payment_id, $totalPayment); // Assuming payment_price is a decimal type

    // Execute the statement
    if ($stmt->execute()) {
        // Insert successful
        $response['success'] = true;
    } else {
        // Insert failed
        $response['success'] = false;
        $response['error'] = $conn->error; // Get the specific error message
    }

    // Close statement
    $stmt->close();

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>

