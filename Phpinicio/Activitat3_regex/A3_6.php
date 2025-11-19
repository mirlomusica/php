<?php

print "<h1>6. Validació de contrassenya</h1>";
print "<p>6. Introduir un exemple de contrasenya  a una variable, i validar que acompleix els següents mínims: mida mínima 10 caràcters i almenys ha de contenir 2 majúscules, 1 nombre i 2 caràcters especials. En cas de acomplir presentarà el missatge “correcte” i en cas contrari el missatge “contrasenya no admesa”.</p>";


$specialCharacterArray = "_@$()?¿!";
$numberArray = "1234567890";
$invalidPassword = "fatal";
$correctPassword = "Mi_Chul1t@_2005";


print "<h2> Conté 2 Majúscules: </h2>";

print "$invalidPassword: ";
print checkRegex("/[A-Z].*[A-Z]/",$invalidPassword);
print "<br>";
print "$correctPassword: ";
print checkRegex("/[A-Z].*[A-Z]/",$correctPassword);
print "<br>";

print "<h2> Mida mínima 10: </h2>";

print "$invalidPassword: ";
print checkRegex("/.{10}/",$invalidPassword);
print "<br>";
print "$correctPassword: ";
print checkRegex("/[A-Z].*[A-Z]/",$correctPassword);
print "<br>";

print "<h2> Conté nombre: </h2>";

print "$invalidPassword: ";
print checkRegex("/[0-9]/",$invalidPassword);
print "<br>";
print "$correctPassword: ";
print checkRegex("/[0-9]/",$correctPassword);
print "<br>";

print "<h2> Conté 2 o més caràcters especials: </h2>";

print "$invalidPassword: ";
print checkRegex("/[_@$()?¿!].*[_@$()?¿!]/",$invalidPassword);
print "<br>";
print "$correctPassword: ";
print checkRegex("/[_@$()?¿!].*[_@$()?¿!]/",$correctPassword);
print "<br>";


function checkRegex($regex, $password){
    $res = "";
    preg_match($regex, $password, $res);
    if ($res == []){return "ERROR";}
    else {return "CORRECT";}
}