<?php
include_once "../model/exceptions/DateException.php";
include_once "../model/validations/Check.php";

print "<h1>Prova del patró Try/catch</h1>";


$datestring = "2023-23-12";

print "<h2>Data $datestring</h2>";
try {
    $datetime = setDate($datestring);
    print $datetime->format("d-m-y")." data formada correctament";
}catch (DateException $ex){
    print "ERROR:". $ex->getMessage();
}

$datestring = "45-12-2024";
print "<h2>Data $datestring</h2>";
try {
    $datetime = setDate($datestring);
    print "data formada correctament: ". $datetime->format("d-m-y");
}catch (DateException $ex){
    print "ERROR:". $ex->getMessage();
}

$datestring = "12-34-2024";
print "<h2>Data $datestring</h2>";
try {
    $datetime = setDate($datestring);
    print "data formada correctament: ". $datetime->format("d-m-y");
}catch (DateException $ex){
    print "ERROR:". $ex->getMessage();
}

$datestring = "12-12-1940";
print "<h2>Data $datestring</h2>";
try {
    $datetime = setDate($datestring);
    print "data formada correctament: ". $datetime->format("d-m-y");
}catch (DateException $ex){
    print "ERROR:". $ex->getMessage();
}

$datestring = "12-12-2020";
print "<h2>Data $datestring</h2>";
try {
    $datetime = setDate($datestring);
    print "data formada correctament: ". $datetime->format("d-m-y");
}catch (DateException $ex){
    print "ERROR:". $ex->getMessage();
}

function  setDate($date){
    $res = Check::isValidDate($date);

    if ($res !=0){
        $ex = new DateException(Check::errorMessage($res));
        throw $ex;
    }

    try {
        $datetime = new DateTime($date);
    }catch (Exception $ex){
        $dateEx = new DateException($ex->getMessage());
        throw $dateEx;
    }

    return $datetime;

}
