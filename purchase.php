<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-11 max">
    <div class="container">
        <form class="white-card small-card" action="assets/php/purchase.php" method="post">
            <?php
                $origin=$_POST['origin'];
                $destination=$_POST['destination'];
                $passenger=$_POST['passenger'];
                $trip=$_POST['trip'];
                $price=$_POST['price'];



                echo '<h1>'.date('Y-m-d H:i:s').'</h1><br>';
                echo '<p><b>FROM:</b></p>';
                echo '<p>'.$origin.'</p>';
                echo '<br>';
                echo '<p><b>TO:</b></p>';
                echo '<p>'.$destination.'</p>';
                echo '<br>';
                echo '<p><b>PASSENGER:</b></p>';
                echo '<p>'.$passenger.'</p>';
                echo '<br>';
                echo '<p><b>TRIP:</b></p>';
                echo '<p>'.$trip.'</p>';
                echo '<br>';
                echo '<p><b>PRICE:</b></p>';
                echo '<h2>'.$price.'</h2>';
                echo '<br>';

                echo '<input type="text" name="origin" value="'.$origin.'" hidden>';
                echo '<input type="text" name="destination" value="'.$destination.'" hidden>';
                echo '<input type="text" name="passenger" value="'.$passenger.'" hidden>';
                echo '<input type="text" name="trip" value="'.$trip.'" hidden>';

                echo '<button class="purchase" type="submit" name="confirm">Confirm</button>';


            ?>
        </form>
    </div>
</main>

<?php include 'footer.php'; ?>