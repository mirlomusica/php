<?php

include "ArrayFunctions.php";

function BooksByYear($year, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[4] == $year) {
            $res[] = $fields[0];
        }
    }
    return $res;
}

function AuthorsByTopic($topic, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[3] == $topic && !arrayContains($res,$fields[2])) {
            $res[] = $fields[2];
        }
    }
    return $res;
}

function BooksByAuthor($author, $filePath)
{
    $res = "";
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[2]== $author) {
            if($res != ""){
                $res .= ";";
            }
            $res .= $fields[1]."(".$fields[5].")";

        }
    }
    return $res;
}


function BooksByPartialTitle($partialTitle, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if (str_contains($fields[1], $partialTitle)) {
            $res[] = $fields[0];

        }
    }
    return $res;
}


function BooksByPrice($minPrice,$maxPrice, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[5]>$minPrice && $fields[5]<$maxPrice) {
            $res[] = $fields[1]."(".$fields[2]."):".$fields[5];

        }
    }
    return $res;
}

function YearsByAuthor($author, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[2]==$author) {
            $res[] = $fields[4];

        }
    }
    return $res;
}

function Topics($filePath){
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if(!arrayContains($res,$fields[3])){
            $res[] = $fields[3];
        }
    }
    $stringRes = arrayToString($res);
    $stringRes = str_replace(",",";",$stringRes);
    return $stringRes;


}

function InfoByAuthor($author,$filePath){
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if($fields[2]==$author){
            $bookinfo = "$fields[1]($fields[3])-$fields[4]:$fields[5]"; 
            $res[] = $bookinfo;
        }
    }
    return $res;


}

function BooksBetweenYears($minYear,$maxYear, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[4]>$minYear && $fields[4]<$maxYear) {
            $res[] = $fields[0];

        }
    }
    return $res;
}

function BooksByTopicAndYear($topic,$year, $filePath)
{
    $res = [];
    $file = fopen($filePath, "r");
    while (($line = fgets($file)) !== false) {
        $fields = explode(",", $line);
        if ($fields[4]==$year && $fields[3]==$topic) {
            $res[] = "$fields[1]: $fields[2]";

        }
    }
    return $res;
}

function WriteStringData($stringData, $filePath){
    $file = fopen($filePath, "w");
    $ok = fwrite($file, $stringData);
    return $ok;
}

function AppendStringData($stringData, $filePath){
    $file = fopen($filePath, "a");
    $ok = fwrite($file, $stringData);
    return $ok;
}

function stringWriteOrAppend($stringData, $filePath, $overwrite){
    if($overwrite){
        $ok = WriteStringData($stringData, $filePath);
    }else{
        $ok = AppendStringData($stringData, $filePath);
    }
    if ($ok === false) return false;
    else return true;
}

function WriteArrayData($array, $filePath){
    $stringData = arrayFormatForFiles($array);
    $file = fopen($filePath, "w");
    $ok = fwrite($file, $stringData);
    return $ok;
}

function AppendArrayData($array, $filePath){
    $stringData = arrayFormatForFiles($array);
    $file = fopen($filePath, "a");
    $ok = fwrite($file, $stringData);
    return $ok;
}

function ArrayWriteOrAppend($array, $filePath, $overwrite){
    if($overwrite){
        $ok = WriteArrayData($array, $filePath);
    }else{
        $ok = AppendArrayData($array, $filePath);
    }
    if ($ok === false) return false;
    else return true;
}
