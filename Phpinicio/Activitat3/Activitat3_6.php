<?php

print "<h1>6. Validació de contrassenya</h1>";
print "<p>6. Introduir un exemple de contrasenya  a una variable, i validar que acompleix els següents mínims: mida mínima 10 caràcters i almenys ha de contenir 2 majúscules, 1 nombre i 2 caràcters especials. En cas de acomplir presentarà el missatge “correcte” i en cas contrari el missatge “contrasenya no admesa”.</p>";


$specialCharacterArray = "_@$()?¿!";
$numberArray = "1234567890";
$invalidPassword = "fatal";
$correctPassword = "Mi_Chul1t@_2005";

print "<h3>comprovant contrassenya: '$invalidPassword'</h3>";
$checksArray = runChecks($invalidPassword,$specialCharacterArray);
printChecksArray($checksArray);

print "<h3>comprovant contrassenya: '$correctPassword'</h3>";
$checksArray = runChecks($correctPassword,$specialCharacterArray);
printChecksArray($checksArray);



function runChecks($password,$specialCharacterArray){
    $checkResultArray = [];
    if (lengthCheck($password)){$checkResultArray[]=true;}
    else{$checkResultArray[]=false;}
    if (countUpperCase($password)>=2){$checkResultArray[]=true;}
    else{$checkResultArray[]=false;}
    if (countNumber($password)>=1){$checkResultArray[]=true;}
    else{$checkResultArray[]=false;}
    if (countSpecialCharacter($password,$specialCharacterArray)>=2){$checkResultArray[]=true;}
    else{$checkResultArray[]=false;}
    return $checkResultArray;
}

function printChecksArray($checksArray){
    switch($checksArray[0]){
        case false: print "ERROR: LA contrassenya ha de contenir 10 caràcters<br>";
            break;
        default: print "Check 1 correcte:Número de caràcters correcte<br>";
    }
    switch($checksArray[1]){
        case false: print "ERROR: LA contrassenya ha de contenir 2 majúscules<br>";
            break;
        default: print "Check 2 correcte:Número de majúscules correcte<br>";
    }
    switch($checksArray[2]){
        case false: print "ERROR: LA contrassenya ha de contenir 1 número<br>";
            break;
        default: print "Check 3 correcte:La contrassenya conté un número<br>";
    }
    switch($checksArray[3]){
        case false: print "ERROR: LA contrassenya ha de contenir 2 caràcters especials<br>";
            break;
        default: print "Check 4 correcte:La contrassenya conté 2 caràcters especials<br>";
    }
    
    foreach($checksArray as $check){
        if($check === false){
            print "CONTRASSENYA INVÀLIDA<br>";
            return;
        }
    }
    print "CONTRASSENYA CORRECTA";
    return;
}

function lengthCheck($password){
    if(strlen($password)>=10){return true;}
    else{return false;}
}

function countUpperCase($password){
    $upperCaseCounter =0;
    for($i=0;$i<strlen($password);$i++){
        if(($password[$i]>"A" and $password[$i]<"Z")){$upperCaseCounter++;}
    }
    return ($upperCaseCounter);
}

function countNumber($password){
    $numberCounter =0;
    for($i=0;$i<strlen($password);$i++){
        if(($password[$i]>"0" and $password[$i]<"9")){$numberCounter++;}
    }
    return ($numberCounter);
}

function countSpecialCharacter($password, $specialCharacterArray){
    $specialCharacterCounter =0;
    for($i=0;$i<strlen($password);$i++){
        if(isSpecialCharacter($password[$i], $specialCharacterArray)){$specialCharacterCounter++;}
    }
    return ($specialCharacterCounter);
}


function isSpecialCharacter($char,$specialCharacterArray){
        for($i=0;$i< strlen($specialCharacterArray); $i++){
            if ($char == $specialCharacterArray[$i]){return true;}
        }
        return false;
}