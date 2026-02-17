<?php

include "../../model/FileFunctionsBooks.php";
include "../../model/MathFunctions.php";

$topic = filter_input(INPUT_POST, "topic");

$res = AuthorsByTopic($topic, "../../llibres.csv");


$filePath = filter_input(INPUT_POST, "filepath");
$overwrite = filter_input(INPUT_POST, "overwrite");
if($filePath){
    $ok = arrayWriteOrAppend($res, $filePath, $overwrite);
    if($ok){
        $writeMessage = "Dades desades correctament";
    }else{
        $writeMessage = "Error al desar les dades";
    }
    
}else{
    $writeMessage = "Les dades no s'han desat (ruta de l'arxiu no especificada)";
}
//formatem stringResult per a la sortida
$stringResult = arrayToString($res);
if($stringResult == ""){
    $stringResult = "Sense Resultats";
}

setcookie('resultAuthorsByTopic', $stringResult, 0, '/');
setcookie('resultAuthorsByTopicWrite', $writeMessage, 0, '/');

header('location: ../../views/activities/BooksFileView.php#AuthorsByTopic');

