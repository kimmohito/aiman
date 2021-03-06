<?php
include 'database.php';

if(isset($_POST['confirm'])){


    $user_id=$_POST['user'];
    $user_pass=$_POST['pass'];

    $password1=$_POST['password1'];

    $password2=$_POST['password2'];


    if($password1!=$password2){
        header('location: ../../recover.php?u='.$user_id.'&p='.$user_pass.'&password%not%match#');
        exit();
    }else{
        $hash=md5($password1);
        $query="UPDATE users SET user_pass='$hash' WHERE user_id='$user_id'";
        $result=mysqli_query($conn,$query);
        
        header('location: ../../?password%updated#06');
        exit();
    }
}