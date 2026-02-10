
<?php

require_once "../../model/FileFunctionsBooks.php";
require_once "../../model/MathFunctions.php";

$minYear = filter_input(INPUT_POST, "minYear");
$maxYear = filter_input(INPUT_POST, "maxYear");

$res = BooksBetweenYears($minYear,$maxYear, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}
$result = setcookie('resultBooksBetweenYears', $stringResult, 0, '/');
header('location: ../../views/activities/BooksFileView.php#BooksBetweenYears');
