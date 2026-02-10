<?php

require_once "../../model/FileFunctionsBooks.php";
require_once "../../model/MathFunctions.php";

$minPrice = filter_input(INPUT_POST, "minPrice");
$maxPrice = filter_input(INPUT_POST, "maxPrice");

$res = BooksByPrice($minPrice,$maxPrice, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
    $stringResult = str_replace(",","<br>",$stringResult);
}else{
    $stringResult = "Sense Resultats";
}
$result = setcookie('resultBooksByPrice', $stringResult, 0, '/');
header('location: ../../views/activities/BooksFileView.php#BooksByPrice');
