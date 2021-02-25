<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-10 max">
    <div class="container">
        <form class="black-card" action="assets/php/forgot.php" method="post">
            <h1>Forgot your password?</h1><br>
            <label>What is your email?</label><br>
            <input type="email" name="email" placeholder="Email" required><br><br>

            <label>Click to send to your email</label><br>
            <button class="purchase" type="submit" name="forgot">Send</button>

        </form>
    </div>
</main>

<?php include 'footer.php'; ?>