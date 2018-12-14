<!DOCTYPE html>
<?php 
  session_start();
  include_once 'database.php';
  include_once 'sidebar.php';
  
  $id = $_SESSION['user_id'];
  (string)$profile_pic = $_SESSION['user_profile_pic'];



  // Test URL
  $dbConn = getDatabaseConnection();
  $sql = "SELECT * FROM `cards` c JOIN `answers` a  ON c.card_id = a.card_id WHERE a.user_id = $id";
  $statement = $dbConn->prepare($sql);
  $statement->execute(); 
  $records = $statement->fetchAll();
?>
<html>
  <head>
    <title>Stack Overcard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="functions.js"></script>
    
  </head>
  <body>
    <!--For content to be pushed by the sidebar, it MUST be in the div with the id "main". -->
    <!--Pushing the body tag doesn't seem to work >:( -->
    <div id="main">
      <!-- By including navbar in main, navbar can also be pushed by the sidebar rather than being overlayed -->
      <?php include_once 'navigation.php'; ?>
      <div id="content">
        <?php
          echo '<div id="profile">';
          if (strlen($profile_pic) > 1){
             echo "<div id='profilePic'><img src='$profile_pic' class='img-responsive img-circle' alt='person' width='200' height='200'></div>";
          } 
          else {
            echo "<div id='profilePic'><img src='img/person.png' class='img-responsive img-circle' alt='person' width='200' height='200'></div>";
          }
          echo '<div id="profileName"><h2>' . $_SESSION['username'] . '</h2></div>';
          echo '</div>';
          
          echo '<div class="flex-wrapper">';
          foreach ($records as $record){
            echo '<button type="button" class="cards btn btn-primary" data-toggle="modal" data-target="#exampleModalLong" id ="' . $record['card_id'] . '" onclick="getMyAnswers(this.id);"><div class="cardText">' . $record['question'] . '</div></button>';
          }
          echo '</div>';
        ?>
      </div>
      
      <?php include_once 'modal.php'; ?>
      
    </div>
  </body>
</html>
