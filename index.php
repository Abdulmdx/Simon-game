<?php
session_start(); // start a session

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simon game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="simons.js"></script>
</head>
<body>
        <div class="navBar">
            <image src="http://www.typophile.com/sites/default/files/old-images/Simon_4363.png" height="98" style="float:left">
            <a  href="High-Score.php">High Score</a>

            <?php
            // check if user is logged in
               if(isset($_SESSION['loggedin'])){
                   echo '<a class="btnOut" href ="logout.php">LOGOUT</a>';
               }else{
                   echo '<a href="Login.php">Login</a>
            
                         <a href="Register.php">Register</a>';

                   $_SESSION['firstname'] = "You are not logged in";
                   $_SESSION['lastname'] = "please sign in before playing";
               }
            ?>
            
                <a href="index.php">Home</a>
        </div>
        <div id="result" style="text-align:center"> Press the start button to play <br/><?=$_SESSION['firstname']. " " . $_SESSION['lastname']?></div>
        <div id="score" style="text-align:center"></div>
        <div class="mainGrid">
            <div class="square one" id="1"></div>
            <div class="square two" id="2"></div>
            <div class="square three" id="3"></div>
            <div class="square four" id="4"></div>
            <div class="round"><h2 class="r2" style="color:white;text-align:center">Level <br/> 0</h2></div>
            </div>
            <?php
            if(isset($_SESSION['loggedin'])){
                echo '<button class="btn">START</button>';
            }
            ?>
</body>
</html>