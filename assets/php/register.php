<?php
include 'database.php';

if(isset($_POST['register'])){

    /*
    ===== Previous Coding =====
    $ic=$_POST['ic'];
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];

    $query="SELECT * FROM users WHERE user_ic='$ic' OR user_email='$email'";
    $result=mysqli_query($conn,$query);
    $count=mysqli_num_rows($result);
    ===== ===== ===== ===== =====
    */

    // Escape SQL injection
    $ic = mysqli_real_escape_string($conn, $_POST['ic']);
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    // Create a Template
    $sql = "SELECT * FROM users WHERE user_ic=? OR user_email=?;";

    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);

    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ss", $username, $email);
        // Run parametesr inside database
        mysqli_stmt_execute($stmt);
        // Query a result
        $result = mysqli_stmt_get_result($stmt);
    }

    // Count user by row
    $count = mysqli_num_rows($result);

    // Check if user existed
    if($count!=0){
        header('location: ../../register.php?user%existed');
        exit();
    }

    // If password input doesnt match
    if($password1!=$password2){
        header('location: ../../register.php?password%not%match');
        exit();
    }else{

        /*
        ===== Previous Coding =====    
        $hash=md5($password1);
        $query="INSERT INTO users (user_id, user_type, user_ic, user_pass, user_first_name, user_last_name, user_email) VALUES (NULL, '', '$ic', '$hash', '$fname', '$lname', '$email')";
        $result=mysqli_query($conn,$query);
        header('location: ../../?register%successful#06');
        exit();
        ===== ===== ===== ===== =====
        */

        // Declare hash from password input
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        // Create a template
        $sql = "INSERT INTO users (user_id, user_type, user_ic, user_pass, user_first_name, user_last_name, user_email) VALUES (NULL, '', ?, ?, ?, ?, ?);";
        // Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        // Prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed";
        } else {
            // Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "sssss", $ic, $hash, $fname, $lname, $email);
            // Run parametesr inside database
            mysqli_stmt_execute($stmt);
            // Go back to registeration and display register successful
            header('location: ../../?register%successful#06');
            exit();
        }


    }



}