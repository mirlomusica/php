<?php

function divisors(int $num): array
{
    $divisors = [];

    if ($num > 0) {
        $divisors[] = 1;
        $divisors[] = $num;
        $maxdiv = sqrt($num);

        if ($num % 2 == 0) {
            $divisors[] = 2;
            $divisors[] = $num / 2;
            $inc = 1;
        } else {
            $inc = 2;
        }

        for ($div = 3; $div <= $maxdiv; $div += $inc) {
            if ($num % $div == 0) {
                $divisors[] = $div;
                if ($div != $maxdiv) {
                    $divisors[] = $num / $div;
                }
            }
        }
        sort($divisors);
    }
    return $divisors;
}

function isPrime(int $n): bool
{
    $maxdiv = sqrt($n);
    for ($i = 2; $i <= $maxdiv; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }
    return true;
}

function isPerfect($num)
{
    for ($j = 1; $j <= $num / 2; $j++) {
        if ($num % $j == 0) {
            $sumaDivisors = $sumaDivisors + $j;
        }
    }
    if ($sumaDivisors == $num) {
        return true;
    } else {
        return false;
    }
}

function fibonacci($fib1, $fib2, $numTermes)
{
    $res = [];
    if ($numTermes == 1) {
        $res[] = $fib1;
        return $res;
    } else {
        $res[] = $fib1;
        $res[] = $fib2;
        for ($iTermes = 0; $iTermes < $numTermes - 2; $iTermes++) {

            $nouTerme = $fib1 + $fib2;
            $res[] = $nouTerme;
            $fib1 = $fib2;
            $fib2 = $nouTerme;
        }
        return $res;
    }
}

function mcd($num1, $num2)
{
    if ($num1 > $num2) {
        $intercanviador = $num1;
        $num1 = $num2;
        $num2 = $intercanviador;
    }
    for ($j = 1; $j <= $num1; $j++) {
        if ($num1 % $j == 0 and $num2 % $j == 0) {
            $mcd = $j;
        }
    }
    return $mcd;
}

function mcm($num1, $num2)
{
    if ($num1 > $num2) {
        $temp = $num1;
        $num1 = $num2;
        $num2 = $temp;
    }

    for ($i = 2; $i <= $num1; $i++) {
        if ($num1 % $i == 0 && $num2 % $i == 0) {
            return $i;
        }
    }
    return 1;
}


function fillArray($arrayLength, $minVal, $maxVal)
{
    $res = [];
    for ($i = 0; $i < $arrayLength; $i++) {
        $val = rand($minVal, $maxVal);
        $res[] = $val;
    }
    return $res;
}

function arrayStats($array, &$minVal, &$maxVal, &$average)
{
    $minVal = $array[0];
    $maxVal = $array[0];
    $sum = 0;
    foreach ($array as $value) {
        if ($value < $minVal) {
            $minVal = $value;
        } elseif ($value > $maxVal) {
            $maxVal = $value;
        }
        $sum += $value;
    }
    $average = $sum / count($array);
}

function arraySort(&$array, $asc = true)
{
    if ($asc) {
        arraySortAsc($array);
    } else {
        arraySortDesc($array);
    }
}

function arraySortAsc(&$array)
{
    $done = true;
    do {
        $done = true;
        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i] > $array[$i + 1]) {
                swap($array[$i], $array[$i + 1]);
                $done = false;
            }
        }
    } while ($done === false);
}

function arraySortDesc(&$array)
{
    $done = true;
    do {
        $done = true;
        for ($i = 0; $i < count($array) - 1; $i++) {
            if ($array[$i] < $array[$i + 1]) {
                swap($array[$i], $array[$i + 1]);
                $done = false;
            }
        }
    } while ($done === false);
}

function swap(&$a, &$b)
{
    $buf = $a;
    $a = $b;
    $b = $buf;
}

function printArray($array)
{
    foreach ($array as $val) {
        print $val;
        print ", ";
    }
    print "<br>";
}

function arrayToString($array)
{
    $res = "";
    foreach ($array as $val) {
        if ($res != "") {
            $res .= ", ";
        }
        $res .= $val;
    }
    return $res;
}

function linSearch($value, $array)
{
    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $value) {
            return $i;
        }
    }
    return -1;
}

function binSearch($value, $array, $asc = true)
{
    arraySort($array);
    $bottom = 0;
    $top = count($array) - 1;
    $middle = floor(count($array) / 2);
    while (true) {
        if ($value == $array[$middle]) {
            $res = $middle;
            while(true){
                $nextRes = $res-1;
                if($nextRes <0){
                    return $res;
                }
                if($array[$nextRes] == $value){
                    $res = $nextRes;
                }else{
                    return $res;
                }
            }
            $res = $middle;
            $nextRes = $res--;
            return $res;
        }elseif ($top-1 == $bottom){
            if($array[$top]== $value){
                return $top;
            }else{
                return -1;
            }
        }
        if ($value < $array[$middle]) {
            $top = $middle;
        }

        if ($value > $array[$middle]) {
            $bottom = $middle;
        }
        $middle = floor(($top - $bottom) / 2)+$bottom;
    }
}

function linSearchAll($value,$array){

}
