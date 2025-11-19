<?php

include_once '../../model/MathFunctions.php';


$num1 = filter_input(INPUT_POST, "num1");
$num2 = filter_input(INPUT_POST, "num2");

$res = mcm($num1, $num2);

print "El mcm de $num1 i $num2 és $res";