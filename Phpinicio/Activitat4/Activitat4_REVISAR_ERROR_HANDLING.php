<?php
print "<h1>Activitat 4. Variables compostes (estructures de dades)</h1>";
print "<h4> Crear un array associatiu que podria contenir dades dels usuaris d’un portal web, amb els
camps: Alias, Password, Email, Level i Points. </h4>";




print "<h3>1. Omplir el array amb almenys 5 usuaris diferents i presentar-lo per pantalla:</h3>";

$usersArray = [
    "Pedro" =>["Alias"=> "Destroyer84","Password"=>"1234","Level"=>99,"Points"=>8345],
    "Carlos" =>["Alias"=> "n00b","Password"=>"4iggj3t02ergtrg#@","Level"=>10,"Points"=>1000],
    "Benito" =>["Alias"=> "s3xyg1rl","Password"=>"BobbyForever","Level"=>99,"Points"=>1455],
    "Marta" =>["Alias"=> "Infinite_Wizard","Password"=>"dungeonsanddragons","Level"=>1,"Points"=>3425],
    "Juan" =>["Alias"=> "Bob","Password"=>"Alice","Level"=>20,"Points"=>5547],
    "Yolanda" =>["Alias"=> "Yoliesunacrack","Password"=>"Lamejor2345","Level"=>50,"Points"=>235],
    ];

$alphabetArray = 'abcdefghijklmnopqrstuvwxyz';

printUserArray($usersArray);

xmlPrint($usersArray);

print "<h3>2. Presentar les dades d’un determinat usuari a partir del seu Alias</h3>";
print "<p>El programa escollirà aleatòriament quin a partir d’un altre array de strings on s’incloguin també noms d’usuaris
que no es trobin al array associatiu)</p>";




$aliasArray = ["Destroyer84","n00b","s3xyg1rl","Infinite_Wizard","Bob","Dad","false_name1993","chatbotforever"];

$rand = rand(0,count($aliasArray)-1);
$randomAlias = $aliasArray[$rand];

print "<h4>Alias seleccionado: $randomAlias</h4>";

$randomUser = getUserByAlias($randomAlias);
if($randomUser==""){print "ERROR: Ningún usuario con el Alias seleccionado<br>";}


else{
    $key = key($randomUser);
    printUser($key, $randomUser);
    
}




print "<h3>3. Presentar les dades dels d’usuaris d’un determinat nivell</h3>";
print "<p>Que el programa escollirà aleatòriament a partir d’un altre array de sencers on s’incloguin també nivells que no es
trobin al array associatiu).</p>";



$levelArray = [99,1,32,67,20,45,63,2,7,8];

$rand =rand(0,count($levelArray)-1);
$randomLevel = $levelArray[$rand];
print "<h4>Nivel seleccionado: $randomLevel</h4>";

$randomUsers = getUsersByLevel($randomLevel);

if ($randomUsers == []){print "ERROR: Ningún usuario de nivel $randomLevel";}
else {printUserArray($randomUsers);}



print "<h3>4. Presentar les dades dels d’usuaris amb uns determinats punts</h3>";
print "<p>Presentar el llistat d’usuaris que tinguin una puntuació que estigui entre 2 valors que el
programa escollirà aleatòriament. Per exemple, entre 1.000 i 5.000 punts</p>";

$pointRange1 = rand(0,10000);
$pointRange2 = rand(0,10000);

print "<h4>Rango de puntos: $pointRange1, $pointRange2</h4>";

$randomUsers = getUsersByPoints($pointRange1,$pointRange2);

if ($randomUsers == []){print "ERROR: Ningún usuario de con puntos entre $pointRange1 y $pointRange2";}
else {printUserArray($randomUsers);}

print "<h3>5. Provar amb l’array associatiu la funció unset() per eliminar alguns usuaris aleatòriament i
comprovar com queda l’array presentant-lo per pantalla.</h3>";

print "executem 'unset('Pedro') i unset('Marta'):<br><br>";

unset($usersArray["Pedro"]);
unset($usersArray["Marta"]);
printUserArray($usersArray);

print "<h3>6. Provar la funció array_values() per reindexar l’array i comprovar com queda presentant-lo
per pantalla.</h3>";

print "Les claus de l'array son els noms dels jugadors. Ho podem veure fent el var_dump:<br><br>";
var_dump($usersArray);

print "<br><br>";
print "array_values canvia les claus a valors numèrics. Ho podem veure fent el var_dump:<br><br>";
var_dump(array_values($usersArray));

