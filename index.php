<?php
session_start();
    include ("connection.php");
    include ("functions.php");

    $user_data = check_login($con);


?>

<!DOCTYPE <!DOCTYPE html>

<html>
    <head>
        <title> My Website</title>
        
    </head>
    <body>
        <a href="logout.php"> Logout </a>

        <h1> This is the Index Page</h1>

        <br>

        Hello, <?php echo $user_data['user_name'] ?>
       
    </body>
</html>