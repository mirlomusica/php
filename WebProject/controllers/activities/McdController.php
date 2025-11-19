<?php

include_once '../../model/MathFunctions.php';


$num1 = filter_input(INPUT_POST, "num1");
$num2 = filter_input(INPUT_POST, "num2");


$res = mcd($num1, $num2);
print "El MCD de $num1 i $num2 és $res";


