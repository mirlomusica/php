<?php

print("<h1>1. Valors Primers</h1>");
print("<p>2. Programa que genera un valor positiu aleatori que marcarà el nombre de valors primers
que haurem de introduir a un vector de valors sencers. A continuació generarà un altre
valor positiu aleatori que marcarà a partir de quin valor mínim hem trobar els valors
primers a guardar al vector de valors sencers.</p>");
print("<p>Una vegada introduïts, presentarem per pantalla els valors carregats</p>");


//bucle para generar 10 veces la respuesta
for($i = 0; $i < 10; $i++){
    $numPrimers = rand(1,1000);
    $minVal = rand(50,200);
    $vector = vectorPrimers($numPrimers, $minVal);
    print "<h2>Vector $i: </h2>";
    print "<h3>valor mínim: $minVal </h3>";
    print "<h3>Longitud del vector: $numPrimers </h3>";
    printVector($vector);
  $c = 0;
  for($i=0; $i<100;$i++){
    if(isPrime($i)){$c++;}
  }
  print "<br>";
  print "$c";
    print "<br><br>";
    
}

function vectorPrimers($numPrimers, $minVal){
    $val = $minVal;
    $vector = [];
    for( $i= 0; count($vector)<= $numPrimers; $i++){
        if (isPrime($val)){
            $vector[] = $val;
        }
        $val++;
    }
    return $vector;
    
}

function isPrime($val){
    for($i = 2 ; $i<$val ; $i++){
        if ($val % $i == 0){
            return false;
        }
    }
    return true;
}

function printVector($vector){
    print "$vector[0]";
    for($i = 1; $i< count($vector);$i++){
        print ", $vector[$i]";
    }
}
