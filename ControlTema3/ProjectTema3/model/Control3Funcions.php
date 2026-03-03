<?php

function printArray(array $a) {
    foreach ($a as $data) {
        print $data . "<br>";
    }
}


function clientsByLocation($pathName, $provincia, $ciutat){
    $res= [];
    //Obrim Fitxer
    $file = fopen($pathName, "r");
    //Iterem Per linies
    while($line = fgets($file)){
        //separem cada linia en els seus camps
        $fields = explode(",",$line);
        //El camp 0 çes la id. 1 i 2 son nom i cognoms
        $lineId = $fields[0];
        $lineNom = $fields[1];
        $lineCognom = $fields[2];
        //el camp 4 és provincia i el 5 ciutat
        $lineProv = $fields[4];
        $lineCiutat = $fields[5];
        
        // creem una variable per decidir el save per evitar aniuar massa ifs
        $save = true;
        
        if($provincia !="*" && $provincia != $lineProv){
            $save = false;
        }
        if ($ciutat != "*" && str_contains($lineCiutat, $ciutat)===false){
            $save = false;
        }
        //si es compleixen les condicions, desem el resultat per a retornar-lo
        if($save){
            $res []= $lineCognom .",". $lineNom." (".$lineId.") :".$lineCiutat; 
        }
    }
    return $res;
}

//Aquesta lògica és comú a writeClientsByFilter i AppendClientsByFilter
function ClientsByFilter($dataArray, $filter,&$linesAdded){
    //necessitem aquesta variable de retorn si volem saber el nombre de linies que afegirem al fitxer
    $linesAdded = 0;
    $writeData = "";
    foreach ($dataArray as $client){
        //fem un explode per a obtenir el cognom i nom
        $explode = explode("(", $client);
        $nomCognom = $explode[0];
        //un altre explode per separar el cognom del nom
        $nomSeparat = explode(",",$nomCognom);
        $cognom = $nomSeparat[0];
        $nom = $nomSeparat[1];
        //sistema similar al anterior per a decidir el save
        $save = true;
        if($filter!="*" && $filter != $cognom[0] && $filter != $nom[1]){
            $save = false;
        }
        if($save){
            $writeData .= $client;
            $linesAdded++;
        }
    }
    return $writeData;
}

function writeClientsByFilter($pathName, $dataArray, $filter){
    
    //preparem les dades i inicalitzem $linesAdded
    $linesAdded = 0;
    $writeData = ClientsByFilter($dataArray, $filter,$linesAdded);
    //obrim fitxer per a escriptura
    $file = fopen($pathName, "w");
    $ok = fwrite($file, $writeData);
    if ($ok===false){
        return -1;
    }else{
        return $linesAdded;
    }
}

function appendClientsByFilter($pathName, $dataArray, $filter){
    //preparem les dades
    $writeData = ClientsByFilter($dataArray, $filter,$linesAdded);
    //obrim fitxer per a afegir
    $file = fopen($pathName, "a");
    $ok = fwrite($file, $writeData);
    if ($ok=== false){
        return -1;
    }else{
        return $linesAdded;
    }
}