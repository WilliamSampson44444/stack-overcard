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
        echo '<div class="cards" id ="' . $record['card_id'] . '">' . $record['question'] . '</div>';
    }
    echo '</div>';
?>
