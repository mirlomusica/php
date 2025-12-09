<?php

include "../../model/StringFunctions.php";

$string = filter_input(INPUT_POST, "string");
$encryptionArray = filter_input(INPUT_POST, "encryptionArray");

$encryptionArray = parseEncryptionArray($encryptionArray);
$res = mycrypt($string, $encryptionArray);
print $res;
