<?php


include "./nbaQuests.php";

function questAleat($index,$theme="nba",$numRes){

    $questions = chooseTheme($theme);

}



function chooseTheme($theme){
    global $nbaQuest;
    switch($theme){
        case "nba":
            return $nbaQuest;
        default:
            return [];
    }
}

