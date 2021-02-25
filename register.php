<?php include 'header.php'; ?>

<!-- Main -->
<main class="bg-10 max">
    <div class="container">
        <form class="black-card" action="assets/php/register.php" method="post">
            <h1>Register</h1><br>
            <label>No. I/C</label><br>
            <input type="text" name="ic" placeholder="No. I/C" required><br><br>

            <label>First Name</label><br>
            <input type="text" name="fname" placeholder="First Name" required><br><br>

            <label>Last Name</label><br>
            <input type="text" name="lname" placeholder="Last Name" required><br><br>

            <label>Email</label><br>
            <input type="email" name="email" placeholder="Email" required><br><br>

            <label>Password</label><br>
            <input type="password" name="password1" placeholder="Password" required><br><br>

            <label>Confirm Password</label><br>
            <input type="password" name="password2" placeholder="Confirm Password" required><br><br>

            <label>Click to register</label><br>
            <button class="purchase" type="submit" name="register">Register</button>

        </form>
    </div>
</main>

<?php include 'footer.php'; ?>