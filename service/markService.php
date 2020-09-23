
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

function getMarkParticipant($participant_username)
{
    $con = dbConnection();
    $sql = "select * from marks where username_participant='{$participant_username}'";
    $result = mysqli_query($con, $sql);
    $marks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($marks, $row);
    };
    return $marks;
}

function getMarkTeacher($teacher_username)
{
    $con = dbConnection();
    $sql = "select * from marks where username_teacher='{$teacher_username}'";
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
    $sql = "INSERT INTO `marks` (`id`, `answer_id`, `username_teacher`, `mark`, `username_participant`) VALUES (NULL, '{$mark['answer_id']}', '{$mark['username_teacher']}', '{$mark['mark']}', '{$mark['username_participant']}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
