<?php
include '../model/Control3Funcions.php';

//agafem els paràmetres del post
$provincia = filter_input(INPUT_POST, "provincia");
$ciutat = filter_input(INPUT_POST, "ciutat");
$pathName = filter_input(INPUT_POST, "pathName");
$writeFilter = filter_input(INPUT_POST, "writeFilter");
$appendFilter = filter_input(INPUT_POST, "appendFilter");

//Posem "*" als camps indicats si estàn buits
if($provincia == ""){
    $provincia = "*";
}
if($ciutat == ""){
    $ciutat = "*";
}
if($writeFilter == ""){
    $writeFilter = "*";
}

//Part de lectura:
$clients = clientsByLocation("../files/clients.csv", $provincia, $ciutat);
print "DADES OBTINGUDES<br>";
if($clients == []){
    print "Cap dada trobada<br>";
}else{
    printArray($clients);
}
print "<br><br>";

//Part Escriptura:
if($pathName == ""){
    print "Finalitzem sense guardar dades";
}else{
    $linesWritten = writeClientsByFilter($pathName, $clients, $writeFilter);
    print "$linesWritten linies guardades a $pathName<br>";
    
    //hem de comprovar que tenim un appendFilter (no l'hem substituït per "*"
    if($appendFilter!=""){
        $linesAppended = appendClientsByFilter($pathName, $clients, $appendFilter);
        print "$linesAppended linies agregades a $pathName<br>";
    }
}


