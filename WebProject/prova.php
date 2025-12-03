<?php


include_once './model/StringFunctions.php';


$string = "ara si que si";
$char1 = "x";
$char2 = "s";

$res = 12;
print $res;
print "<br>";
$res = distchar($string, $char1, $char2);
print $res;


$string = "hola adios, que tal? Yo bien";
$separators = " ,?";

print "<br>";
print cleancad($string, $separators);


print "<br>";

$char = "a";
print $char;
$charnum = ord($char)+4;
$char = chr($charnum);
print $char;

print "<br>";

$string = "aaaaaaaaaa";
$encryptionArray = [1,1,2,2,3,3];
$stringcrypt = mycrypt($string, $encryptionArray);
print $stringcrypt;
print "<br>";
print strlen($stringcrypt);
print "<br>";

$stringDecrypted = mydecrypt($stringcrypt, $encryptionArray);
print $stringDecrypted;
print "<br>";
print strlen($stringDecrypted);

rand();
