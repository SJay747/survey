<?php

$mysql_host = "localhost";
$mysql_username = "collabo_survey_user";
$mysql_password = "e7TFZOzWxUj49itQ";
$mysql_database = "collabo_survey";

//process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    $u_name = $_POST["survey_name"]; //set PHP variables like this so we can use them anywhere in code below
    $u_email = $_POST["survey_email"];
    $u_text = $_POST["user_text"];
    $q1_score = $_POST["q1q1_score"];
    $q1_tickbox = implode(', ', $_POST["q1_tickbox"]);
    $q1_explain = $_POST["q1_explain"];

    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $statement = $mysqli->prepare("INSERT INTO survey_data (q1_score, q1_tickbox, q1_explain) VALUES(?, ?, ?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('iss', $q1_score, $q1_tickbox, $q1_explain); //bind values and execute insert query

    if($statement->execute()){
        print "Hello " . $u_name . "!, your message has been saved!";
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>
