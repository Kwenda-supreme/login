<?php

// Start user session
session_start();

$username = "";
$email = "";

$errors = array();

//connect db
$db = mysqli_connect('localhost', 'root', '', 'login_tutorial') or
 die("Could not connect to database");

 //Register Users
 $username = mysqli_real_escape_string($db, $_POST['username']);
 $email = mysqli_real_escape_string($db, $_POST['email']);
 $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
 $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//form validation
if(empty($username)){
    array_push($errors, "Username is Required");
}

if(empty($email)){
    array_push($errors, "Email is Required");
}

if(empty($password_1)){
    array_push($errors, "Password is Required");
}

if($password_1 != $password_2){
    array_push($errors, "Passwords do not match");
}

//check db for existing user
$user_check_query = "SELECT * FROM user WHERE username = '$username' 
                        or email = '$email' LIMIT  1";

$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) {

    if ($user['username'] === $username) {
        array_push($errors, "Username Already Exists");
    }

    if ($user['email'] === $email) {
        array_push($errors, "Email Already Exists");
    }
}

//Register usersif no error
if(count($errors) == 0){
    $password = md5($password_1); //encrypts passsword
    $query =  "INSERT INTO user (username, email, password) VALUES 
                ('$username', '$email', '$password'";

    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";

    header('Location: index.php');


}
