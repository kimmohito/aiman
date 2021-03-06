<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-09 max">
    <div class="container">
        <div class="white-card">
            <h1>Ticket</h1><br>

            <?php
                echo '<table class="ticket-table">';
                echo '<tr>';
                    echo '<th>Date & Time</th>';
                    echo '<th>Origin</th>';
                    echo '<th>Destination</th>';
                    echo '<th>Trip</th>';
                    echo '<th>Price</th>';
                    echo '<th>Discount</th>';
                    echo '<th>Price After Discount</th>';
                echo '</tr>';


                $user_id=$_SESSION['user_id'];
                $query="SELECT * FROM tickets WHERE user_id='$user_id' ORDER BY ticket_id DESC";
                $result=mysqli_query($conn,$query);
                while($row=mysqli_fetch_assoc($result)){
                    echo '<tr>';
                        echo '<td>'.$row['ticket_datetime'].'</td>';
                        echo '<td>'.$row['ticket_origin'].'</td>';
                        echo '<td>'.$row['ticket_destination'].'</td>';
                        echo '<td>'.$row['ticket_trip'].'</td>';
                        echo '<td>RM '.$row['ticket_price'].'</td>';
                        echo '<td>'.$row['ticket_discount'].'%</td>';
                        echo '<td>RM '.$row['ticket_discount_price'].'</td>';
                    echo '</tr>';
                }
                echo '</table>';
            ?>

        </div>
    </div>
</main>

<?php include 'footer.php'; ?>