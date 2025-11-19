<?php

$MAX = 10;
print "<br> que valores son mayores de 5?<br>";

for ($contAlumnos = 1, $mayorque = 0;$contAlumnos <= $MAX; $contAlumnos++ ){
    $num = rand(1,10);
    if ($num > 5){
    print "<br>$num es mayor que 5<br>";
    $mayorque = $mayorque + 1;
    } 
    else if ($num == 5){
    print "<br>$num es igual a 5<br>";
    }
    else{
        print "<br>$num es menor que 5<br>";
    }
}
print "<br>bucle finalizado<br>";
print "<br>$mayorque números mayores que 5<br>";