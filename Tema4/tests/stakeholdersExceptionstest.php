<?php

include_once(__DIR__."/../model/stakeholders/Client.php");
include_once(__DIR__."/../model/stakeholders/Partner.php");
include_once(__DIR__."/../model/stakeholders/Sponsor.php");
include_once(__DIR__."/../model/stakeholders/Stakeholder.php");
include_once(__DIR__."/../model/stakeholders/Employee.php");
include_once(__DIR__."/../model/exceptions/BuildException.php");


print "<br><br>Pruebas try/catch constructor<br><br>";


$ident = 1;
$name = "jaume";
$email = "jaume@gomail.com";
$prov = "Barna";
$poblacio = "gava";
$hiringDate = "12-12-2023";
$empId = 3;
try {
    $person = new Employee($ident, $name, $email, $prov, $poblacio, $hiringDate, $empId);
    print "Object created Correctly";
    print "<br>";
} catch (BuildException $ex) {
    print "Error". $ex->getMessage();

}


$ident = 1;
$name = "";
$email = "jaumegomail.com";
$prov = "";
$poblacio = "";
$hiringDate = "12-12-22023";
$empId = 1;
try {
    $person = new Employee($ident, $name, $email, $prov, $poblacio, $hiringDate, $empId);
    print "Object created Correctly";
    var_dump($person);
    print "<br>";
} catch (BuildException $ex) {
    print "Error: ". $ex->getMessage();

}
