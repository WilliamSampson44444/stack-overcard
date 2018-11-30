<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <!--<a href="#">HTML</a>
  <a href="#">CSS</a>
  <a href="#">PHP</a>
  <a href="#">JS</a>-->
  <?php
    include 'dbCalls/database.php';
    $dbConn = getDatabaseConnection();
    $sql = "SELECT name from decks"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    foreach ($records as $record){
        echo "<a href=" . $record["name"] . ".php" . ">" . $record["name"] . "</a>";
    }
  ?>
</div>

<script type="text/javascript" src="functions.js"></script>