<!DOCTYPE html>

<?php 
  include 'sidebar.php';
?>

<html>
  <head>
    <title>Stack Overcard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    
  </head>
  <body>
    <!--For content to be pushed by the sidebar, it MUST be in the div with the id "main". -->
    <!--Pushing the body tag doesn't seem to work >:( -->
    <div id="main">
      <!-- By including navbar in main, navbar can also be pushed by the sidebar rather than being overlayed -->
      <?php include 'navigation.php'; ?>
      <div id="content">
        <h1>Stack Overcard</h1>
      </div>
    </div>
  </body>
</html>