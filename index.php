<!DOCTYPE html>

<?php 
  session_start();
  include_once 'sidebar.php';
?>

<html>
  <head>
    <title>Stack Overcard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="functions.js"></script>
    
  </head>
  <body>
    <!--For content to be pushed by the sidebar, it MUST be in the div with the id "main". -->
    <!--Pushing the body tag doesn't seem to work >:( -->
    <div id="main">
      <!-- By including navbar in main, navbar can also be pushed by the sidebar rather than being overlayed -->
      <?php include_once 'navigation.php'; ?>
      <div id="content">
        <script>getDecks();</script>
      </div>
    </div>
  </body>
</html>