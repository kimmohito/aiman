<?php
include 'database.php';

if(isset($_POST['forgot'])){

    $email=$_POST['email'];
    $query="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    $u=$row['user_id'];
    $p=$row['user_pass'];

    if($count==0){
        header('location: ../../forgot.php?user%not%exist');
        exit();
    }else{

        $subject = "KTMB Password";
        $body = 'Please click on <a href="localhost/aiman/recover.php?u='.$u.'&p='.$p.'">this link</a> to proceed to retrive your account.';
    
        require_once('../PHPMailer/PHPMailerAutoload.php');
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'ktmb.unikl@gmail.com';
        $mail->Password = 'uniKL123!';
        $mail->SetFrom('no-reply@ktmb.com');
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($email);
        $mail->Send();
    
        header('location: ../../?email%has%been%sent#');
        exit();

    }


}