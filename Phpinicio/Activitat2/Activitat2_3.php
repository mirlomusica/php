<?php


print("<h1>1. Valors Perfectes</h1>");
print("<p>3. Programa que genera un valor positiu aleatori que marcarà el valor màxim fins que hem de
localitzar els nombres perfectes existents. Tots els valors perfectes trobats es guardaran a
un vector de sencers. </p>");
print("<p>Una vegada introduïts, presentarem per pantalla els valors carregats</p>");

//bucle para generar 10 veces la respuesta
for($i = 0; $i < 10; $i++){
    $maxNum = rand(100,1000);
    $minVal = 1;
    $vector = vectorPerfectes($maxNum, $minVal);
    print "<h2>Vector $i: </h2>";
    print "<h3>Número Màxim: $maxNum </h3>";
    printVector($vector);
    print "<br><br>";
    
}

function vectorPerfectes($maxNum, $minVal){
    $vector = [];
    for( $val = $minVal; $val <= $maxNum; $val++){
        if (isPerfect($val)){
            $vector[] = $val;
        }
    }
    return $vector;
    
}


function isPerfect($num){
    $sumaDivisors = 0;
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

function printVector($vector){
    print "$vector[0]";
    for($i = 1; $i< count($vector);$i++){
        print ", $vector[$i]";
    }
}