<?php
include_once 'database.php';
session_start();

$dbConn = getDatabaseConnection();
    
$answer = $_POST['comment'];
$card_id = $_POST['card_id'];
    
$sql = "INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`) 
    VALUES (NULL, '$card_id', ':answer', '" . $_SESSION['user_id'] . "', '0')"; 
$statement = $dbConn->prepare($sql); 
$statement->execute(array(':answer' => $answer));

var_dump($sql);
?>