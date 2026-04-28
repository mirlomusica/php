<?php

include_once __DIR__."/../model/products/Software.php";


$id = 1;
$name = "dsfgdfs";
$author = "asdfs";
$price = 1;
$releaseDate = "12-12-2021";
$serialNumber = 1;
$compatibleOS = "fdgdf";
$version = "V.123.123.123";
try {
    $s = new Software($id, $name, $author, $price, $releaseDate, $serialNumber, $compatibleOS, $version);
    print "Software creat correctament";
    print "<br>";
}catch(BuildException $ex){
    echo "ERROR: ".$ex->getMessage();
    print "<br>";
}

$id = 0;
$name = "dsfgdfs";
$author = "asdfs";
$price = -3;
$releaseDate = false;
$serialNumber = 1;
$compatibleOS = "fdgdf";
$version = "versions";
try {
    $s = new Software($id, $name, $author, $price, $releaseDate, $serialNumber, $compatibleOS, $version);
    print "Software creat correctament";
    print "<br>";
}catch(BuildException $ex){
    $msg = str_replace(", ","<br>",$ex->getMessage());
    echo "ERROR: <br>".$msg;
    print "<br>";
}
