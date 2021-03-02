<?php
include 'database.php';
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');

if(isset($_POST['confirm'])){

    /*
    ===== Previous Coding =====
    $origin=$_POST['origin'];
    $destination=$_POST['destination'];
    $passenger=$_POST['passenger'];
    $trip=$_POST['trip'];
    $user_id=$_SESSION['user_id'];
    $user_type=$_SESSION['user_type'];

    $query="SELECT * FROM routes WHERE route_origin='$origin' AND route_destination='$destination'";
    $result=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($result);
    $price=$row['route_price'];
    ===== ===== ===== ===== =====
    */

    // Variables with escape string
    $origin = mysqli_real_escape_string($conn, $_POST['origin']);
    $destination = mysqli_real_escape_string($conn, $_POST['des$destination']);
    $passenger = mysqli_real_escape_string($conn, $_POST['passenger']);
    $trip = mysqli_real_escape_string($conn, $_POST['trip']);
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];

    //Date
    $date=date('Y-m-d H:i:s');

    // Template
    $sql = "SELECT * FROM routes WHERE route_origin=? AND route_destination=?;";
    // Create a prepared statement
    $stmt = mysqli_stmt_init($conn);
    // Prepare the prepared statement
    if (!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL statement failed";
    } else {
        // Bind parameters to the placeholder
        mysqli_stmt_bind_param($stmt, "ss", $origin, $destination);
        // Run parametesr inside database
        mysqli_stmt_execute($stmt);
        // Query a result
        $result = mysqli_stmt_get_result($stmt);
    }
    // Fetch row
    $row=mysqli_fetch_assoc($result);

    // Declare price
    $price=$row['route_price'];

    // Trip
    if($trip=="oneway"){
        $ticket=1;
    }
    else{
        $trip="return";
        $ticket=2;
    }

    // Price * Passenger * Trip
    $totalPrice=$price*$passenger*$ticket;
    $totalPrice=number_format($totalPrice, '2', '.', ',');

    // Discount
    if($user_type=="admin"){$discount=100;}
    elseif($user_type=="student"){$discount=50;}
    elseif($user_type=="disabled"){$discount=40;}
    elseif($user_type=="senior"){$discount=30;}
    else{$discount=10;}

    // Calculate discount
    $discountPrice=$totalPrice-($price*($discount/100));
    $discountPrice=number_format($discountPrice, 2,'.',',');

    // Store in database
    $query="INSERT INTO tickets (ticket_id, ticket_datetime, user_id, ticket_origin, ticket_destination, ticket_passenger, ticket_trip, ticket_price, ticket_discount, ticket_discount_price) VALUES (NULL, '$date', '$user_id', '$origin', '$destination', '$passenger', '$trip', '$totalPrice', '$discount', '$discountPrice');";
    $result=mysqli_query($conn,$query);
    
    // Go back to purchase list
    header('location: ../../ticket.php?purchase%successful');
    exit();
}