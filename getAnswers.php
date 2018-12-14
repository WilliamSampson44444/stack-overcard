<?php
    session_start();
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
    
    if (isset($_SESSION['user_id'])){ //logged in = can comment
        echo '<form method="POST" id="new-comment">
        <p>Have a better answer? Submit it here:</p>
        <textarea id="comment" rows="4" cols="50"></textarea><br>
        <button type="button" id="submit-comment" onclick="submitAnswer();">Submit</button>
        </form><br>';
      }
      
    echo '<div class="flex-wrapper" id="outerFlex">';
    foreach ($records as $record){
        //var_dump($record);
        if (isset($_SESSION['user_id'])){
            echo '<div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell rating">&nbsp;<div class="upvote" id="upvote' . $record['answer_id'] . '" onclick="upvote('. $record['card_id'] .', '. $record['answer_id'] .');"><i class="fa fa-arrow-up" style="font-size:36px;color:grey;"></i></div></div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell rating">&nbsp;<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div></div>
                        <div class="divTableCell answer">&nbsp;<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell rating">&nbsp;<div class="downvote" id="downvote' . $record['answer_id'] . '" onclick="downvote('. $record['card_id'] .', '. $record['answer_id'].');"><i class="fa fa-arrow-down" style="font-size:36px;color:grey;"></i></div></div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                </div>
            </div>';
        }else{
            echo '<div class="divTable">
                <div class="divTableBody">
                    <div class="divTableRow">
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">&nbsp;<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div></div>
                        <div class="divTableCell">&nbsp;<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div></div>
                    </div>
                    <div class="divTableRow">
                        <div class="divTableCell">&nbsp;</div>
                        <div class="divTableCell">&nbsp;</div>
                    </div>
                </div>
            </div>';
        }
    }
    echo '</div>';
    

    
   /* echo '<div class="flex-wrapper" id="innerFlex">';
            echo '<div class="flex-wrapper" id="scoreFlex">';
                if (isset($_SESSION['user_id'])){ //logged in = can vote
                    // card id identifies specific card
                    // answer id is the specific answer in the modal 
                    echo '<div class="upvote" id="upvote' . $record['answer_id'] . '" onclick="upvote('. $record['card_id'] .', '. $record['answer_id'] .');"><i class="fa fa-arrow-up" style="font-size:36px;color:grey;"></i></div>';
                    echo '<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div>';
                    echo '<div class="downvote" id="downvote' . $record['answer_id'] . '" onclick="downvote('. $record['card_id'] .', '. $record['answer_id'].');"><i class="fa fa-arrow-down" style="font-size:36px;color:grey;"></i></div>';
                }else{
                    echo '<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div>';
                }
            echo '</div>';
            echo '<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div>';
        echo '</div>';*/
    
    
?>
