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
