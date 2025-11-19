<?php

/*
 for ($i=1; $i<11;$i++){
    $num = rand()%10;
    echo "<br>round($i): Value($num)<br>";
}
*/
/*generació valors aleatoris */

$num1 = rand(1,5);
$num2 = rand(1,5);
$operacio = rand(0,7);

print "<br>primer num $num1<br>";
print "<br>segon num $num2<br>";
print "<br>opció: $operacio<br>";
switch ($operacio){
    case 0:{
        print "<br>operació $operacio : no fer res<br>";
        print "<br>resultat nul<br>";

    }
    break;
    case 1:{
        print "<br>operació $operacio : suma<br>";
        $res = $num1 + $num2;
        print "<br>resultat; $res<br>";

    }
    break;
    case 2:{
        print "<br>operació $operacio : resta <br>";
        $res = $num1 - $num2;
        print "<br>resultat; $res<br>";

    }
    break;
    case 3:{
        print "<br>operació $operacio : intercanvi de valors <br>";
        $intercanviador = $num1;
        $num1 = $num2;
        $num2 = $intercanviador;
        print "<br>num1: $num1<br>";
        print "<br>num2: $num2<br>";
    }
    break;
    case 4:{
        print "<br>operació $operacio : multiplicació <br>";
        $res = $num1*$num2;
        print "<br>resultat: $res<br>";
    }
    break;
    case 5:{
        print "<br>operació $operacio : quocient<br>";
        if($num2 == 0){
            print "<br>ERROR: no es pot dividir per 0<br>";
            break;
        }
        $res = $num1/$num2;
        print "<br>resultat: $res<br>";
    }
    break;
    case 6:{
        print "<br>operació $operacio : residu<br>";
        $res = $num1%$num2;
        print "<br>resultat: $res<br>";
    }
    break;
    default : print ("opció errònia");
}

