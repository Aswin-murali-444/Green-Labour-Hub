<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Farmer :
    <?php
    session_start();
    echo $_SESSION['user_id'];
    ?>
    <button>
    <a href="logout.php"> Logout</a>
</button>
</body>
</html>