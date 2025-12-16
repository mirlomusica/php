<?php
include_once '../../model/MathFunctions.php';

if (($num = (int)filter_input(INPUT_POST, 'num')) != null and $num > 0 ) {
    if ( isPrime($num) == true ){
        print "<br>El valor $num es PRIMO<br>";                
    }else{
        print "<br>El valor $num NO es PRIMO<br>";
        if (filter_input(INPUT_POST, "showdivisors")) {
            print "<br><br>LlISTA DE DIVISORS<br><br>";
            printArray(divisors($num), " | ");
        }        
    }            
} else { 
    print "No has entrado ningun valor o bien es negativo";
}
print "<p><a href=\"../../views/activities/NumbersView.html\">Volver</a></p>";


