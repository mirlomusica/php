<?php

function maxValueReference(&$value1, &$value2): int
{
    $value1 = 101;
    $value2 = 102;
    if ($value1 > $value2) {
        return $value1;
    } else {
        return $value2;
    }
}

function maxValueValue($value1, $value2): int
{
    $value1 = 101;
    $value2 = 102;
    if ($value1 > $value2) {
        return $value1;
    } else {
        return $value2;
    }
}

$n1 = rand(0, 10);
$n2 = rand(0, 10);

print("Valors originals: $n1 $n2");
print("<br>");

$high = maxValueValue($n1, $n2);

print "El major de $n1 i $n2 és $high (value)";

print("<br>");

$high = maxValueReference($n1, $n2);

print "El major de $n1 i $n2 és $high (reference)";
