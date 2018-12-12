<?php
include_once 'database.php';
session_start();

$dbConn = getDatabaseConnection();
<<<<<<< HEAD
=======
// not sure why this is here.
// $dbConn = getDatabaseConnection(); 
>>>>>>> bf712bc32ccd35650696d8a05b54b2c48aeaedee
    
$answer = $_POST['comment'];
$card_id = $_POST['card_id'];
$user_id = $_SESSION['user_id'];
    
    
$sql = "INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`)  VALUES (NULL, '$card_id', '$answer', '$user_id' , '0')"; 


    // old sql statement
    // "INSERT INTO `answers` (`answer_id`, `card_id`, `answer`, `user_id`, `rating`) 
    // VALUES (NULL, '$card_id', '$answer', '" . $_SESSION['user_id'] . "', '0')"; 
    
    
    
$statement = $dbConn->prepare($sql); 
$statement->execute($sql);

var_dump($sql);
?>