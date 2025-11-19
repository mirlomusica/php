<?php



print("<h1>1. Generar Vectors</h1>");
print("<p>Programa que gestiona un vector de valors sencers. Generarà aleatòriament un valor sencer
entre el 1 i el 200 que marcarà el nombre de valors que introduirem al vector. Els valors que
s’introduiran al vector també seran aleatoris, però entre el 1 y el 100</p>");
print("<p>Una vegada introduïts, presentarem per pantalla els valors carregats, indicant a continuació
el valor màxim, mínim i la mitjana dels valors continguts al vector.</p>");


//bucle para generar 10 veces la respuesta
for($i = 0; $i < 10; $i++){
    $vector = generadorVectores();
    $min = minVector($vector);
    $max = maxVector($vector);
    $mitjana = mitjanaVector($vector);
    print("Vector num: $i:");
    print "<br>";
    printVector($vector);
    print "<br>";
    print("Longitud del vector: " . count($vector));
    print("<br>Valor mínim:$min ");
    print("<br>Valor màxim:$max ");
    print("<br>Valor mitjà:$mitjana ");
    print "<br><br>";    
}

function generadorVectores(){
    $vectorLength = rand(1,200);
    $vector = [];

    for($pos =0; $pos< $vectorLength; $pos++){
        $value = rand(1,100);
        $vector[]=$value;
    }
    return $vector;
    
}

function printVector($vector){
    print "$vector[0]";
    for($i = 1; $i< count($vector);$i++){
        print ", $vector[$i]";
    }
}

function minVector($vector){
    $min = $vector[0];
    
    for($i = 1; $i< count($vector);$i++){
        if($min> $vector[$i]){
            $min = $vector[$i];
        }
    }
    return $min;
}
function maxVector($vector){
    $max = $vector[0];
    
    for($i = 1; $i< count($vector);$i++){
        if($max< $vector[$i]){
            $max = $vector[$i];
        }
    }
    return $max;
}

function mitjanaVector($vector){
    $sum = sumVector($vector);
    $mitjana = $sum / count($vector);
    return $mitjana;
}

function sumVector($vector){
    $sum = 0;
    for($i = 0; $i<count($vector); $i++){
        $sum = $sum + $vector[$i];
    }
    return $sum;
}