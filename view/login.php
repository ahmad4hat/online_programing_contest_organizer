<?php include 'partials/top.php'; ?>
  
        <h1>Login</h1>

        <?php if (isset($_GET["error"])) {
            $error = urldecode($_GET["error"]);
            echo '<h4>Error :' . $error . '</h4>';
        } ?>
        <div>
            <form action="../php/login_handler.php" method="post">
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" required />
                <small>Username could not empty , and have to be unique for each user && all whitespace will be removed</small>
                <br />
                <br />
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" required />
                <small>password can not be empty </small>
                <br />
                <br />
                <input type="submit" name="submit" value="submit" />
            </form>
        </div>


<?php include 'partials/end.php'; ?>