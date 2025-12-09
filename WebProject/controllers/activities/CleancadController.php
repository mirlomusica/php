<?php

include "../../model/StringFunctions.php";

$string = filter_input(INPUT_POST, "string");
$separators = filter_input(INPUT_POST, "separators");

$res = cleancad($string, $separators);

print "Cadena sense separadors: $res";
