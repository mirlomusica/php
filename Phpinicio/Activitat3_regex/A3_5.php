<?php

print "<h1>5. Cerca en Arrays</h1>";
print "<p>5. Crear un array amb tots els mesos de l’any, generar un caràcter entre la a i la z
aleatòriament, i obtenir un nou array amb tots el mesos on al seu nom trobem el caràcter
generat aleatòriament.</p>";


$monthArray = ["Gener", "Febrer", "Març", "Abril", "Maig", "Juny", "Juliol", "Agost", "Septembre", "Octubre", "Novembre", "Desembre"];
$alphabetArray= 'abcdefghijklmnopqrstuvwxyz';

$rand = rand(0,strlen($alphabetArray)-1);
$randomChar = $alphabetArray[$rand];




$monthString = implode(" ", $monthArray);
print $monthString;
print "<br><br><strong>Carácter: $randomChar</strong><br>";
print "<br>";
$res = "";
preg_match_all("/([^ ]*[$randomChar][^ ]*)/i", $monthString, $res);
$resString = implode(" ", $res[0]);
print $resString;
