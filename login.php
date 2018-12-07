<!DOCTYPE html>
<?php

session_start(); 
include_once 'database.php'; 

function validate($username, $password) {
    global $dbConn; 
    $dbConn = getDatabaseConnection(); 
    
    $sql = "SELECT * FROM `users` WHERE username=:username AND password=SHA(:password)"; 
    $statement = $dbConn->prepare($sql); 
    $statement->execute(array(':username' => $username, ':password' => $password));

    $records = $statement->fetchAll(); 
    
    if (count($records) == 1) {
        // login successful
        $_SESSION['user_id'] = $records[0]['user_id']; 
        $_SESSION['username'] = $records[0]['username']; 
        header('Location: index.php');
    }  else {
        echo "<div class='error'>Username and password are invalid </div>"; 
    }
}

?>

<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="main">
            <?php include_once 'navigation.php'; ?>
            <div id="content">
                <div id="authBox">
                    <h4>Login</h4>
                    
                    <?php 
                        if (isset($_POST['username'])) {
                            validate($_POST['username'], $_POST['password']);  
                        }
                    ?>
                    
                    <form method="POST">
                        Username: <input type="text" name="username"></input> <br/>
                        Password: <input type="password" name="password"></input> <br/>
                        <br><input type="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
