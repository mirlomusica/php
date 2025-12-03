<?php


function distchar($string, $char1, $char2)
{

    $pos1 = strpos($string, $char1, 0);
    if ($pos1 === false) {
        return -1;
    }
    $pos2 = strpos($string, $char2, 0);
    if ($pos2 === false) {
        return -1;
    }
    return abs($pos1 - $pos2);
}

function cleancad($string, $separatorArray)
{
    $ret = "";
    for ($i = 0; $i < strlen($string); $i++) {
        if (isSeparator($string[$i], $separatorArray) == false) {
            $ret = $ret . $string[$i];
        }
    }
    return $ret;
}

function isSeparator($char, $separatorArray)
{
    for ($i = 0; $i < strlen($separatorArray); $i++) {
        if ($char == $separatorArray[$i]) {
            return true;
        }
    }
    return false;
}

function mycrypt($string, $encryptionArray)
{
    $ret = "";
    $splitted_string = str_split($string);
    for($i=0;$i<count($splitted_string);$i++) {
        $char = $splitted_string[$i];
        $encryptionIndex = $i % count($encryptionArray);
        $encryptionNum = $encryptionArray[$encryptionIndex];
        $charnum = ord($char);
        $charnum = $charnum+$encryptionNum;
        $ret.= chr($charnum);
    }
    return $ret;
}


function mydecrypt($string, $encryptionArray)
{
    $ret = "";
    $splitted_string = str_split($string);
    for($i=0;$i<count($splitted_string);$i++) {
        $char = $splitted_string[$i];
        $encryptionIndex = $i % count($encryptionArray);
        $encryptionNum = $encryptionArray[$encryptionIndex];
        $charnum = ord($char);
        $charnum = $charnum-$encryptionNum;
        $ret.= chr($charnum);
    }
    return $ret;
}
