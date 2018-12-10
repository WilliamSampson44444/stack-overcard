<?php
include_once 'database.php';
session_start();

$dbConn = getDatabaseConnection();

$dbConn = getDatabaseConnection(); 
    
$submission = $_GET['submission'];
var_dump($submission);
$answer = $submission[0];
$card_id = $submission[1];
    
$sql = "INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`) VALUES (NULL, '$card_id', ':answer', '" . $_SESSION['user_id'] . "', '0')"; 
$statement = $dbConn->prepare($sql); 
$statement->execute(array(':answer' => $answer));

$records = $statement->fetchAll(); 
?>