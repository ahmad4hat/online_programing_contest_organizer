<?php

session_start();
function  delete_Token_Cookie()
{
    $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
    $sqlc = "DELETE FROM `auth_tokens` WHERE `auth_tokens`.`token` = '" . $_COOKIE['token']  . "'";
    $resultc = mysqli_query($connection, $sqlc);
    $rowc = mysqli_fetch_assoc($resultc);
    $_SESSION["status"] = null;
    setcookie('token', '', time(), '/');
}
$user = null;

if (isset($_COOKIE['token'])) {
    $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
    $sql = "select * from auth_tokens where token ='" . $_COOKIE['token']  . "'";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!isset($row['token'])) {
        // echo "tokeN:nothing found";
    } else {
        if ($row['expiry_date'] < time()) {
            delete_Token_Cookie();
            // $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
            // $sqlc = "DELETE FROM `auth_tokens` WHERE `auth_tokens`.`token` = '" . $_COOKIE['token']  . "'";
            // $resultc = mysqli_query($connection, $sqlc);
            // $rowc = mysqli_fetch_assoc($resultc);
        } else {
            $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
            $sqlUser = "select * from users where username='" . $row['username'] . "'";
            $resultUser = mysqli_query($connection, $sqlUser);
            $rowUser = mysqli_fetch_assoc($resultUser);
            global $user;
            $user = $rowUser;
            $_SESSION["status"] = "ok";
        }
    }
}
