<?php
    include_once 'database.php';
    $deck = $_POST['deck'];
    //var_dump($deck);
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `cards` WHERE `deck` = '$deck'";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    echo '<button type="button" class="btn btn-light" style="float:left;" onclick="getDecks();"><i class="fa fa-arrow-left" style="font-size:36px;color:grey;"></i></button>';
    echo '<div class="flex-wrapper">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<button type="button" class="cards btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" id ="' . $record['card_id'] . '" onclick="getAnswers(this.id);"><div class="cardText">' . $record['question'] . '</div></button>';
    }
    echo '</div>';
?>
