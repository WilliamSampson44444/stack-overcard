<?php
    include_once 'database.php';
    $card = $_POST['card'];
    //var_dump($deck);
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `answers` WHERE `card_id` = '$card' order by 'rating' desc";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    echo '<div class="flex-wrapper" id="outerFlex">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<div class="flex-wrapper" id="innerFlex">';
            echo '<div class="flex-wrapper" id="scoreFlex">';
                //put upvote div here
                echo '<div class="answers" id ="score' . $record['answer_id'] . '"> Score: ' . $record['rating'] . '</div>';
                //put downvote div here
            echo '</div>';
            echo '<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div>';
        echo '</div>';
    }
    echo '</div>';
?>
