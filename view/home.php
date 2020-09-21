<?php include 'partials/top.php'; ?>
    
        <h1>Welcome <?php if ($user) {
                        echo $user['name'];
                    }; ?> </h1>

        <?php if (!$user) { ?>
            <h3>You are not logged in, please log in or register</h3>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <br>

        <?php } ?>
    





    <?php include 'partials/end.php'; ?>