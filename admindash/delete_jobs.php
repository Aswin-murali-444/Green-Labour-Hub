<?php
// delete_jobs.php

// Check if the ID parameter is set and not empty
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $postId = $_GET['id'];
    require_once "../connect.php";
    $sql="UPDATE tbl_post_job SET status='deleted' WHERE post_id=$postId;"; 

    // Check if deletion was successful
    if ($conn->query($sql)===TRUE) {
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
                
            </body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Deleted',
                    text: 'The job has been successfully deleted!',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect back to the page where the job list is displayed
                    window.location.href = 'manageposts.php';
                });
              </script>
            </html>
        <?php
    } else {
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
                
            </body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong! Unable to delete the job.',
                    showConfirmButton: false,
                    timer: 1500
                }).then(() => {
                    // Redirect back to the page where the job list is displayed
                    window.location.href = 'manageposts.php';
                });
              </script>
            </html>
        <?php
    }
} else {
    // Redirect back to the page where the job list is displayed if ID parameter is not set
    header('Location: manageposts.php');
    exit();
}
?>
