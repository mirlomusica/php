<?php


include_once "../persistence/ClientPersistence.php";

function showRows(array $rows) {
    if (($numRows = count($rows)) > 0) {
        print "<br>------- FOUND $numRows ROWS --------------<br><br>";
        foreach ($rows as $row) {
            print "<br> $row <br>";
        }
    } else {
        print "<br>------- NOT FOUND ANY ROWS --------------<br><br>";
    }
}

$id = 200;
$name = "Jaume";
$email = "jaume@gmail.com";
$provincia = "Barna";
$poblacio = "Gava";
$cognom = "Estalella";
$clientId = 200;

$p = new ClientPersistence();

print "<h1>Creació client</h1>";
try {

    $client = new Client($id, $name, $email, $cognom, $provincia, $poblacio);
    print "OK <br>";
}catch(BuildException $ex){
    print $ex->getMessage()."<br>";
}


print "<h1>ADD</h1>";
try{
$p->add($client);
    print "OK<br>";
}catch(Exception $ex){
    print $ex->getMessage()."<br>";
}


print "<h1>DELETE</h1>";
try{
$p->delete($id);
    print "OK<br>";
}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}

print "<h1>GET BY PROVINCE</h1>";
$province = "Lleida";

try{
$result = $p->getByProvince($province);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h2>GET BY PROVINCE(No results)</h2>";
$province = "Toledo";

try{
$result = $p->getByProvince($province);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h1>GET BY NAME</h1>";
$name = "Carlos";

try{
$result = $p->findByName($name);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h2>GET BY NAME(no results)</h2>";
$name = "Pedro";

try{
$result = $p->findByName($name);
    print "OK<br>";
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h1>GET BY NAME and SURNAME</h1>";
$name = "Carlos";
$surname = "Ramos";

try{
$result = $p->findByNameAndSurname($name,$surname);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h2>GET BY NAME and SURNAME(no results)</h2>";
$name = "Carlos";
$surname = "Perez";

try{
$result = $p->findByNameAndSurname($name,$surname);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h1>GET BY CITIES</h1>";
$cities = ["Barcelona", "Viladecans","Terrassa"];

try{
$result = $p->findByCites($cities);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}

print "<h2>GET BY CITIES (no results)</h2>";
$cities = ["Cincinnati","Porrera"];

try{
$result = $p->findByCites($cities);
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}
