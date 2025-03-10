<?php
// Include the file for database connection
require_once "../connect.php";

// Get the selected work_name from the POST request
$selectedWorkName = $_POST['workName'];

// Query to fetch the corresponding salary_per_hour from tbl_work
$sql = "SELECT salary_per_hour FROM tbl_work WHERE work_name = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $selectedWorkName);
$stmt->execute();
$result = $stmt->get_result();

// Check if the query was successful
if ($result->num_rows > 0) {
    // Fetch the salary_per_hour value
    $row = $result->fetch_assoc();
    $salary = $row['salary_per_hour'];
    echo $salary;
} else {
    echo "0"; // Default value if no salary is found
}

// Close the database connection
$stmt->close();
$conn->close();
?>
