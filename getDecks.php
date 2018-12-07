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
        echo '<div class="decks" id="' . $record['name'] . '" onclick="getCards(this.id)"><div class="deckText">' . $record['name'] . '</div></div>';
    }
    echo '</div>';
?>
