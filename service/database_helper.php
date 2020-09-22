<?php
function getDateForDatabase(string $date): string
{
    $timestamp = strtotime($date);
    $date_formated = date('Y-m-d H:i:s', $timestamp);
    return $date_formated;
}

function getDateForDatabaseTimestamp(string $timestamp): string
{
    // $timestamp = strtotime($date);
    $date_formated = date('Y-m-d H:i:s', $timestamp);
    return $date_formated;
}

function excuteQuery(string $sql)
{
    $connection = mysqli_connect('127.0.0.1:3306', 'root', '', 'online_quiz');
    $result = mysqli_query($connection, $sql);
    return $result;
}
