<?php
include 'database.php';

if(isset($_POST['forgot'])){

    /*
    ===== Previous Coding =====
    $email=$_POST['email'];
    $query="SELECT * FROM users WHERE user_email='$email'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    $row=mysqli_fetch_assoc($result);
    ===== ===== ===== ===== =====
    */

    // ===== CHECK USER IF EXISTED =====
    // Escape SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // Create a Template
    $sql = "SELECT * FROM users WHERE user_email=?;";
    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "s", $email);
        // Run parametesr inside database
        mysqli_stmt_execute($stmt);
        // Query a result
        $result = mysqli_stmt_get_result($stmt);
    }
    // Count user by row
    $count = mysqli_num_rows($result);
    // If user does not exist
    if($count==0){
        header('location: ../../forgot.php?user%not%exist');
        exit();
    }

    // ===== UPDATE LINK =====
    // Create random hash
    $random = rand();
    // ipnut random hash inside new column as a link
    $forgot = password_hash($random, PASSWORD_DEFAULT);
    // Create a Template
    $sql = "UPDATE users SET user_forgot=? WHERE user_email=?;";
    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ss", $forgot, $email);
        // Run parametesr inside database
        mysqli_stmt_execute($stmt);
        // Query a result
        mysqli_stmt_get_result($stmt);
    }

    // Define a mail subject, body
    $subject = "KTMB Password";
    $body = 'Please click on <a href="localhost/aiman/recover.php?f='.$forgot.'">this link</a> to proceed to retrive your account.';

    // Send an a link to an email via PHP Mailer
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

    // Go to home. with email sent message
    header('location: ../../?email%has%been%sent#');
    exit();
}