<?php
include "nbaArray.php";

function questAleat($theme = "nba")
{

    $questions = chooseTheme($theme);
    $rand = rand(0, count($questions) - 1);
    return $questions[$rand];
}




function chooseTheme($theme)
{
    global $nbaQuest;
    switch ($theme) {
        case "nba":
            return $nbaQuest;
        default:
            return [];
    }
}

function printQuestion($question)
{
    $quest = $question["quest"];
    $a = $question["a)"];
    $b = $question["b)"];
    $c = $question["c)"];
    $res = $question["resp"];

    print "<h1>$quest</h1>";
    print "<b>a)</b> $a<br>";
    print "<b>b)</b> $b<br>";
    print "<b>c)</b> $c<br>";
    print "<b>Resposta:</b> $res<br>";
}
