<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$topic = filter_input(INPUT_POST, "topic");

$res = AuthorsByTopic($topic, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}

setcookie('resultAuthorsByTopic', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php');

