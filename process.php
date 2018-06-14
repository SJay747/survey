<?php
//process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {//Check it is coming from a form
    $u_name = $_POST["user_name"]; //set PHP variables like this so we can use them anywhere in code below
    $u_email = $_POST["user_email"];
    $u_text = $_POST["user_text"];
    
    $mysqli = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);
    
    //Output any connection error
    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }   
    
    $statement = $mysqli->prepare("INSERT INTO users_data (user_name, user_email, user_message) VALUES(?, ?, ?)"); //prepare sql insert query
    //bind parameters for markers, where (s = string, i = integer, d = double,  b = blob)
    $statement->bind_param('sss', $u_name, $u_email, $u_text); //bind values and execute insert query
    
    if($statement->execute()){
        print "Hello " . $u_name . "!, your message has been saved!";
    }else{
        print $mysqli->error; //show mysql error if any
    }
}
?>