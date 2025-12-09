
<?php

include "../../model/StringFunctions.php";

$string = filter_input(INPUT_POST, "string");
$encryptionArray = filter_input(INPUT_POST, "encryptionArray");

$encryptionArray = parseEncryptionArray($encryptionArray);
$res = mydecrypt($string, $encryptionArray);
print "cadena desencriptada: \"$res\"";
