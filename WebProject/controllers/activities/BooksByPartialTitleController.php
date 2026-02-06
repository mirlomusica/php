
<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$partialTitle = filter_input(INPUT_POST, "partialTitle");

$res = BooksByPartialTitle($partialTitle, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}

setcookie('resultBooksByPartialTitle', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php');

