<?php

print "<h1>1. Intercalació de caràcters</h1>";
print "<p>1. Intercalació de caràcters: Dissenyar i codificar un programa que a partir d’una cadena
donada, introdueixi entre els seus caràcters un separador específic escollit aleatòriament de
les opcions facilitades a través d’un array (per exemple: [ ‘,’ ‘.’ ‘_’ ‘"."$"."’...]). Una vegada creada
la nova cadena amb els separadors presentarà la cadena resultant.
Per exemple: amb la cadena “HOLA”, si surt el ‘.’ com a separador, es presentarà: “H.O.L.A”</p>";

$separatorArray = ",._$";
$string = "Hola Colega";

for($i=0;$i<10;$i++){
    print "<h3>Execució $i</h3>";
    $rand = rand(0,strlen($separatorArray)-1);
    $separator = $separatorArray[$rand];
    print "separador escollit: $separator <br>";
    $res = intercalateString($string,$separator);
    print "resultat: $res <br>";
}

function intercalateString($string,$separator){
    $res = $string[0];
    for($i=1;$i< strlen($string);$i++){
        $res = $res.$separator.$string[$i];
    }
    return $res;
}