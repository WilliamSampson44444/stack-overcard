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
                echo '<div class="upvote" onclick="upvote();"><i class="fa fa-arrow-up" style="font-size:36px;color:grey;"></i></div>';
                echo '<div class="answers" id ="score' . $record['answer_id'] . '"> Score: ' . $record['rating'] . '</div>';
                //put downvote div here
                echo '<div class="downvote" onclick="downvote();"><i class="fa fa-arrow-down" style="font-size:36px;color:grey;"></i></div>';
            echo '</div>';
            echo '<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div>';
        echo '</div>';
    }
    echo '</div>';
?>
