<?php

//CUSTOMIZE THE IF STATEMENT TO USE YOUR DATABASE FOR TESTING
//DO NOT PUSH CUSTOMIZED IF STATEMENT WITHOUT OK-ING IT WITH TEAM

// connect to our mysql database server
function getDatabaseConnection() {
    if (strpos($_SERVER['SERVER_NAME'], "c9users") !== false) {
        // running on cloud9
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b5c8793353d2d0";
        $password = "40062f6e"; // best practice: define this in a separte file
        $dbname = "heroku_4646478069544f6"; 
    } else {
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b5c8793353d2d0";
        $password = "40062f6e";
        $dbname = "heroku_4646478069544f6"; 
    }
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbConn; 
}
// temporary test code
//$dbConn = getDatabaseConnection(); 
?>