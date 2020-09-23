<?php
require_once('../db/db.php');
require_once('database_helper.php');

function getRatingMarkById($id)
{
    $con = dbConnection();
    $sql = "select * from ratings_mark where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getRatingQuestionById($id)
{
    $con = dbConnection();
    $sql = "select * from ratings_mark where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function createQuestionRating($rating)
{
    $con = dbConnection();
    $sql = "insert into ratings_question values('', '{$rating['question_id']}', '{$rating['username']}', '{$rating['rating']}', '{$rating['additional_comment']}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function createMarkRating($rating)
{
    $con = dbConnection();
    $sql = "insert into ratings_mark values('', '{$rating['mark_id']}', '{$rating['username']}', '{$rating['rating']}', '{$rating['additional_comment']}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
