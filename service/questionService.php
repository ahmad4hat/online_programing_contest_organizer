
<?php
require_once('../db/db.php');
require_once('database_helper.php');



function getQuestionById($id)
{
    $con = dbConnection();
    $sql = "select * from questions where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAllQuestions()
{
    $con = dbConnection();
    $sql = "select * from questions";
    $result = mysqli_query($con, $sql);
    $questions = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($questions, $row);
    };
    return $questions;
}

function create($question)
{
    $con = dbConnection();
    $sql = "INSERT INTO `questions` (`id`, `problemStatement`, `expectedOutput`, `lastSubmissionDate`, `creator`, `totalMark`, `difficulty`, `hints`, `instructions`, `supported_language`) VALUES (NULL, '{$question['problemStatement']}', '{$question['expectedOutput']}', '" . getDateForDatabase($question["lastSubmissionDate"]) . "', '{$question["creator"]}', '{$question["totalMark"]}', '{$question["difficulty"]}', '{$question["hints"]}', '{$question["instructions"]}', '{$question["supported_language"]}')";


    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
