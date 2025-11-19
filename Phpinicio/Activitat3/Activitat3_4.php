<?php

print "<h1>4. Palíndroms</h1>";
print "<p>4. Comprovar si una cadena és palíndrom: Dissenyar i codificar un programa que a partir
d’una cadena donada ens indiqui si es tracta d’un palíndrom o no. Aquestes cadenes poden
ser llegides igual d'esquerra a dreta que de dreta a esquerra, ignorant els espais, les
majúscules i minúscules, signes i accents. Podeu fer servir funcions de la llibreria string.</p>";

$stringArray = ["uwu", "hola", "Dábale arroz a la zorra, el abad", "amor a Roma", "En un lugar de la mancha", "Abba", "dfjgoisdfjsg", "ajaj","la ruta natural"];
$separatorArray = " ,.    ?";
$accentRemoverArray = [
    "à"=>"a","á"=>"a",
    "è"=>"e","é"=>"e",
    "í"=>"i","ì"=>"i",
    "ò"=>"o","ó"=>"o",
    "ù"=>"u","ú"=>"u",
];

foreach(mb_str_split($string) as $char){
    print"char: ";
    print ($char);
}
print "cadenes comprovades: ";
printVector($stringArray);
print"<br><br>";

for($i=0;$i< count($stringArray); $i++){
    $isPal = checkPalindrome($stringArray[$i], $separatorArray);
    if ($isPal){print "'$stringArray[$i]' és un palíndrom<br>";}
}


function checkPalindrome($string, $separatorArray){
    $processedString = removeSeparators($string, $separatorArray);
    $processedString = strtolower($processedString);
    $processedString = removeAccents($processedString);
    for($i=0;$i< strlen($processedString)/2; $i++){
        if($processedString[$i]!=$processedString[-$i-1]){return false;}
    }
    return true;
}

function removeSeparators($string, $separatorArray){
    $ret = "";
    for($i=0;$i<strlen($string); $i++){
        if(isSeparator($string[$i], $separatorArray) == false){$ret = $ret.$string[$i];}
    }
    return $ret;
}

function isSeparator($char,$separatorArray){
        for($i=0;$i< strlen($separatorArray); $i++){
            if ($char == $separatorArray[$i]){return true;}
        }
        return false;
}

function printVector($vector){
    print "`$vector[0]`";
    for($i = 1; $i< count($vector);$i++){
        print ", `$vector[$i]`";
    }
}

function removeAccents($string){
    global $accentRemoverArray;
    $res = "";
    foreach(mb_str_split($string) as $char){ //Multibyte split per agafar correctament els accents que ocupen 2 bytes en UTF-8
        if (array_key_exists($char, $accentRemoverArray)){
            $res= $res.$accentRemoverArray[$char];
        }else{
            $res = $res.$char;
        }
    }
    return $res;
}
