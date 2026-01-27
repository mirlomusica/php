<?php
session_start();

include "../../model/questions.php";

function challengeInit()
{
    $_SESSION["intentos"] = 10;
}

if (!$_SESSION["questionChallengeStarted"]) {
    $_SESSION["questionChallengeStarted"] = true;
    challengeInit();
}
$question = questAleat();
setcookie("intentos", $_SESSION["intentos"], 0, "/", "localhost");
setcookie("pregunta", $question["quest"], 0, "/", "localhost");
setcookie("a)", $question["a)"], 0, "/", "localhost");
setcookie("b)", $question["b)"], 0, "/", "localhost");
setcookie("c)", $question["c)"], 0, "/", "localhost");





header('location: ../../views/ArrayChallengeView.php');
