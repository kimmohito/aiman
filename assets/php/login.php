<?php
include 'database.php';
session_start();

// If user click on login button
if(isset($_POST['login'])){

    /*
    ===== Previous Coding =====
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM users WHERE user_name='$username' OR user_email='$username' OR user_ic='$username'";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    ===== ===== ===== ===== =====
    */

    // Escape SQL injection
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // Create a template
    $sql = "SELECT * FROM users WHERE user_name=? OR user_ic=?;";
    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ss", $username, $username);
        // Run parametesr inside database
        mysqli_stmt_execute($stmt);
        // Query a result
        $result = mysqli_stmt_get_result($stmt);
    }

    // Count user by row
    $count = mysqli_num_rows($result);
    // Check if user existed
    if($count==0){
        header('location: ../../index.php?user%not%exist#06');
        exit();
    }

    // Fetch array without indexing
    $row = mysqli_fetch_assoc($result);

    /*
    ===== Previous Coding =====
    // Hash Password
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
    ===== ===== ===== ===== =====
    */

    // Get hash from database
    $hash=$row['user_pass'];
    // Verify password
    if(!password_verify($password,$hash)){
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