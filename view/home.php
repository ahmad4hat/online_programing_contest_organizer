<?php include 'helper.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php include 'header.php' ?>
    <main>
        <h1>Welcome <?php if ($user) {
                        echo $user['name'];
                    }; ?> </h1>

        <?php if (!$user) { ?>
            <h3>You are not logged in, please log in or register</h3>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
            <br>

        <?php } ?>
    </main>






</body>

</html>