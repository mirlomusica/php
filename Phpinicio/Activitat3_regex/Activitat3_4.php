<?php




$string = "   Otras cosas raras";
$forbidden = [
    "à" => "a",
    "ñ" => "n"
];

$string = trim($string);
$string = strtolower($string);
print $string;
print "<br>";
$string = implode("", explode(" ", $string));
print $string;
print "<br>";
$string2 = strtr($string, $forbidden);
print $string2;
print "<br>";
$string = strrev($string2);
print $string;
print "<br>";

function otras_funciones(){
implode($separatorArray, $accentRemoverArray);
explode($separatorArray, $string);
trim($string);
strtr($string, $from, $to);
}
