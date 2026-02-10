
<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$year = filter_input(INPUT_POST, "year");
$topic = filter_input(INPUT_POST, "topic");

$res = BooksByTopicAndYear($topic,$year, "../../llibres.csv");

if ($res) {
    $stringResult = arrayToString($res);
    $stringResult = str_replace(",","<br>",$stringResult);
}else{
    $stringResult = "Sense Resultats";
}
setcookie('resultBooksByTopicAndYear', $stringResult, 0, '/');

header('location: ../../views/activities/BooksFileView.php#BooksByTopicAndYear');
