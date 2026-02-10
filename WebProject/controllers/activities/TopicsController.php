
<?php

require_once "../../model/FileFunctionsBooks.php";
require_once "../../model/MathFunctions.php";


$stringResult = Topics("../../llibres.csv");

if (!$stringResult) {
    $stringResult = "Sense Resultats";
}
$result = setcookie('resultTopics', $stringResult, 0, '/');
header('location: ../../views/activities/BooksFileView.php#Topic');
