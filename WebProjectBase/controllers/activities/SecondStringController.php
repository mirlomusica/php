<?php

if (($textoOrig = filter_input(INPUT_POST, "texto")) != null) {
    $textoOrig = trim($textoOrig);
    $textoOrig = strtolower($textoOrig);
    $cadenaCifrada = "";

    for ($pos = 0; $pos < strlen($textoOrig); $pos++) {

        switch ($textoOrig[$pos]) {
            case 'b':
                $cadenaCifrada = $cadenaCifrada . '6';
                break;
            case 'c':
                $cadenaCifrada = $cadenaCifrada . '0';
                break;
            case 'd':
                $cadenaCifrada = $cadenaCifrada . '6';
                break;
            case 't':
                $cadenaCifrada = $cadenaCifrada . '5';
                break;
            case 'e':
                $cadenaCifrada = $cadenaCifrada . '3';
                break;
            case 'n':
                $cadenaCifrada = $cadenaCifrada . '4';
                break;
            case 'a':
                $cadenaCifrada = $cadenaCifrada . '9';
                break;
            case 'r':
                $cadenaCifrada = $cadenaCifrada . '7';
                break;
            case 's':
                $cadenaCifrada = $cadenaCifrada . '2';
                break;
            case 'i':
                $cadenaCifrada = $cadenaCifrada . '1';
                break;
            case 'u':
                $cadenaCifrada = $cadenaCifrada . '@';
                break;
            case 'm':
                $cadenaCifrada = $cadenaCifrada . '$';
                break;
            case 'o':
                $cadenaCifrada = $cadenaCifrada . '#';
                break;
            case 'g':
                $cadenaCifrada = $cadenaCifrada . '=';
                break;
            case 'f':
                $cadenaCifrada = $cadenaCifrada . '+';
                break;
            case 'q':
                $cadenaCifrada = $cadenaCifrada . '-';
                break;
            case 'z':
                $cadenaCifrada = $cadenaCifrada . '*';
                break;
            case 'l':
                $cadenaCifrada = $cadenaCifrada . '/';
                break;            
            default:
                $cadenaCifrada = $cadenaCifrada . $textoOrig[$pos];
        }
    }
    print "La cadena xifrada es:  $cadenaCifrada";
} else {
    echo "Has de pasar algun text a processar...";
}
print "  <p><a href=\"../../views/activities/StringsView.html\">Volver a la página anterior</a></p>\n";
?> 
