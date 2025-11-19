<?php

include_once '../../model/MathFunctions.php';

$isPerfect = false;
//RECUPERAMOS LOS DATOS QUE HAN SIDO CAPTURADOS CON GET UTILIZANDO
//EL MISMO VALOR DE LAS VARIABLES EN EL FORMULARIO ORIGEN
if (($value = filter_input(INPUT_POST, "num")) != null) {
    $savedivisors = filter_input(INPUT_POST, "viewdivisors");    
    print "El valor $value ";
    if ( isPerfect ($value) == true ) {
        print "es perfecte";
        $isPerfect = true;
    } else {
        print "no es perfecte";
        $isPerfect = false;
        
    }
    if ($savedivisors) {
            print "<br><br>LlISTA DE DIVISORS (Excepte el mateix valor)<br>";
            $divisors = divisors($value);
                for ($i = 0; $i < count($divisors)-1; $i++) {
                    print "<br>$divisors[$i]";
                }             
            
        }
}
print "  <p><a href=\"../../views/activities/NumbersView.html\">Volver a la página anterior</a></p>\n";
?> 