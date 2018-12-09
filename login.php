<!DOCTYPE html>
<?php

session_start(); 
include_once 'database.php';

$loginInfo = $_POST['loginInfo'];
var_dump($loginInfo);
$username = $loginInfo[0];
$password = $loginInfo[1];
validate($username, $password);

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
        header('Location: profile.php');
    }  else {
        header('Location: index.php');
    }
}

?>
