<?php

require_once "../connect.php";

if(isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // Prepare and execute the SQL query to delete the entry with the specified id
    $sql = "UPDATE tbl_work SET status=0 WHERE work_id = $id";
    
    if ($conn->query($sql) === TRUE) {
        // Return a success message or status code
        echo json_encode(['success' => true, 'message' => 'Entry deleted successfully']);
    } else {
        // Return an error message or status code
        echo json_encode(['success' => false, 'message' => 'Error deleting entry: ' . $conn->error]);
    }
} else {
    // Return an error message if id parameter is not provided
    echo json_encode(['success' => false, 'message' => 'ID parameter not provided']);
}
?>
