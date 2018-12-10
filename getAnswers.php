<?php
    include_once 'database.php';
    $card = $_POST['card'];
    //var_dump($deck);
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `answers` WHERE `card_id` = '$card' order by 'rating' desc";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    $sql = "SELECT * FROM `cards` WHERE `card_id` = '$card'";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $card_info = $statement->fetchAll();
    
    echo '<div id="card_id" hidden>' . $card .'</div>';
    echo '<div id="question"><h3>' . $card_info[0]['question'] . '</h3></div>';
    
    echo '<form method="POST" id="new-comment">
        <p>Have a better answer? Submit it here:</p>
        <textarea id="comment" rows="4" cols="50"></textarea><br>
        <button type="button" id="submit-comment" onclick="submitAnswer(document.getElementById("comment").value, document.getElementById("card_id").value);">Submit</button>
      </form><br>';
      
    echo '<div class="flex-wrapper" id="outerFlex">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<div class="flex-wrapper" id="innerFlex">';
            echo '<div class="flex-wrapper" id="scoreFlex">';
                //put upvote div here
                echo '<div class="upvote" id="upvote' . $record['answer_id'] . '" onclick="upvote('. $record['card_id'] .', '. $record['answer_id'] .');"><i class="fa fa-arrow-up" style="font-size:36px;color:grey;"></i></div>';
                echo '<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div>';

                //put downvote div here
                echo '<div class="downvote" id="upvote' . $record['answer_id'] . '" onclick="downvote();"><i class="fa fa-arrow-down" style="font-size:36px;color:grey;"></i></div>';
            echo '</div>';
            echo '<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div>';
        echo '</div>';
    }
    echo '</div>';
?>
