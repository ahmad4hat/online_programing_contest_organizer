
<?php
require_once('../db/db.php');
require_once('database_helper.php');


 

function deleteAnswersById($id)
{
    $conn = dbConnection();
    if (!$conn) {
        echo "DB connection error";
    }

    $sql = "DELETE FROM answers WHERE id='{$id}'";

    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getAnswersById($id)
{
    $con = dbConnection();
    $sql = "select * from answers where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function getAllAnswers()
{
    $con = dbConnection();
    $sql = "select * from answers";
    $result = mysqli_query($con, $sql);
    $answers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($answers, $row);
    };
    return $answers;
}

function createAnswer($answers)
{
    $con = dbConnection();
    $sql = "INSERT INTO `answers` (`id`, `question_id`, `submittedAnswer`, `submissionDate`, `username`) VALUES (NULL, '{$answers['question_id']}', '{$answers['submittedAnswer']}', current_timestamp(), '{$answers['username']}')";
    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}
