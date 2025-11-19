<?php
/*
print ("2. Distància entre caràcters: Dissenyar i codificar un programa que a partir d’una cadena donada, presenta la separació entre un primer i un"
. " segon caràcter, escollits aleatòriament de les opcions facilitades a un array. Considerar els casos especials que es poden produir."
. " Per exemple: amb la cadena copernic@gmail.com, i la ‘@’ i el ‘.’ com caràcters escollits aleatòriament, ens ha de presentar un 5.  ");
*/



//inicialización
$string = 'copernic@gmail.com';
$alphabetArray = 'abcdefghijklmnopqrstuvwxyz.@';

//bucle para generar 10 veces la respuesta
for($i = 0; $i < 10; $i++){
    print "<h4>execució num $i: <br></h4>";
    $rand1 = rand(0, strlen($alphabetArray)-1);
    $rand2 = rand(0, strlen($alphabetArray)-1);

    $char1 = $alphabetArray[$rand1];
    $char2 = $alphabetArray[$rand2];
    
        print "cadena: $string<br>";
    print "primer caràcter: $char1<br>";
    print "segon caràcter: $char2<br>";
    
    $distancia = calcularDistancia($char1,$char2,$string);
    switch($distancia){
        case -1: print "ERROR -1: caracter ($char1) no encontrado en cadena ($string)<br>";
            break;
        case -2: print "ERROR -2: caracter ($char2) no encontrado en cadena ($string)<br>";
            break;
        case 0: print "ERROR 0: caracter ($char1) no aparece 2 veces en cadena ($string)<br>";
            break;
        default: print "Distancia entre caracteres: $distancia<br>";
    }
    print "<br>";
}
/* > 0
 * -1 primer char no encontrado
 * -2 segundo char no encontrado
 * 0 char no aparece 2 veces
 */
function calcularDistancia($char1,$char2,$string){
    $pos1 = 0;
    $pos2 = 0;
    
    if($char1!=$char2){ //cas chars diferents    
        $pos1 = searchInString($char1, $string,0); //el 0 indica el principio de la búsqueda (posicio 0)
        if($pos1==-1){return -1;}
        $pos2 = searchInString($char2, $string,0);
        if($pos2==-1){return -2;}
    }else if($char1 == $char2){ //cas chars iguals
        $pos1 = searchInString($char1, $string,0);
        if($pos1==-1){return -1;}
        $pos2 = searchInString($char1, $string,$pos1+1); // busquem a partir de la primera aparició del char
        if($pos2==-1){return 0;}
    }
    //si todo está correcto, aplicamos el resto del código
    $distancia = abs($pos2 - $pos1)-1;
    return $distancia;
}


function searchInString($char,$string,$principioBusqueda){
    for($i=$principioBusqueda;$i<strlen($string);$i++){
        if($string[$i]==$char){return $i;}
    }
    return -1;
}

