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
            
            $query = "SELECT * FROM users WHERE user_name = '$user_name' limit 1";
            $result = mysqli_query($con, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0){

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password){

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: index.php");
                        die;

                    }

                    else
                    {
                        echo "Wrong Username or password";
                    }
                }


            }
            

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
        <title> Login </title>
        
    </head>
    <body>
       <div>
           <h1>Login Page</h1>
           <form method="post"> 
               <spam> Username: </spam> <input type="text" name="username"><br><br>
               <spam> Password: </spam> <input type="text" name="password"><br><br>

               <input type="submit" value="Login"><br><br>

               <a href="signup.php">Click to Signup</a>
           </form>
       </div>
    </body>
</html>