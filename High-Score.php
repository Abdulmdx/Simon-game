<?php
session_start(); // start a seesion

$con = new mysqli("localhost", "root", "M00495457aug", "simon") or die($con->error); // coonect with database
        
        // select all the record from score and order them descending
        $result = $con->query("SELECT * FROM score ORDER BY score DESC") or die($con->error); 

        if($result->num_rows == 0){ // check if score exist
            $_SESSION['message'] = "score does not exist";
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>High score</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
</head>
<body>
    <div class="navBar">
        <image src="http://www.typophile.com/sites/default/files/old-images/Simon_4363.png" height="98" style="float:left">

            <a href="High-Score.php">High Score</a>
        <?php
        
           // check if user is logged in
           if(isset($_SESSION['loggedin'])){
               echo '<a class="btnOut" href ="logout.php">LOGOUT</a>';
           }else{
               echo '<a href="Login.php">Login</a>
            
                     <a href="Register.php">Register</a>';

           }
        ?>    
        
            <a href="index.php">Home</a>
    </div>
    <div style="text-align:center"><?= $_SESSION['message']?></div>
    <table class="table">
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Score</th>
        </tr>
        <?php
        // fetch a result user as an associative array then display every record
           while($row = $result->fetch_assoc()){ 
               echo "<tr>";
               echo "<th>".$row['firstname']."</th>";
               echo "<th>".$row['lastname']."</th>";
               echo "<th>".$row['score']."</th>";
               echo "</tr>";
           }
        ?>
    </table>
</body>
</html>