
<?php
session_start();
if(isset($_SESSION['otp'])){
    if($_SESSION['otp']=="matched"){
        require "connect.php";
        $pass=$_SESSION['pass'];
        $email=$_SESSION['email'];
        $name=$_SESSION['name'];
        $address=$_SESSION['address'];
        $phone=$_SESSION['phone'];
        $gender=$_SESSION['gender'];
        $dob=$_SESSION['dob'];

        $sql = "INSERT INTO tbl_worker (user_id, phone, dob, address, name, password, gender) VALUES ('$email', '$phone', '$dob', '$address', '$name', '$pass', '$gender')";
        
        if($conn->query($sql)) {
            $sql1 = "INSERT INTO tbl_login (user_id, password, user_type) VALUES ('$email', '$pass', 2)";
            if($conn->query($sql1)) {
                ?>
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Registration Success</title>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                </head>
                <body>
                    <script>
                        Swal.fire({
                            icon: "success",
                            title: "Registration Success",
                            text: "You have been successfully registered.",
                            customClass: {
                                popup: 'my-popup', // Define your CSS class here
                            }
                        }).then(() => {
                            window.location.href = 'login.php';
                        });
                    </script>
                </body>
                </html>
                <?php
                exit();
            } else {
                echo "Error: " . $sql1 . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        session_unset();
        session_destroy();
        header("Location: login.php");
    }else{
         require "logout.php";
            
    }
}else{
     require "logout.php";
   
}
?>


