<?php

include_once '../../model/ArrayFunctions.php';
include_once '../../model/MathFunctions.php';

$numTermes = filter_input(INPUT_POST,"numTermes");
$fib1 = filter_input(INPUT_POST,"fib1");
$fib2 = filter_input(INPUT_POST,"fib2");

$res = fibonacci($fib1, $fib2, $numTermes);

//printArray($res);
printDetailsArray($res);



