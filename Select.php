<?php

session_start();

$con = new mysqli("localhost", "root", "M00495457aug", "simon") or die($con->error); // open a connection to mysql

// escape variable for security
$email = $con->real_escape_string($_POST['email']);
$password = $con->real_escape_string(md5($_POST['password']));

// Select email and password from database
$result = $con->query("SELECT * FROM player WHERE email ='$email' AND password='$password'") or die($con->error());

if($result->num_rows == 0){ // check if email and password are in database
     echo "user does not exist";
     $_SESSION['loggedin'] = false;
}else{
    $user = $result->fetch_assoc(); // fetch a result user as an associative array

    $_SESSION['loggedin'] = true;
    $_SESSION['firstname'] = $user['firstname'];
    $_SESSION['lastname'] = $user['lastname'];

    echo "Thank you for logging ". $user['firstname']. " " . $user['lastname'] . " please navigate to the home page to play";  
}

?>