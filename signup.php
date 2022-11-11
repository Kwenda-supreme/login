<?php
session_start();

    include ("connection.php");
    include ("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $user_name = $_POST['username'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {   
            $user_id = random_num(20);
            $query = "INSERT into users (user_id,user_name,password) 
            VALUES ('$user_id', '$user_name', '$password') ";

            mysqli_query($con, $query);
            header("Location: login.php");
            die;

        }else
        {
            echo "Please Enter valid Username or password";
        }
    }



?>

<!DOCTYPE <!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Sign Up</title>
        
    </head>
    <body>
       <div>
           <h1>Sign Up Page</h1> 
           <form method="post"> 
               <spam> Username: </spam> <input type="text" name="username"><br><br>
               <spam> Password: </spam> <input type="password" name="password"><br><br>

               <input type="submit" value="Sign Up"><br><br>

               <a href="login.php">Click to Login</a>
           </form>
       </div>
    </body>
</html>