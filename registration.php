<?php 

    include ('server.php');

?>

<!DOCTYPE html>

<html>
    <head>
        
        <title>Registration</title>
        
    </head>
    <body>
        <div class = "container">
            <div class="header">

                <h2>Register</h2>

            </div>

            
            <form action="registration.php" method="post">

                <?php include ('errors.php'); ?>

                <!-- Prompt User to Enter username -->
                <div>
                    <label for="username">Enter Username : </label>
                    <input type="text" name="username" required>
                </div><br>

                <!-- Prompt User to Enter Email -->
                <div>
                    <label for="email">Enter Email : </label>
                    <input type="text" name="email" required>
                </div> <br>

                <!-- Prompt User to Enter password -->
                <div>
                    <label for="password">Enter Password : </label>
                    <input type="password" name="password_1" required>
                </div><br>

                <!-- Prompt User to Confirm password -->
                <div>
                    <label for="password">Re-Enter Password : </label>
                    <input type="text" name="password_2" required>
                </div><br>

                <!-- Submit Button -->
                <button type="submit" name="reg_user"> Submit </button>

                <p> Already a user? <a href="login.php"> <b>Log In</b></a></p>
            
            </form>
        </div>
    </body>
</html>