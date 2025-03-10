<?php
// Include your database connection file
require_once "../connect.php";

if(isset($_GET['type'])) {
    $type = $_GET['type'];
    
    // Fetch the corresponding salary from tbl_work based on the selected employment type
    $sql = "SELECT salary_per_hour FROM tbl_work WHERE work_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $type);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['salary_per_hour'];
    } else {
        echo "Salary not found";
    }
} else {
    echo "Type parameter not provided";
}

// Close database connection
$conn->close();
?>
