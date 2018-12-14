<?php
    session_start();
    include_once 'database.php';
    $card = $_POST['card'];
    $id = $_SESSION['user_id'];
    //var_dump($deck);
    
    $dbConn = getDatabaseConnection();
    $sql = "SELECT * FROM `answers` WHERE `card_id` = '$card' AND `user_id` = $id order by 'rating' desc";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    $sql = "SELECT * FROM `cards` WHERE `card_id` = '$card'";
    
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $card_info = $statement->fetchAll();
    
    echo '<div id="card_id" hidden>' . $card .'</div>';
    echo '<div id="question"><h3>' . $card_info[0]['question'] . '</h3></div>';
      
    echo '<div class="flex-wrapper" id="outerFlex">';
    foreach ($records as $record){
        //var_dump($record);
        echo '<div class="flex-wrapper" id="innerFlex">';
            echo '<div class="flex-wrapper" id="scoreFlex">';
                echo '<div class="answers" id ="answer' . $record['answer_id'] . '">' . $record['rating'] . '</div>';
            echo '</div>';
            echo '<div id="answer' . $record['answer_id'] . '">' . $record['answer'] . '</div>';
        echo '</div>';
    }
    echo '</div>';
?>
