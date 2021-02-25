<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-10 max">
    <div class="container">
        <form class="black-card" action="assets/php/recover.php" method="post">
            <?php
                echo '<h1>Recover your account</h1><br>';
                $forgot=$_GET['f'];
                
                $query="SELECT * FROM users WHERE user_forgot='$forgot'";
                $result=mysqli_query($conn,$query);
                $count=mysqli_num_rows($result);

                if($count==0 || $forgot==''){
                    header('location: index.php?link%expired#');
                    exit();
                }else{
                    echo '<input type="name" name="forgot" value="'.$forgot.'" hidden>';
                    echo '<label>New Password</label>';
                    echo '<input type="password" name="password1" placeholder="New Password"><br><br>';
                    echo '<label>Confirm New Password</label>';
                    echo '<input type="password" name="password2" placeholder="Confirm New Password"><br><br>';
                    echo '<label>Click to confirm</label>';
                    echo '<button class="purchase" type="submit" name="confirm">Confirm</button>';
                }
            ?>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>