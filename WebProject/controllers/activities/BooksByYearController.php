<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$year = filter_input(INPUT_POST, "year");

$res = BooksByYear($year, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}

setcookie('result', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php');
