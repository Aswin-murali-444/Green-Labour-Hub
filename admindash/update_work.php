<?php
session_start();
require_once "../connect.php";

if(isset($_SESSION['username'])){
    $user_type=$_SESSION['user_type'];
    if($user_type==0){

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $workName = isset($_POST['work_name']) ? $_POST['work_name'] : '';
            $salaryPerHour = isset($_POST['salary_per_hour']) ? $_POST['salary_per_hour'] : '';
            $experience = isset($_POST['experience']) ? $_POST['experience'] : '';

            // Check if the work name already exists
            $check_sql = "SELECT * FROM tbl_work WHERE work_name = '$workName'";
            $check_result = $conn->query($check_sql);

            if ($check_result->num_rows > 0) {
                // Work name already exists, display error message using SweetAlert
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <style>
                        /* Blue and green theme */
                        .swal-title {
                            color: #007bff; /* Blue */
                        }

                        .swal-icon-error .swal-icon {
                            border-color: #dc3545; /* Red */
                        }

                        .swal-icon-error .swal-icon::before {
                            background-color: #dc3545; /* Red */
                        }
                    </style>
                </head>
                <body>
                    <script>
                        // Display SweetAlert with the error message
                        Swal.fire({
                            title: 'Green Labor Hub',
                            text: "Work entry with name '<?php echo $workName; ?>' already exists.",
                            icon: 'error'
                        }).then(function() {
                            // Redirect the user after closing the alert
                            window.location.href = 'updatework.php';
                        });
                    </script>
                </body>
                </html>
                <?php
                exit; // Stop further execution of PHP code
            }

            // If the work name doesn't exist, proceed with inserting the new entry
            $sql = "INSERT INTO tbl_work (work_name, salary_per_hour, experience) VALUES ('$workName', '$salaryPerHour', '$experience')";
                
            // Execute the query
            if ($conn->query($sql) === TRUE) {
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <style>
                        /* Blue and green theme */
                        .swal-title {
                            color: #007bff; /* Blue */
                        }

                        .swal-icon-success .swal-icon {
                            border-color: #28a745; /* Green */
                        }

                        .swal-icon-success .swal-icon::before {
                            background-color: #28a745; /* Green */
                        }
                    </style>
                </head>
                <body>
                    <script>
                        // Display SweetAlert for successful addition
                        Swal.fire({
                            title: 'Green Labor Hub',
                            text: 'Work added successfully',
                            icon: 'success',
                            showConfirmButton: false,
                            timer: 2000 // Disappear after 2 seconds
                        }).then(function() {
                            // Redirect the user after closing the alert
                            window.location.href = 'updatework.php';
                        });
                    </script>
                </body>
                </html>
                <?php
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>
