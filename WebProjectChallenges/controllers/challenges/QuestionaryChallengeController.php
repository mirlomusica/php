<?php
session_start();

include "../../model/questions.php";

function challengeInit()
{
    $_SESSION["questionChallengeStarted"] = true;
    $_SESSION["intentos"] = 10;
}


function newQuestion()
{
    $question = questAleat();
    setcookie("intentos", $_SESSION["intentos"], 0, "/");
    setcookie("pregunta", $question["quest"], 0, "/");
    setcookie("a)", $question["a)"], 0, "/");
    setcookie("b)", $question["b)"], 0, "/");
    setcookie("c)", $question["c)"], 0, "/");
    $_SESSION["question"] = $question;
}

if (!$_SESSION["questionChallengeStarted"]) {
    challengeInit();
    newQuestion();
    header('location: ../../views/ArrayChallengeView.php');
}

$resposta = filter_input(INPUT_POST, "resposta");
$prevQuestion = $_SESSION["question"];

if($resposta == $prevQuestion["resp"]){
    setcookie("correctAnswer", true, 0, "/");
}else{
    setcookie("correctAnswer", false, 0, "/");
}

newQuestion();



header('location: ../../views/ArrayChallengeView.php');
