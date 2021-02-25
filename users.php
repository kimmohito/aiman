<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-09 max">
    <div class="container">
        <div class="white-card">
            <h1>Users</h1><br>

            <?php
                echo '<table class="ticket-table">';
                echo '<tr>';
                    echo '<th>Type</th>';
                    echo '<th>Ic</th>';
                    echo '<th>Username</th>';
                    echo '<th>Full Name</th>';
                    echo '<th>Address</th>';
                    echo '<th>Email</th>';
                    echo '<th>Phone</th>';
                    echo '<th>Option</th>';
                echo '</tr>';
                $query="SELECT * FROM users";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        echo '<td>'.$row['user_type'].'</td>';
                        echo '<td>'.$row['user_ic'].'</td>';
                        echo '<td>'.$row['user_name'].'</td>';
                        echo '<td>'.$row['user_first_name'].' '.$row['user_last_name'].'</td>';
                        echo '<td>'.$row['user_address'].'</td>';
                        echo '<td>'.$row['user_email'].'</td>';
                        echo '<td>'.$row['user_phone'].'</td>';
                        echo '<td><a href="user-select.php?uid='.$row['user_id'].'">Select</a></td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>