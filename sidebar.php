<div id="mySidenav" class="sidenav">
  <span class="closebtn" onclick="closeNav()">&times;</span>
  <!--<a href="#">HTML</a>
  <a href="#">CSS</a>
  <a href="#">PHP</a>
  <a href="#">JS</a>-->
  <br>
  <?php
    include_once 'database.php';
    $dbConn = getDatabaseConnection();
    $sql = "SELECT name from decks"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    foreach ($records as $record){
        echo '<span id="' . $record['name'] . '" onclick="getCards(this.id)">' . $record['name'] . '</span>';
    }
  ?>
</div>

<script type="text/javascript" src="functions.js"></script>