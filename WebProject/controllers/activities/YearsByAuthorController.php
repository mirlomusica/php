
<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$author = filter_input(INPUT_POST, "author");

$res = YearsByAuthor($author, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}
setcookie('resultYearsByAuthor', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php#YearsByAuthor');
