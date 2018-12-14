<?php
include_once 'database.php';
session_start();

$answer = $_POST['answer_id'];

$dbConn = getDatabaseConnection();
//var_dump($_POST);
    
$sql = "DELETE FROM `answers` WHERE `answer_id` = $answer";
$statement = $dbConn->prepare($sql); 
$statement->bindParam(':answer', $answer);
$statement->execute();

echo 1;
//var_dump($sql, $statement);
?>