<?php
    include_once 'database.php';
    $cardID = $_POST['cardID'];
    $answerID = $_POST['answerID'];
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `answers` WHERE `card_id` = $cardID AND `answer_id` = $answerID";
    
    // $sql = "SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    $rating = $records[0]['rating'];
    
    (int)$rating;
    $rating += 1;
    (int)$answerID;
    (int)$cardID;
    
    $sql =     "UPDATE `answers` SET `rating` = $rating WHERE `answer_id` = $answerID AND `card_id` = $cardID";

    
    // "UPDATE `answers` SET `rating`= $rating FROM
    // ( 
    //     SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID
    // )
    // WHERE 1";
    
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    
   echo $rating;
    
?>