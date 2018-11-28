<?php
    include database.php;
    
    $sql = "SELECT name from decks"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    foreach ($records as $record){
        echo $record;
    }
?>
