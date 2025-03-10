<?php
    session_start();
    require_once "../connect.php";
    if(isset($_SESSION['username'])){
        $user_type=$_SESSION['user_type'];
        if($user_type==0){
            ?>
                <?php
    
    $user_id=$_SESSION['user_id'];
    ?>
<?php
    if(isset($_GET['user_id'])){
        $user_id=$_GET['user_id'];
        require_once "../connect.php";
        $s="SELECT name FROM tbl_worker WHERE user_id='$user_id';";
        $r=$conn->query($s);
        $ro=$r->fetch_assoc();
        $name=$ro['name'];
        $sql="UPDATE tbl_worker_verify SET status=1 WHERE user_id='$user_id';";
        $sql1="UPDATE tbl_login SET status=1 WHERE user_id='$user_id';";
        $conn->query($sql);
        $conn->query($sql1);

        require 'vendor/autoload.php';
               
                $mail = new PHPMailer\PHPMailer\PHPMailer();
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'aswinmurali444@gmail.com';
                $mail->Password = 'bvop lvtm dfhv itpe';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                $mail->setFrom('aswinmurali444@gmail.com', 'Green labour hub');
                $mail->addAddress($user_id, $name);
                $mail->Subject = 'Green labor';
                $mail->Body = 'Green Labor Hub GLH' . "\r\n";
                $mail->Body .= 'Your account is activated .' . "\r\n";
                $mail->Body .= 'Please login.' . "\r\n";
                $mail->AltBody = 'Your account activated';
                
                if (!$mail->send()) {
                    echo "<script>alert('Error');</script>";
                }
                else
                {
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
  icon: "success",
  title: "Activated...!",
  showConfirmButton: false,
  timer: 1500
});

// Redirect after timeout
setTimeout(function() {
  window.location.href = 'admin.php'; // Replace 'selected_page.php' with the URL of the page you want to redirect to
}, 1500); // Timeout in milliseconds (same as the timer value in SweetAlert)

                    </script>
                    </html>

                    <?php
                }
        
        
        ?>
      
        <?php
    }
?>
<?php 
    }else{
        echo "<script>window.location.href='../index.php'</script>";
    } 
    ?>
            <?php
        }
        else{
            echo "<script>window.location.href='../index.php'</script>";
            
        }


?>
