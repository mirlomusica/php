<?php

include_once '../../model/MathFunctions.php';

//RECUPERAMOS LOS DATOS QUE HAN SIDO CAPTURADOS CON GET UTILIZANDO
//EL MISMO VALOR DE LAS VARIABLES EN EL FORMULARIO ORIGEN
if (($value = filter_input(INPUT_POST, "num")) != null) {
    $savedivisors = filter_input(INPUT_POST, "viewdivisors");    
    print "El valor $value ";
    if ( isPrime ($value) == true ) {
        print "es primer";
    } else {
        print "no es primer";
        if ($savedivisors) {
            print "<br><br>LlISTA DE DIVISORS<br>";
            $divisors = divisors($value);
            for ($i = 0; $i < count($divisors); $i++) {
                print "<br>$divisors[$i]";
            }
        }
    }
}
print "  <p><a href=\"../../views/activities/NumbersView.html\">Volver a la página anterior</a></p>\n";
?> 