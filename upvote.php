<?php
    include_once 'database.php';
    $cardID = $_POST['cardID'];
    $answerID = $_POST['answerID'];
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE c.card_id = $cardID AND a.answer_id = $answerID";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    $rating = $records['rating'];
    echo '<div>Upvote kinda works?</div>';
?>