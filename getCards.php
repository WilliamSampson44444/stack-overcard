<?php
    include_once 'database.php';
    $id = $_POST['id'];
    var_dump($id);
    $dbConn = getDatabaseConnection();
    $sql = "SELECT" . $id . "from cards"; 
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
