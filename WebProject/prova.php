<?php


include_once './model/MathFunctions.php';

$array = fillArray(20, 0, 10);
printArray($array);

$max = 0;
$min = 0;
$avg = 0;

arrayStats($array, $min, $max, $avg);
print $min;
print "<br>";
print $max;
print "<br>";
print $avg;
print "<br>";

arraySort($array);
printArray($array);
arraySort($array, false);
$s = arrayToString($array);
print $s;
print "<br>";

$pos = linSearch(4, $array);
print "position 4: $pos";
print "<br>";


$pos = binSearch(4, $array);
print "position 4: $pos";
print "<br>";



print "<h1>Prova array 10 pos</h1>";
$array = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
$str = arrayToString($array);
print "array: $str";
print "<br>";

for ($i = 0; $i < count($array) + 2; $i++) {
    $pos = binSearch($i, $array);
    print "pos $i: $pos";
    print "<br>";
}


print "<h1>Prova valors repetits</h1>";
$array = [0, 1, 1, 1, 4, 5, 6, 7, 8, 9];
$str = arrayToString($array);
print "array: $str";
print "<br>";
$pos = binSearch(1, $array);
print "pos 1: $pos";
print "<br>";

print "<h2>linSearchAll:</h2>";
print "array: $str";
print "<br>";
$pos = linSearchAll(1,$array);
$res = arrayToString($pos);
print "posicions del 1: $res";
$test = ( $pos ==[1,2,3]);
print "<br>";
print "test result: $test";


print "<h2>binSearchAll:</h2>";
print "array: $str";
print "<br>";
$pos = binSearchAll(1,$array);
$res = arrayToString($pos);
print "posicions del 1: $res";
$test = ( $pos ==[1,2,3]);
print "<br>";
print "test result: $test";



print "<h1>Prova valors repetits (descendent)</h1>";
$array = [0, 1, 1, 1, 4, 5, 6, 7, 8, 9];
arraySort($array,false);
$str = arrayToString($array);
print "array: $str";
print "<br>";
$pos = binSearch(1, $array, false);
print "pos 1: $pos";
print "<br>";

print "<h2>linSearchAll:</h2>";
print "array: $str";
print "<br>";
$pos = linSearchAll(1,$array);
$res = arrayToString($pos);
print "posicions del 1: $res";
$test = ( $pos ==[1,2,3]);
print "<br>";
print "test result: $test";


print "<h2>binSearchAll:</h2>";
print "array: $str";
print "<br>";
$pos = binSearchAll(1,$array, false);
$res = arrayToString($pos);
print "posicions del 1: $res";
$test = ( $pos ==[1,2,3]);
print "<br>";
print "test result: $test";



