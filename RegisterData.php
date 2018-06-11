<?php

$con = new mysqli("localhost", "root", "M00495457aug", "simon") or die($con->error); // open a connection to mysql
        
        // escape variables for security
        $firstname = $con->real_escape_string($_POST['firstname']);
        $lastname = $con->real_escape_string($_POST['lastname']);
        $email = $con->real_escape_string($_POST['email']);
        $password = $con->real_escape_string(md5($_POST['password']));

        //insert data into database
        $result = $con->query("INSERT INTO player (firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$password')");

        if($result){
            echo "new record created successfully";
        }else{
            echo "Faild to register";
        }

    

?>