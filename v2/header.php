<?php
    /* Inclue Database */
    include 'assets/php/database.php';
    /* Start Session */
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Set charset -->
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Title -->
    <title>KTMB - Aiman</title>
    <!-- Style -->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css">
    <!-- Fontawesome Icon -->
    <link href="assets/fonts/fontawesome-free-5.14.0-web/css/all.css" rel="stylesheet">
    <!-- Title Icon -->
    <link href="assets/img/logo.png" rel="icon" type="image/png"/>
</head>
<body>
    <nav>
        <div class="container">
            <div class="dropdown">
                <a href="index.php#" title="KTMB" class="logo">
                    <div class="nav-img">
                        <img src="assets/img/navlogo.png">
                    </div>
                </a>
            </div>
            <div class="dropdown">
                <a class="drop-button" href="index.php#01" title="Route">
                    <i class="fas fa-train"></i>
                    <span>Route</span>
                </a>
            </div>
            <div class="dropdown">
                <a class="drop-button" href="index.php#02" title="News">
                    <i class="far fa-newspaper"></i>
                    <span>News</span>
                </a>
            </div>
            <div class="dropdown">
                <a class="drop-button" href="index.php#03" title="Map">
                    <i class="fas fa-map-signs"></i>
                    <span>Map</span>
                </a>
            </div>
            <div class="dropdown">
                <a class="drop-button" href="index.php#04" title="Info">
                    <i class="fas fa-info-circle"></i>
                    <span>Info</span>
                </a>
            </div>
            <div class="dropdown">
                <a class="drop-button" href="index.php#05" title="Price">
                    <i class="fas fa-table"></i>
                    <span>Price</span>
                </a>
            </div>
            <?php
                if(!isset($_SESSION['user_id'])){
                    echo '<div class="dropdown">';
                        echo '<a class="drop-button" href="index.php#06" title="Login">';
                            echo '<i class="fas fa-sign-in-alt"></i>';
                            echo '<span>Login</span>';
                        echo '</a>';
                    echo '</div>';
                }else{
                    echo '<div class="dropdown">';
                        echo '<a class="drop-button" href="profile.php" title="Login">';
                            echo '<i class="fas fa-user-circle"></i>';
                            echo '<span>'.$_SESSION['user_first_name'].'</span>';
                        echo '</a>';
                        echo '<div class="dropdown-content">';
                            echo '<a href="profile.php" title="Profile">';
                                echo '<i class="fas fa-user"></i>';
                                echo '<span>Profile</span>';
                            echo '</a>';
                            echo '<a href="ticket.php" title="Ticket">';
                                echo '<i class="fas fa-ticket-alt"></i>';
                                echo '<span>Ticket</span>';
                            echo '</a>';
                            if($_SESSION['user_type']=='admin'){
                                echo '<a href="users.php" title="Users">';
                                    echo '<i class="fas fa-users"></i>';
                                    echo '<span>Users</span>';
                                echo '</a>';
                            }
                            echo '<a href="logout.php" title="Logout">';
                                echo '<i class="fas fa-sign-out-alt"></i>';
                                echo '<span>Logout</span>';
                            echo '</a>';
                        echo '</div>';
                    echo '</div>';
                }
            ?>
        </div>
    </nav>