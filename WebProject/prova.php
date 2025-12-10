<?php


include_once './model/MathFunctions.php';

$array = fillArray(20,0,10);
printArray($array);

$max =0;
$min =0;
$avg =0;

arrayStats($array,$min,$max,$avg);
print $min;
print "<br>";
print $max;
print "<br>";
print $avg;
print "<br>";

arraySort($array);
printArray($array);
arraySort($array,false);
$s = arrayToString($array);
print $s;
print "<br>";

$pos = linSearch(4,$array);
print "position 4: $pos";
print "<br>";

