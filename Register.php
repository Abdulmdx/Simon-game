<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#btnReg").click(function(){ // When click on button
                var data = $(".inputReg").serialize(); // serialize data into values
                 
                // Perform Ajax request
                $.ajax({
                    type: "POST",
                    url: "RegisterData.php",
                    data: data,
                    success: function(response){
                        $("#result").html(response);
                    }
                    
                });
            });
        });
    </script>
</head>

<body>
    <div class="navBar">
        <image src="http://www.typophile.com/sites/default/files/old-images/Simon_4363.png" height="98" style="float:left">
            <a href="High-Score.php">High Score</a>
            
            <a href="Login.php">Login</a>
        
            <a href="Register.php">Register</a>
        
            <a href="index.php">Home</a>
    </div>

    <form class="inputReg" method="post">
    <div id="result"></div>
        <input type="text" id="firstname" name="firstname" placeholder=" Firstname" required><br/>
        <input type="text" id="lastname" name="lastname" placeholder=" Lastname" required><br/>
        <input type="text" id="email" name="email" placeholder=" Email" required><br/>
        <input type="password" id="password"name="password" placeholder=" Password" required><br/>
        <button id="btnReg" type="button"> REGISTER</button>
    </form>
</body>
</html>