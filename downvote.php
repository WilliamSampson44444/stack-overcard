<?php
    include_once 'database.php';
    $cardID = $_POST['cardID'];
    $answerID = $_POST['answerID'];
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    $rating = $records['rating'];
    $rating += 1;
    
    $sql = "UPDATE `answers` SET `rating`= $rating FROM
    ( 
        SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID
    )
    WHERE 1";
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    
    echo $rating;
    
?>