$(document).ready(function(){
    
    var simonArray = []; // array for game
    var playerArray = []; // array for player
    var level = 0; // score

    function startGame(){
    var simonArray = [];
    var playerArray = [];
    var level = 0;
    }

    function addNumber(){
        var val = 1 + Math.floor(Math.random() * 4); // insert random number to variable val
        
        simonArray.push(JSON.stringify(val)); // push val into array after applying stringify
        playSimon();
    }

    function playSimon(){
        $.each(simonArray, function(i, value){ // go through each value in simonArray 

            // change opacity every second times index
            setTimeout(function(){
                $("#" + value).animate({
                    opacity: 0.5,
                },300).animate({
                    opacity: 1,
                }, 500)}, i* 1000);

        });
    }


    function playerTurn(){
        $(".square").click(function(){
            var simonSquare = $(this).attr("id"); // get id from square clicked
            
            $(this).animate({
                opacity: 0.5,
            },300).animate({
                opacity: 1,
            }, 500)

            playerArray.push(simonSquare); // push id of sqaure clickek into player's array
    
            if(simonArray.length == playerArray.length){ // check if both arrays have the same length

                if(JSON.stringify(simonArray) == JSON.stringify(playerArray)){ //stringify array then check if the are simalar
                    
                    level++;// add one to level if they are

                    $(".r2").html("Level <br/>" + level); // change text in index page with current score 
                    playerArray = [];

                    // wait 2 second before pushing another value to simon's array
                    setTimeout(function(){addNumber()}, 2000);
                    
                }else{
                    $("#result").html("Gameover your score is " + level); // display score if gameover
                    sendScore(level);
                    playerArray = [];
                    simonArray = [];
                    level = 0;

                    
                }
            }
        
        });
    }

    function sendScore(level){
        $.post("score.php", {
            score: level
        }, function(data, status){
            $("#score").html(data);
        })
    }
    
    $(".btn").click(function(){ //when click button start game 
        startGame();
        addNumber();
        playSimon();
        playerTurn();
    });
});