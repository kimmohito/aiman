<?php
include 'database.php';

if(isset($_POST['confirm'])){

    
    /*
    ===== Previous Coding =====
    $forgot = $_POST['forgot'];
    $user_id=$_POST['user'];
    $user_pass=$_POST['pass'];
    $password1=$_POST['password1'];
    $password2=$_POST['password2'];
    ===== ===== ===== ===== =====
    */

    $forgot = mysqli_real_escape_string($conn, $_POST['forgot']);
    $user_pass = mysqli_real_escape_string($conn, $_POST['pass']);
    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if($password1!=$password2){
        header('location: ../../recover.php?f='.$forgot.'&password%not%match#');
        exit();
    }
    else{
        // Hash password
        $hash = password_hash($password1, PASSWORD_DEFAULT);
        // Template
        $sql = "UPDATE users SET user_forgot='', user_pass=? WHERE user_forgot=?;";
        // Create a prepared statement
        $stmt = mysqli_stmt_init($conn);
        // Prepare the prepared statement
        if (!mysqli_stmt_prepare($stmt,$sql)){
            echo "SQL statement failed";
        } else {
            // Bind parameters to the placeholder
            mysqli_stmt_bind_param($stmt, "ss", $hash, $forgot);
            // Run parametesr inside database
            mysqli_stmt_execute($stmt);
            // Query a result
            mysqli_stmt_get_result($stmt);
        }
        header('location: ../../?password%updated#06');
        exit();
    }
}