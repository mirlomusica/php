
<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$author = filter_input(INPUT_POST, "author");

$res = InfoByAuthor($author, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
}else{
    $stringResult = "Sense Resultats";
}

setcookie('resultInfoByAuthor', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php#InfoByAuthor');
