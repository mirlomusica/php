<?php

$intentos = 0;
$aprobado = false;
        
do{
    $nota = rand(0,10);
    print"<br>$nota en intento $intentos<br>";
    if($nota >=5){
        $aprobado = true;
    }
    $intentos++;
} While($aprobado== false);
print "has aprobado en $intentos intentos";
