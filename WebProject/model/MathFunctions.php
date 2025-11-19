<?php

function divisors(int $num): array {
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
            if ( $num % $div == 0 ) {
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

function isPrime (int $n): bool {
    $maxdiv = sqrt($n);
    for ($i = 2; $i <= $maxdiv; $i++) {
        if ($n % $i == 0) {
            return false;
        }
    }    
    return true;
}

function isPerfect($num){
        for($j=1; $j <= $num/2 ; $j++){
        if ($num % $j == 0){
            $sumaDivisors = $sumaDivisors + $j;
        }
    }
    if ($sumaDivisors == $num){
        return true;
    }else {
        return false;
    }
}

function fibonacci($fib1,$fib2,$numTermes){
    $res = [];
    if($numTermes == 1){
        $res[]= $fib1;
        return res;
    }
    else{
        $res[]= $fib1;
        $res[]= $fib2;
        for($iTermes=0; $iTermes< $numTermes-2; $iTermes++){
            
            $nouTerme = $fib1 + $fib2;
            $res [] = $nouTerme;
            $fib1 = $fib2;
            $fib2 = $nouTerme;

        }
        return $res;
    }
}

function mcd($num1,$num2){
        if($num1>$num2){
        $intercanviador = $num1;
        $num1 = $num2;
        $num2 = $intercanviador;
    }
    for ($j = 1; $j <=$num1; $j++){
        if ($num1 % $j == 0 and $num2 % $j == 0  ){
            $mcd = $j;
        }
    }
    return $mcd;
}

function mcm($num1,$num2){
if ($num1 >$num2){
    $temp = $num1;
    $num1 = $num2;
    $num2 = $temp;
}

for($i = 2; $i<=$num1; $i++){
    if($num1%$i ==0 && $num2%$i ==0){
        return $i;
    }
}
return 1;
}

