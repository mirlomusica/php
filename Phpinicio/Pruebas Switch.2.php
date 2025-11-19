<?php

$nota = rand(0,10);

switch(nota){
    case 0:
    case 1:
    case 2: print "has obtenido un MD";
        break;
    case 3:
    case 4: print "has obtenido un INSUF";
        break;
    case 5:print "has obtenido un SUF";
        break;
    case 6:print "has obtenido un B";
        break;
    case 7:
    case 8:print "has obtenido un NOT";
        break;
    case 9:print "has obtenido un EXC";
        break;
    case 10:print "has obtenido un MH";
        break;
    default : print "nota incorrecta";
}