print "<br><br>";

print "<h3>7. Provar la diferència entre ordenar l’array associatiu d’usuaris amb sort() i ksort(), i si
podrien aconseguir ordenar el vector per qualsevol dels seus camps. Investigar com es
podria realitzar i mostrar els resultats per pantalla.</h3>";

print "<p>sort() ordena els elements per el seu valor. En el nostre cas, no sembla trobar una ordenació adequada i deixa l'array com estava:</p>";
$sortedArray = $usersArray;
sort($sortedArray);
printUserArray($usersArray);

print "<p>ksort() ordena els elements per la seva clau. En el nostre cas, els noms reals dels jugadors:</p>";
$ksortedArray = $usersArray;
ksort($ksortedArray);
printUserArray($usersArray);

print "<p>Ordenant els Usuaris per Alias utilitzant array_multisort():</p>";
$alias = array_column($usersArray, "Alias");
array_multisort($alias,SORT_ASC,$usersArray);
printUserArray($usersArray);

print "<p>Ordenant els Usuaris per Nivell utilitzant array_multisort():</p>";
$level = array_column($usersArray, "Level");
array_multisort($level, SORT_DESC, $usersArray);
printUserArray($usersArray);

print "<p>Ordenant els Usuaris per Punts utilitzant array_multisort():</p>";
$points = array_column($usersArray, "Points");
array_multisort($points, SORT_DESC, $usersArray);
printUserArray($usersArray);


print "<h3>7. Generar aleatòriament un caràcter entre la a i la z, i presentar el llistat d’usuaris on al seu
alies aparegui el caràcter generat aleatòriament.</h3>";

$rand2 = rand(0, strlen($alphabetArray)-1);
$randomLetter = $alphabetArray[$rand];

print "<h4>Lletra escollida: $randomLetter</h4>";
$randomUsers = getUsersByLetter($usersArray, $randomLetter);
if ($randomUsers == []){print "ERROR: Ningún alias contiene la letra $randomLetter";}
else {printUserArray($randomUsers);}

// --------------------Funciones--------------------------------------------------------------------


function printUserArray($array){
    foreach($array as $key => $user){
        printUser($key, $user);
    }
}

function printUser($key, $user){
    $alias =$user["Alias"];
    $password = $user["Password"];
    $level = $user["Level"];
    $points = $user["Points"];
    print "<b>User: $key</b><br>";
    print "Alias: $alias<br>";
    print "Password: $password<br>";
    print "Level: $level<br>";
    print "Points: $points<br><br>";
}

function getUserByAlias($alias){
    global $usersArray;
    foreach ($usersArray as $key => $user){
        if ($user["Alias"]==$alias){return [$key =>$user];}
    }
    return "";
}

function getUsersByLevel($level){
    global $usersArray;
    $result =[];
    foreach ($usersArray as $key => $user){
        if($user["Level"]==$level){$result[]= $user;}
    }
    return $result;
}

function getUsersByPoints($pointRange1,$pointRange2){
    global $usersArray;
    if($pointRange1<$pointRange2){
        $min = $pointRange1;
        $max = $pointRange2;
    }else{
        $min = $pointRange2;
        $max = $pointRange1;        
    }
    $result = [];
    foreach($usersArray as $user){
        if($user["Points"]>$min && $user["Points"]<$max){$result[]=$user;}
    }
    return $result;
}


function getUsersByLetter($usersArray, $letter){
    $result = [];
    foreach ($usersArray as $user){
        $alias = strtolower($user["Alias"]);
        if (searchInString($letter, $alias, 0) != -1){$result[]= $user;}
    }
    return $result;
}

function searchInString($char,$string,$principioBusqueda){
    for($i=$principioBusqueda;$i<strlen($string);$i++){
        if($string[$i]==$char){return $i;}
    }
    return -1;
}


function xmlPrint($usersArray){
    
    print "<h3>Printado usando XML </h3>";
    foreach ($usersArray as $user){
        print "<Alias>";
        print 'Alias:'. $user["Alias"];
        print "</Alias>";
        print "<br>";
        print "<Password>";
        print 'Password :'. $user["Password"];
        print "</Password>";
        print "<br>";
        print "<Level>";
        print 'Level:'. $user["Level"];
        print "</Level>";
        print "<br>";
        print "<Points>";
        print 'Points:'. $user["Points"];
        print "</Points>";
        print "<br>";
        print "<br>";
    }
}