<?php

include_once(__DIR__."/../model/stakeholders/Client.php");
include_once(__DIR__."/../model/stakeholders/Partner.php");
include_once(__DIR__."/../model/stakeholders/Sponsor.php");
include_once(__DIR__."/../model/stakeholders/Stakeholder.php");
include_once(__DIR__."/../model/stakeholders/Employee.php");

testClient();

print "<br><br>Creación de un Sponsor<br><br>";
$sponsor = new Sponsor(1,"n1", "m1@mail.com", "p1", "pob1", 10000);
print getData($sponsor);

print "<br><br>Creación de un Partner<br><br>";
$partner = new Partner(1,"n1", "m1@mail.com", "p1", "pob1", "asdf");
print getData($partner);


print "<br><br>Creación de un Employee<br><br>";

$ident = 1;
$name = "Jaume";
$email = "jaume@jaume.com";
$provincia = "Barna";
$poblacio = "Gavà";
$hiringDate = "12-12-2012";
$employee = new Employee($ident, $name, $email, $provincia, $poblacio, $hiringDate);

print "get hiring date $hiringDate: ".$employee->getHiringDate()."<br>";
print "get antiquity: ".$employee->getAntiquity()."<br>";

$currentDate = new DateTime();
$endDate = "12-12-2030";
$period = "P200D";
print "get salary dates con fecha actual ".$currentDate->format("d-m-Y").", fecha final $endDate y periodo $period<<br>";
$dates = $employee->getSalaryDates($period, $endDate);
foreach($dates as $date){
    print $date."<br>";
}


function testClient()
{
    print "<h1>creació client: <br></h1>";
    $client = new Client(1,"n1", "m1@mail.com", "p1", "pob1", "c1", 1);

    print "Client creat correctament<br>";
    print $client->__toString();
    print "<br>";

    print "<h1>Proves de validació setters:<br></h1>";

    print "<h2>intentem canviar email a 'a': ";
    $return = $client->setEmail("a");
    print $return;
    print "</h2><br>";
    print "mail no canviat: ".$client->getEmail()."<br>";

    print "<h2>intentem canviar email a 'mailcanviat@canvi.com': ";
    $return = $client->setEmail("mailcanviat@canvi.com");
    print $return;
    print "</h2><br>";
    print "mail  canviat: ".$client->getEmail()."<br>";
}

function getData(Stakeholder $s){
    return $s->getData();
}
