<?php
include 'database.php';

if(isset($_POST['confirm'])){

    $forgot = $_POST['forgot'];

    $user_id=$_POST['user'];
    $user_pass=$_POST['pass'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];


    if($password1!=$password2){
        header('location: ../../recover.php?f='.$forgot.'&password%not%match#');
        exit();
    }else{
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        $query="UPDATE users SET user_forgot='', user_pass='$hash' WHERE user_forgot='$forgot'";
        $result=mysqli_query($conn,$query);
        
        header('location: ../../?password%updated#06');
        exit();
    }
}