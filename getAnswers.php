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
        <textarea name="comment" rows="4" cols="50"></textarea><br>
        <button id="submit-comment">Submit</button>
      </form><br>';
      
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
