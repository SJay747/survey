<?php

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

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
    $u_years = $_POST["survey_years"];
    $u_hours = $_POST["survey_hours"];
    $u_email = $_POST["survey_email"];

    $q0_score = $_POST["q0_score"];

    $q1_score = $_POST["q1_score"];
    $q1_tickbox = implode(', ', $_POST["q1_tickbox"]);
    $q1_explain = $_POST["q1_explain"];

    $q2_score = $_POST["q2_score"];

    $q3_score = $_POST["q3_score"];
    $q3_tickbox = implode(', ', $_POST["q3_tickbox"]);
    $q3_explain = $_POST["q3_explain"];

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

    $q16_tickbox = $_POST["q16_score"];
    $q16_explain = $_POST["q16_explain"];

    //print "here";
	//console_log("here");

    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }

/*
console_log($q1_score);
console_log($q1_tickbox);
console_log($q1_explain);
console_log($q2_score);
console_log($q3_score);
console_log($q3_tickbox);
console_log($q3_explain);
console_log($q4_score);
console_log($q5_score);
console_log($q5_explain);
console_log($q6_score);
console_log($q6_explain);
console_log($q7_score);
console_log($q7_tickbox);
console_log($q7_explain);
console_log($q8_score);
console_log($q9_score);
console_log($q9_explain);
console_log($q10_score);
console_log($q10_explain);
console_log($q11_score);
console_log($q12_score);
console_log($q12_tickbox);
console_log($q13_score);
console_log($q13_tickbox);
console_log($q14_score);
console_log($q15_score);
console_log($q15_explain);
console_log($u_age);
console_log($u_postcode);
console_log($u_name);
console_log($u_genre);
console_log($u_skill);
console_log($u_years);
console_log($u_hours);
console_log($u_email);
*/

	$statement = $mysqli->prepare("INSERT INTO survey_data (q0_score, q1_score, q1_tickbox, q1_explain, q2_score, q3_score, q3_tickbox, q3_explain, q4_score, q5_score, q5_tickbox, q5_explain, q6_score, q6_explain, q7_score,  q7_tickbox,  q7_explain, q8_score, q9_score, q9_explain, q10_score, q10_explain, q11_score, q12_score, q12_tickbox, q13_score, q13_tickbox, q14_score, q15_score, q15_explain, u_age, u_postcode, u_name, u_genre, u_skill, u_years, u_hours, u_email, q16_tickbox, q16_explain) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)

    $statement->bind_param('iissiissiissisissiisisiisisiisissssiisss', $q1_score, $q1_score,  $q1_tickbox, $q1_explain, $q2_score, $q3_score, $q3_tickbox, $q3_explain, $q4_score, $q5_score,  $q5_tickbox,  $q5_explain, $q6_score,  $q6_explain, $q7_score,  $q7_tickbox,  $q7_explain, $q8_score, $q9_score,  $q9_explain, $q10_score, $q10_explain, $q11_score, $q12_score, $q12_tickbox, $q13_score, $q13_tickbox, $q14_score, $q15_score, $q15_explain, $u_age, $u_postcode, $u_name, $u_genre, $u_skill, $u_years, $u_hours,$u_email, $q16_tickbox, $q16_explain); //bind values and execute insert query

    /*
    $statement = $mysqli->prepare("INSERT INTO survey_data (q1_score, q1_tickbox) VALUES(?, ?)");
    $statement->bind_param('is', $q1_score,  $q1_tickbox);

    $statement = $mysqli->prepare("INSERT INTO survey_data (q2_score) VALUES(?)");
    $statement->bind_param('i', $q2_score);

    $statement = $mysqli->prepare("INSERT INTO survey_data (q3_score, q3_tickbox) VALUES(?,?)");
    $statement->bind_param('is', $q3_score, $q3_tickbox);
    */

    if($statement->execute()){
        print "Hello " . $u_name . "!, your message has been saved!";
    }else{
        print $mysqli->error; //show mysql error if any
    }


	//console_log("herer");
echo "<script>window.close();</script>";
}
?>
