<?php
    include_once 'database.php';
    $deck = $_POST['deck'];
    //var_dump($deck);
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `cards` WHERE `deck` = '$deck'";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    echo '<div class="flex-wrapper">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<button type="button" class="cards btn btn-primary" data-toggle="modal" data-target="#myModal" id ="' . $record['card_id'] . '" onclick="getAnswers(this.id);">' . $record['question'] . '</button>';
    }
    echo '</div>';
?>
