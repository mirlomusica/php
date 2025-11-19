<?php

print "<br>1. divisors exactes<br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    
    $num = rand(1,100);
    print "<br>número aleatori: $num<br>";
    print "divisors: ";
    for($posibleDivisor=1;$posibleDivisor<$num+1;$posibleDivisor++){ //bucle que evalua los divisores
        if($num%$posibleDivisor == 0){
            print "$posibleDivisor, ";
        }
    }
}
print "<br><br><br>1. Fibonacci<br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $numTermes = rand(1,20);
    print "<br>Número de termes: $numTermes<br>";
    $fib1 = 0;
    $fib2 = 1;
    
    if($numTermes == 1){
        print $fib1;
    }
    else{
        print "$fib1, $fib2 ";

        for($iTermes=0; $iTermes< $numTermes-2; $iTermes++){
            $nouTerme = $fib1 + $fib2;
            print ", $nouTerme ";
            $fib1 = $fib2;
            $fib2 = $nouTerme;

        }
    }
}

print "<br><br><br>3. Valors Intermitjos<br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $num1 = rand(0,12);
    $num2 = rand(0,12);
    $num3 = rand(0,12);
    //ordenamos los números:
    print "<br>números: $num1, $num2, $num3";
    if ($num1>$num2){
        $numGuardat = $num1;
        $num1 = $num2;
        $num2 = $numGuardat;
    }
    if ($num2>$num3){
        $numGuardat = $num2;
        $num2 = $num3;
        $num3 = $numGuardat;
    }
    if ($num1>$num2){
        $numGuardat = $num1;
        $num1 = $num2;
        $num2 = $numGuardat;
    }
     print "<br>números ordenats: $num1, $num2, $num3 <br>";
     print"números intermitjos: ";
     $primerNumero = true; //variable per formatar correctament la coma
     for ($j = $num1; $j < $num3; $j++){
  
         if ($j != $num1 and $j != $num2 and $j != $num3){
             if ($primerNumero){
                 print "$j";
                 $primerNumero = false;
             }
             else{
                print ", $j";
             }             
         }
     }
     print"<br>";
}

print "<br><br><br>4. Màxim Comú Divisor<br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $num1 = rand(1,100);
    $num2 = rand(1,100);
    print"números: $num1, $num2  ";
    //ordenar números
    if($num1>$num2){
        $intercanviador = $num1;
        $num1 = $num2;
        $num2 = $intercanviador;
    }
    print "<br> numeros ordenados: $num1 , $num2   ";
    for ($j = 1; $j <=$num1; $j++){
        if ($num1 % $j == 0 and $num2 % $j == 0  ){
            $mcd = $j;
        }
    }
    print "<br> MCD: $mcd<br><br>";
}



//guardo el código del MCD en una función para la siguiente actividad
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

print "<br><br><br>5. Mínim comú múltiple<br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $num1 = rand(1,100);
    $num2 = rand(1,100);
    print "<br>números; $num1, $num2<br>";
    $mcd = mcd($num1,$num2); //nos viene a mano la función mcd
    $resta1 = $num1 / $mcd;
    $resta2 = $num2 / $mcd;
    $mcm = $mcd * $resta1 * $resta2;
    print "MCM: $mcm";
}

print "<br><br><br>6. Número primer<br><br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $num = rand(1,100);
    $primer = true;
    for($j = 2 ; $j<$num ; $j++){
        if ($num % $j == 0){
            $primer = false;
            break;
        }
    }
    
    if ($primer){
        print "$num ÉS primer<br>";
    }else {
        print "$num NO és primer<br>";
    }
}

print "<br><br><br>6. Número perfecte<br><br>";
//bucle de repetición para corroborar el buen funcionamiento
for($i = 0; $i < 10 ; $i++){
    $num = rand(1,100);
    $sumaDivisors = 0;
    for($j=1; $j < $num ; $j++){
        if ($num % $j == 0){
            $sumaDivisors = $sumaDivisors + $j;
        }
    }
    if ($sumaDivisors == $num){
        print "$num ÉS perfecte<br>";
    }else {
        print "$num NO és perfecte<br>";
    }
    
}