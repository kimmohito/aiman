<?php include 'header.php'; ?>

<?php
    if(isset($_GET['update'])){
        $user_id=$_GET['update'];
        $user_type=$_GET['user_type'];
        $user_name=$_GET['user_name'];
        $user_ic=$_GET['user_ic'];
        $user_first_name=$_GET['user_first_name'];
        $user_last_name=$_GET['user_last_name'];
        $user_address=$_GET['user_address'];
        $user_email=$_GET['user_email'];
        $user_phone=$_GET['user_phone'];
        $user_student_id=$_GET['user_student_id'];
        $query="UPDATE users SET user_type='$user_type', user_name='$user_name', user_ic='$user_ic', user_first_name='$user_first_name', user_last_name='$user_last_name', user_address='$user_address', user_email='$user_email', user_phone='$user_phone', user_student_id='$user_student_id' WHERE user_id='$user_id'";
        $result=mysqli_query($conn,$query) or die('error');
        header('location: users.php');
    }


?>

<!-- Main -->
<main class="bg-07 max">
    <div class="container">
        <form class="white-card">
            <h1>Profile</h1><br>
            <table class="profile-table">
                <?php
                    $user_id=$_GET['uid'];
                    $query="SELECT * FROM users WHERE user_id='$user_id'";
                    $result=mysqli_query($conn,$query);
                    $row=mysqli_fetch_assoc($result);
                    echo '<tr>';
                        echo '<td><b>Role</b></td>';
                        echo '<td>';
                            echo '<select name="user_type">';
                                echo '<option value="'.$row['user_type'].'" selected hidden>'.$row['user_type'].'</option>';
                                echo '<option value="admin">admin</option>';
                                echo '<option value="student">student</option>';
                                echo '<option value="disabled">disabled</option>';
                                echo '<option value="senior">senior</option>';
                            echo '</select>';
                            echo ' <input type="text" name="user_student_id" placeholder="student id" value="'.$row['user_student_id'].'">';
                            echo ' *only if user is student';
                        echo '</td>';


                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Username</b></td>';
                        echo '<td><input type="text" name="user_name" placeholder="Username" value="'.$row['user_name'].'"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>IC Number</b></td>';
                        echo '<td><input type="number" name="user_ic" placeholder="IC Number" value="'.$row['user_ic'].'"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Name</b></td>';
                        echo '<td><input type="text" name="user_first_name" placeholder="First Name" value="'.$row['user_first_name'].'"> <input type="text" name="user_last_name"  placeholder="Last Name" value="'.$row['user_last_name'].'"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Address</b></td>';
                        echo '<td><input type="text" name="user_address" placeholder="Address" value="'.$row['user_address'].'"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Email</b></td>';
                        echo '<td><input type="text" name="user_email" placeholder="Email" value="'.$row['user_email'].'"></td>';
                    echo '</tr>';
                    echo '<tr>';
                        echo '<td><b>Phone</b></td>';
                        echo '<td><input type="text" name="user_phone" placeholder="Phone" value="'.$row['user_phone'].'"></td>';
                    echo '</tr>';
                ?>
            </table><br>
            <div class="button">
                <button type="submit" name="update" value="<?php echo $user_id; ?>">Update</button>
            </div>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>