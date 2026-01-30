<?php

include_once "../../model/MathFunctions.php";
include_once "../../model/StringFunctions.php";

$size = (int) filter_input(INPUT_POST, "size");
$min =  (int) filter_input(INPUT_POST, "min");
$max = (int) filter_input(INPUT_POST, "max");
$text = filter_input(INPUT_POST, "text");
$filterDuplicates = filter_input(INPUT_POST, "filterDuplicates");

function verifyInput(){
    global $size;
    global $min;
    global $max;
    global $text;
    $ret = true;

    if(!$size || !$min || !$max){
        print "<strong>Cal Establir Valors mínim, màxim i la mida</strong><br>";
        $ret = false;
    }
    if($size<=0){
        print "<strong>ERROR: La mida de l'array ha de ser superior a 0 (no negativa)</strong><br>";
        $ret = false;
    }
    if($min<=0){
        print "<strong>ERROR: El valor mínim ha de ser superior a 0 (no negatiu)</strong><br>";
        $ret = false;
    }
    if($max<=0){
        print "<strong>ERROR: El valor màxim ha de ser superior a 0 (no negatiu)</strong><br>";
        $ret = false;
    }
    if($min>$max){
        print "<strong>ERROR: valor mínim ha de ser inferior a valor màxim</strong><br>";
        $ret = false;
    }
    
    if(!$text){
        print "<strong>Cap frase introduïda</strong><br>";
        $ret = false;
    }
    
    
    return $ret;;
}

$inputOK = verifyInput();
if(!$inputOK){
    die();
}

print "<p>ARRAY ORIGINAL</p>";
$array = fillArray($size, $min, $max);
$numString = arrayToString($array);
print $numString;

$primes = extractPrimes($array);
if($primes){
    print "<p>ARRAY DE PRIMERS</p>";
    $primeString = arrayToString($primes);
    print $primeString;
}else{
    print "<p><strong>ARRAY DE PRIMERS BUIT</strong></p>";
}

print "<br>";
print "<br>";
print "<br>";
$consonants = extractConsonants($text, $filterDuplicates);
if($consonants){
    print "Resultat: ";
    print $consonants;   
}else{
    print "<strong>No es troba cap consonant</strong>";
}