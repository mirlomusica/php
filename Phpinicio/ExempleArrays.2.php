<?php

// INTRODUCCIÓN A LOS ARRAYS
print "<h1>Introducción a los arrays</h1>";

$valores = array(1,2,3,4,5,6,7);
var_dump($valores);

print "<br><br>";

$valores2 = [11,12,13,14,15,16,17];
var_dump($valores2);
// print_r($valores2); // Alternativa a var_dump()

print "<br><br>";

$lenght = count($valores2);
var_dump($lenght);

print "<br><br>EJERCICIO: Guardar los divisores exactos de un valor";

$num = rand(1,100);
print "<br><br>Aleatoriamente ha salido $num.<br>";

$divList = []; // Se puede crear arrays sin ningún valor en él

for($div=1; $div<=$num; $div++){
    if($num%$div==0){
        $divList[] = $div; // Introducir un valor en un array
        //print "<br><br>$div es divisor exacto de $num";
    }
}
print "<br>Primer divisor no \"evidente\": " . $divList[1];
print "<br><br>Todos los divisores: ";
for($pos=0; $pos < count($divList); $pos++){
    print "<br>Divisor: " . $divList[$pos];
}



?>