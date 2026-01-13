<?php

include_once '../../model/MathFunctions.php';


$min = filter_input(INPUT_POST, "min");
$max = filter_input(INPUT_POST, "max");
$size = filter_input(INPUT_POST, "size");
$stats = filter_input(INPUT_POST, "stats");
$order = filter_input(INPUT_POST, "order");
$find = filter_input(INPUT_POST, "find");
$first = filter_input(INPUT_POST, "first");
$all = filter_input(INPUT_POST, "all");

$array = fillArray($size, $min, $max);

print "<h3>Array generat:</h3>";
printArray($array);

if ($stats) {
    $statsMin;
    $statsMax;
    $statsAvg;
    arrayStats($array, $statsMin, $statsMax, $statsAvg);
    print "<h3>Estadístiques:</h3>";
    print "Valor mínim: $statsMin";
    print "<br>";
    print "Valor màxim: $statsMax";
    print "<br>";
    print "Valor mig: $statsAvg";
    print "<br>";
}

if ($order == "asc") {
    arraySortAsc($array);
    print "<h3>Array ordenat ascendentment:</h3>";
    printArray($array);
} elseif ($order == "desc") {
    arraySortDesc($array);
    print "<h3>Array ordenat Descendentment:</h3>";
    printArray($array);
}

if ($first) {
    print "<h3>Primera aparició de $find :</h3>";
    $firstMatch = controllerFindFirst($find, $array, $order);
    if ($firstMatch == -1) {
        print "ERROR: número $find no trobat a l'array";
        print "<br>";
    } else {
        print "$firstMatch";
        print "<br>";
    }
}

if ($all) {
    print "<h3>Totes les aparicions de $find</h3>";
    $allMatches = controllerFindAll($find,$array,$order);
    if ($firstMatch == -1) {
        print "ERROR: número $find no trobat a l'array";
        print "<br>";
    } else {
        printArray($allMatches);
        print "<br>";
    }
}


function controllerFindFirst($num, $array, $order)
{
    if ($order == "asc") {
        return binSearchAsc($num, $array);
    } elseif ($order == "desc") {
        return binSearchDesc($num, $array);
    } else {
        return linSearch($num, $array);
    }
}
function controllerFindAll($num, $array, $order)
{
    if ($order == "asc") {
        return binSearchAll($num, $array,true);
    } elseif ($order == "desc") {
        return binSearchAll($num, $array,false);
    } else {
        return linSearchAll($num, $array);
    }
}
