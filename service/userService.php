<?php
require_once('../databaseConn/dbCon.php');

function getUserByID($id)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "Database connection error";
    }

    $sql = "select * from users where id={$id}";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $row;
}

function getUserByUsername($username)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "Database connection error";
    }
    $sql = "select * from users where username='{$username}' ";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    if (count($user) > 0) {
        return $user;
    } else {
        return "No user found";
    }
}


function validateUser($user)
{
    $conn = dbConnection();

    if (!$conn) {
        echo "DB connection error";
    }
    $sql = "select * from users where username='{$user['username']}' and u_password ='{$user['password']}'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($conn);

    if (count($user) > 0) {
        return $user;
    } else {
        return "No user found";
    }
}
