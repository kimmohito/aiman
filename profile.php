<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-07 max">
    <div class="container">
        <div class="white-card">
            <h1>Profile</h1><br>
            <table class="profile-table">
                <?php
                    $user_id=$_SESSION['user_id'];
                    $query="SELECT * FROM users WHERE user_id='$user_id'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    echo '<tr>';
                        echo '<td><b>Role</b></td>';
                        echo '<td>'.$row['user_type'];
                            if($row['user_type']=="student"&&$row['user_student_id']!=""){echo ' ('.$row['user_student_id'].')';}
                        echo '</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Username</b></td>';
                        echo '<td>'.$row['user_name'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>IC Number</b></td>';
                        echo '<td>'.$row['user_ic'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Name</b></td>';
                        echo '<td>'.$row['user_first_name'].' '.$row['user_last_name'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Address</b></td>';
                        echo '<td>'.$row['user_address'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Email</b></td>';
                        echo '<td>'.$row['user_email'].'</td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Phone</b></td>';
                        echo '<td>'.$row['user_phone'].'</td>';
                    echo '</tr>';
                ?>
            </table><br>
            <div class="button">
                <a class="confirm" href="profile-edit.php">Edit</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>