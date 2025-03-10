<?php
require_once "../connect.php";

if(isset($_POST['work_id'])) {
    $workId = $_POST['work_id'];
    
    // Prepare and execute the SQL query to fetch options based on the selected workId
    $sql = "SELECT experience FROM tbl_work WHERE work_id = $workId";
    $result = $conn->query($sql);
    
    // Check if any options are fetched
    if ($result->num_rows > 0) {
        // Output options dynamically
        while ($row = $result->fetch_assoc()) {
            echo '<option>' . $row['experience'] . '</option>';
        }
    } else {
        // Output a default message if no options are found
        echo '<option>No experience found</option>';
    }
} else {
    // Output an error message if work_id parameter is not provided
    echo '<option>Error: Work ID not provided</option>';
}
?>
