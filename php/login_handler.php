<?php

if (!(isset($_POST["username"]) &&
    isset($_POST["password"]))) {

    $error = "some of the field is null ,please fill up all the form entry";
    header('location: ../view/login.php?error=' . urlencode($error));
    exit();
}


if (
    empty(trim($_POST["username"])) ||
    empty(trim($_POST["password"]))
) {
    // empty($_POST["profilePicture"]) ||{

    $error = "some of the field is empty ,please fill up all the form";
    header('location: ../view/login.php?error=' . urlencode($error));
    exit();
}



$username = trim($_POST["username"]);
$username = str_replace(' ', '', $username);

$connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
$sql = "select * from users where username='" . $username . "' and password='" . $_POST['password'] . "'";

$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if (count($row) > 0) {

    $authToken = uniqid('token_', true);
    $expireDate = time() + 7200;

    setcookie('token', $authToken, $expireDate, '/');

    $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');

    $sql_authoken = "INSERT INTO `auth_tokens` (`token`, `username`, `expiry_date`) VALUES ('" . $authToken . "', '" . $username . "', '" . $expireDate . "');";
    if (mysqli_query($connection, $sql_authoken)) {
        echo "New Token record created successfully";
        header('location: ../view/home.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header('location: ../view/login.php?error=sqlErrorInAuthToken');
        exit();
    }
} else {
    header('location: ../view/login.php?error=invalid_username/password');
}
