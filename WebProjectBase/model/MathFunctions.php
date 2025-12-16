<?php

function isPrime(int $num): bool {      //nom de la funció i llista d’arguments
    $div = 3;
    if ($num < 4) {//definició de variables locals    
        return true;
    }
    if ($num % 2 == 0) {
        return false;
    } else {
        $maxDivisor = (int) sqrt($num);
    }
    while ($div <= $maxDivisor) {          //condicions per sortir del bucle
        //optimitzant el seu funcionament
        if ($num % $div == 0) {
            return false;               //retorn per a indicar que no lo es
        }
        $div = $div + 2;
    }
    return true;
}

function divisors(int $n): array {
    $divisors = [1];
    $maxdiv = sqrt($n);
    for ($div = 2; $div < $maxdiv; $div++) {
        if ($n % $div == 0) {
            $divisors[] = $div;
            $divisors[] = $n / $div;
        }
    }
    if ($n % $div == 0) {
        $divisors[] = $div;
    }
    sort($divisors);
    return $divisors;
}

function printArray(array $a, string $sep) {
    for ($i = 0; $i < count($a); $i++) {
        if ($i < count($a) - 1) {
            print $a[$i] . $sep;
        } else {
            print $a[$i];
        }
    }
}

function basicOperations(int $n1, int $n2, string $op): float {
    $result = 0.0;
    switch ($op) {
        case "+": $result = $n1 + $n2;
            break;
        case "-": $result = $n1 - $n2;
            break;
        case "*": $result = $n1 * $n2;
            break;
        case "/": $result = $n1 / $n2;
            break;
    }
    return $result;
}

function fillArray(int $size, int $min, int $max): array {
    $array = [];
    for ($i = 0; $i < $size; $i++) {
        $array[] = rand($min, $max);
    }
    return $array;
}

function arrayStats(array $array, int &$maxim, int &$minim, float &$average) {
    $size = count($array);
    if ($size > 0) {
        $maxim = $array[0];
        $minim = $array[0];
        $total = $array[0];
        for ($i = 1; $i < $size; $i++) {
            if ($maxim < $array[$i]) {
                $maxim = $array[$i];
            }
            if($minim > $array[$i]) {
                $minim = $array[$i];
            }
            $total += $array[$i];
        }
        $average = $total/$size;
    }
}
