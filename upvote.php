<?php
    include_once 'database.php';
    $cardID = $_POST['cardID'];
    $answerID = $_POST['answerID'];
    
    $dbConn = getDatabaseConnection();
    // switched out the old sql statements with my own as the old were throwing some odd errors.
    // cards are selected from card and answer id.
    $sql = "SELECT * FROM `answers` WHERE `card_id` = $cardID AND `answer_id` = $answerID";
    
    // $sql = "SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    // rating is fetched from the record. 
    $rating = $records[0]['rating'];
    // type casting maybe redundant but better safe than sorry.
    (int)$rating;
    // increment score
    $rating += 1;
    (int)$answerID;
    (int)$cardID;
    // updates the rating in the database. 
    $sql =     "UPDATE `answers` SET `rating` = $rating WHERE `answer_id` = $answerID AND `card_id` = $cardID";
    
    // -=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
    // old SQL statement that was traded out     
    // "UPDATE `answers` SET `rating`= $rating FROM
    // ( 
    //     SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.answer_id = $answerID
    // )
    // WHERE 1";
    
    
    $statement = $dbConn->prepare($sql); 
    $statement->execute(); 
    
   // displays score on modal    
   echo $rating;
    
?>