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
    print "OK<br>";
    showRows($result);

}catch(PDOException $ex){
    print $ex->getMessage() . "<br>";
}catch(ServiceException $ex){
    print $ex->getMessage();
}
