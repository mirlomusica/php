<?php

require_once "../../model/FileFunctionsBooks.php";
require_once "../../model/MathFunctions.php";

$filePath = filter_input(INPUT_POST, "filePath");
$data = filter_input(INPUT_POST,"data");
$overwrite = filter_input(INPUT_POST,"overwrite");

if($overwrite){
    $ok = WriteStringData($data, $filePath);
}else{
    $ok = AppendStringData($data,$filePath);
}

if($ok){
    $stringResult = "Dades escrites Correctament";
}else{
    $stringResult = "Error en la escriptura";
}

$result = setcookie('resultWriteStringData', $stringResult, 0, '/');
header('location: ../../views/activities/BooksFileView.php#WriteStringData');
