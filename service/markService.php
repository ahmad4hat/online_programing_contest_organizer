
<?php
require_once('../db/db.php');
require_once('database_helper.php');



function getMarkById($id)
{
    $con = dbConnection();
    $sql = "select * from marks where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAllMarks()
{
    $con = dbConnection();
    $sql = "select * from marks";
    $result = mysqli_query($con, $sql);
    $marks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($marks, $row);
    };
    return $marks;
}

function createMark($mark)
{
    $con = dbConnection();
    $sql = "INSERT INTO `marks` (`id`, `answer_id`, `username_teacher`, `mark`, `username_participant`) VALUES (NULL, '{$mark['answer_id']}', '{$mark['username_participant']}', '{$mark['mark']}', '{$mark['username_participant']}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
