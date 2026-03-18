<?php

include_once(__DIR__."/../model/Person.php");
include_once(__DIR__."/../model/Client.php");
include_once(__DIR__."/../model/Employee.php");
include_once(__DIR__."/../model/Stakeholder.php");

//Person
echo "<h1>Creació Person</h1>";
$id = "1";
$name = "Pedro";
$address = "Gavà";
$fechaNacimiento = "01-02-2004";
$person = new Person($id,$name,$address,$fechaNacimiento);

echo "<h2>Getters</h2>";
echo "<p>id: ". $person->getId()."</p>";
echo "<p>name: ". $person->getName()."</p>";
echo "<p>address: ". $person->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $person->getFechaNacimiento()."</p>";

echo "<h2>Setters</h2>";
$person->setId("2");
$person->setName("Juan");
$person->setAddress("Viladecans");
$person->setFechaNacimiento("02-03-2005");

echo "<p>id: ". $person->getId()."</p>";
echo "<p>name: ". $person->getName()."</p>";
echo "<p>address: ". $person->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $person->getFechaNacimiento()."</p>";

echo "<h1>Creació Client</h1>";
$email = "email@client.com";
$client = new Client($id,$name,$address,$fechaNacimiento,$email);
echo "<h2>Getters</h2>";
echo "<p>id: ". $person->getId()."</p>";
echo "<p>name: ". $person->getName()."</p>";
echo "<p>address: ". $person->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $person->getFechaNacimiento()."</p>";
echo "<p>email: ". $client->getEmail()."</p>";

echo "<h2>Setters</h2>";
$client->setId("2");
$client->setName("Juan");
$client->setAddress("Viladecans");
$client->setFechaNacimiento("02-03-2005");
$client->setEmail("emailCanviado@gmail.com");


echo "<p>id: ". $client->getId()."</p>";
echo "<p>name: ". $client->getName()."</p>";
echo "<p>address: ". $client->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $client->getFechaNacimiento()."</p>";
echo "<p>Email: ". $client->getEmail()."</p>";

echo "<h1>Creació employee</h1>";
$salary = 235.3;
$employee = new Employee($id,$name,$address,$fechaNacimiento,$salary);
echo "<h2>Getters</h2>";
echo "<p>id: ". $employee->getId()."</p>";
echo "<p>name: ". $employee->getName()."</p>";
echo "<p>address: ". $employee->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $employee->getFechaNacimiento()."</p>";
echo "<p>Salary: ". $employee->getSalary()."</p>";

echo "<h2>Setters</h2>";
$employee->setId("2");
$employee->setName("Juan");
$employee->setAddress("Viladecans");
$employee->setFechaNacimiento("02-03-2005");
$employee->setSalary(24345435);


echo "<p>id: ". $employee->getId()."</p>";
echo "<p>name: ". $employee->getName()."</p>";
echo "<p>address: ". $employee->getAddress()."</p>";
echo "<p>Fecha nacimiento: ". $employee->getFechaNacimiento()."</p>";
echo "<p>Salary: ". $employee->getSalary()."</p>";



//getData(interface)

echo "<h1>getData()</h1>";

echo "<p>Client: ". $client->getData()."</p>";
echo "<p>Employee: ". $employee->getData()."</p>";



function showData(Stakeholder $s): string{
    return $s->getData();

}

echo "<h1>showData()</h1>";

echo "<p>Client: ". showData($client)."</p>";
echo "<p>Employee: ". showData($employee)."</p>";


echo "<h1>Validacions</h1>";

$fechaNacimiento = "Abril de 1967";
echo "<p>output de setFechaNacimiento($fechaNacimiento):" . (int)$person->setFechaNacimiento($fechaNacimiento)."</p>";
echo "<p>fecha de nacimiento sin cambiar: " . $person->getFechaNacimiento()."</p>";
