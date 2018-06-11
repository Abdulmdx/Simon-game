<?php

session_start();

$con = new mysqli("localhost", "root", "M00495457aug", "simon") or die($con->error); // open a connection to mysql

$firstname = $_SESSION['firstname'];
$lastname = $_SESSION['lastname'];
$score = $con->real_escape_string($_POST['score']);

//insert data into database
$result = $con->query("INSERT INTO score (firstname, lastname, score) VALUES ('$firstname','$lastname','$score')");

if($result){
    echo "How far did you go check the high acore page to see your rank";
}else{
    echo "Faild to submit data";
}


?>