<?php
include 'database.php';
session_start();

// If user click on login button
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$username' OR user_ic='$username'";

    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($count==0){
        header('location: ../../index.php?user%not%exist#06');
        exit();
    }

    $passwordx=md5($password);

    if($passwordx!=$row['user_pass']){
        header('location: ../../index.php?password%not%match#06');
        exit();
    }else{
        $_SESSION['user_id']=$row['user_id'];
        $_SESSION['user_type']=$row['user_type'];
        $_SESSION['user_first_name']=$row['user_first_name'];
        header('location: ../../profile.php?login%successful');
        exit();
    }
}