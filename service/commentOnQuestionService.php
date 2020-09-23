<?php
require_once('../db/db.php');
require_once('database_helper.php');



function getQuestionCommentsById($id)
{
    $con = dbConnection();
    $sql = "select * from question_comments where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getQuestionCommentFromQuestionId($question_id)
{
    $con = dbConnection();
    $sql = "select * from question_comments where question_id='{$question_id}'";
    $result = mysqli_query($con, $sql);
    $questions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($questions, $row);
    };
    return $questions;
}

function getAllQuestionsComments()
{
    $con = dbConnection();
    $sql = "select * from question_comments";
    $result = mysqli_query($con, $sql);
    $questions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($questions, $row);
    };
    return $questions;
}

function CreateQuestionComments($q)
{
    $con = dbConnection();
    $sql = "INSERT INTO `question_comments` (`id`, `question_id`, `username`, `comment`) VALUES (NULL, '{$q['question_id']}', '{$q['username']}', '{$q['comment']}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
