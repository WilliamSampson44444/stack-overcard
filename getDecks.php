<?php
    include_once 'database.php';
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * from decks"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    echo '<div class="flex-wrapper">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<div class="decks" id ="' . $record['name'] . '" onclick="getCards()">' . $record['name'] . '</div>';
    }
    echo '</div>';
?>
