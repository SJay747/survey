<?php

$mysql_host = "localhost";
$mysql_username = "collabo_survey_user";
$mysql_password = "e7TFZOzWxUj49itQ";
$mysql_database = "collabo_survey";

//process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    $u_age  = $_POST["survey_age"];
    $u_postcode = $_POST["survey_postcode"];
    $u_name = $_POST["survey_name"];
    $u_genre = $_POST["survey_genre"];
    $u_skill = $_POST["survey_skill"];
    $u_genre = $_POST["survey_genre"];
    $u_years = $_POST["survey_years"];
    $u_hours = $_POST["survey_hours"];
    $u_email = $_POST["survey_email"];

    $q1_score = $_POST["q1_score"];
    $q1_tickbox = implode(', ', $_POST["q1_tickbox"]);

    $q2_score = $_POST["q2_score"];

    $q3_score = $_POST["q3_score"];
    $q3_tickbox = implode(', ', $_POST["q3_tickbox"]);

    $q4_score = $_POST["q4_score"];

    $q5_score = $_POST["q5_score"];
    $q5_tickbox = implode(', ', $_POST["q5_tickbox"]);
    $q5_explain = $_POST["q5_explain"];

    $q6_score = $_POST["q6_score"];
    $q6_explain = $_POST["q6_explain"];

    $q7_score = $_POST["q7_score"];
    $q7_tickbox = implode(', ', $_POST["q7_tickbox"]);
    $q7_explain = $_POST["q7_explain"];

    $q8_score = $_POST["q8_score"];

    $q9_score = $_POST["q9_score"];
    $q9_explain = $_POST["q9_explain"];

    $q10_score = $_POST["q10_score"];
    $q10_explain = $_POST["q10_explain"];

    $q11_score = $_POST["q11_score"];

    $q12_score = $_POST["q12_score"];
    $q12_tickbox = implode(', ', $_POST["q12_tickbox"]);

    $q13_score = $_POST["q13_score"];
    $q13_tickbox = implode(', ', $_POST["q13_tickbox"]);

    $q14_score = $_POST["q14_score"];

    $q15_score = $_POST["q15_score"];
    $q15_explain = $_POST["q15_explain"];

    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

    $statement = $mysqli->prepare("INSERT INTO survey_data (q1_score, q1_tickbox, q1_explain, q2_score, q2_tickbox, q2_explain, q3_score, q3_tickbox, q3_explain, q4_score, q4_tickbox, q4_explain, q5_score, q5_tickbox, q5_explain, q6_score, q6_tickbox, q6_explain, q7_score, q7_tickbox, q7_explain, q8_score, q8_tickbox, q8_explain, q9_score, q9_tickbox, q9_explain, q10_score, q10_tickbox, q10_explain, q11_score, q11_tickbox, q11_explain, q12_score, q12_tickbox, q12_explain, q13_score, q13_tickbox, q13_explain, q14_score, q14_tickbox, q14_5explain, q15_score, q15_tickbox, q15_explain ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('issississississississississississississississ',
      $q1_score,  $q1_tickbox, "",
      $q2_score, "", "",
      $q3_score,  $q3_tickbox, "",
      $q4_score, "", "",
      $q5_score,  $q5_tickbox,  $q5_explain,
      $q6_score,  $q6_explain, "",
      $q7_score,  $q7_tickbox,  $q7_explain,
      $q8_score, "", "",
      $q9_score,  $q9_explain, "",
      $q10_score, $q10_explain, "",
      $q11_score, "", "",
      $q12_score, $q12_tickbox, "",
      $q13_score, $q13_tickbox, "",
      $q14_score, "", "",
      $q15_score, $q15_explain, ""
  ); //bind values and execute insert query

    if($statement->execute()){
        print "Hello " . $u_name . "!, your message has been saved!";
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>
