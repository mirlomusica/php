
<?php
include "./model/MathFunctions.php";
  
print "<h1>Prova array tocho</h1>";
$array = fillArray(8000, 0, 9);
$array2 =$array;

$old_t0 =microtime(true);
arraySortAscOld($array);
$old_t1 = microtime(true);

$old_microtime = $old_t1 - $old_t0;

$new_t0 = microtime(true);
    arraySortAsc($array2);
$new_t1 = microtime(true);

$new_microtime = $new_t1 - $new_t0;

print "Alg original : $old_microtime ms";
print "<br>";
print "Nou Alg: $new_microtime ms";
print "<br>";
$frac = (1-($new_microtime/$old_microtime))*100;
print "porcentaje mejora = $frac";
print "<br>";

$str1 = arrayToString($array);
$str2 = arrayToString($array2);

print $str1;
print "<br>";
print $str2;
