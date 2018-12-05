<!DOCTYPE html>
<?php 
  session_start();
  include 'sidebar.php';
  
      
    if(empty($_SESSION['user'])){
        //Redirect them to the login page.
        header("Location: login.php");
        
        //Ends this script when if is hit so profile cannot be accessed without login credentials
        die("Redirecting to login.php");
    }
?>
<html lang="en">
  <head>
    <title>Stack Overcard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
    
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

