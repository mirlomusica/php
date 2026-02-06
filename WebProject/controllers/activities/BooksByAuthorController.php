
<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$author = filter_input(INPUT_POST, "author");

$res = BooksByAuthor($author, "../../llibres.csv");

if ($res) {
    $stringResult = str_replace(";","<br>",$res);
}else{
    $stringResult = "Sense Resultats";
}


setcookie('resultBooksByAuthor', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php');

