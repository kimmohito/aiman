<?php
include 'database.php';

if(isset($_POST['register'])){

    $ic=$_POST['ic'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];

    $query="SELECT * FROM users WHERE user_ic='$ic' OR user_email='$email'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    if($count!=0){
        header('location: ../../register.php?user%existed');
        exit();
    }

    if($password1!=$password2){
        header('location: ../../register.php?password%not%match');
        exit();
    }else{
        $hash=md5($password1);
        $query="INSERT INTO users (user_id, user_type, user_ic, user_pass, user_first_name, user_last_name, user_email) VALUES (NULL, '', '$ic', '$hash', '$fname', '$lname', '$email')";
        $result=mysqli_query($conn,$query);
        header('location: ../../?register%successful#06');
        exit();
    }



}