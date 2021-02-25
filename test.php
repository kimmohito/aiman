<?php

include 'assets/php/database.php';

// Declare data
$_POST['data'] = "admin";

// Escape SQL injection
$data = mysqli_real_escape_string($conn, $_POST['data']);

// ===== PROCEDURAL PHP =====

$sql = "SELECT * FROM users WHERE user_name='admin'" ;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

echo $row['user_name'];

echo "<br><br>";



// ===== PREPARED STATEMENT =====

// Create a template
$sql = "SELECT * FROM users WHERE user_name=?;" ;
// Create a prepared statement
$stmt = mysqli_stmt_init($conn);
// Prepare the prepared statement
if (!mysqli_stmt_prepare($stmt,$sql)){
    echo "SQL statement failed";
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, "s", $data);
    // Run parametesr inside database
    mysqli_stmt_execute($stmt);
    // Query a result
    $result = mysqli_stmt_get_result($stmt);
}
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['user_name'];
}


echo "<br><br>";

echo $md5 = md5('abc123');

echo "<br>";

echo $hash = password_hash('abc123', PASSWORD_DEFAULT);