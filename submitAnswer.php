<?php
include_once 'database.php';
session_start();

$dbConn = getDatabaseConnection();

    
$sql = "INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`) 
    VALUES (NULL, '".$_POST['card_id']."', :answer, '" . $_SESSION['user_id'] . "', '0')"; 
$statement = $dbConn->prepare($sql); 
$statement->bindParam(':answer', $_POST['comment']);
$statement->execute();


//var_dump($sql, $statement);
?>