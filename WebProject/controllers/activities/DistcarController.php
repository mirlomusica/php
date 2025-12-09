<?php

include "../../model/StringFunctions.php";

$string = filter_input(INPUT_POST, "string");
$char1 = strtolower(filter_input(INPUT_POST, "char1"));
$char2 = strtolower(filter_input(INPUT_POST, "char2"));


$res = distchar($string, $char1, $char2);

switch ($res) {
    case -1:
        print "ERROR -1: Caràcter $char1 no trobat";
        break;
    case -2:
        print "ERROR -2: Caràcter $char2 no trobat";
        break;
    default:
        print "La distància entre \"$char1\" i \"$char2\" és $res";
}
