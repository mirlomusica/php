<?php

include_once(__DIR__."/../model/stakeholders/Employee.php");

$ident = (int)filter_input(INPUT_POST,"id");
$name = filter_input(INPUT_POST,"name");
$surname = filter_input(INPUT_POST,"surname");
$email = filter_input(INPUT_POST,"email");
$provincia = filter_input(INPUT_POST,"provincia");
$poblacio = filter_input(INPUT_POST,"poblacio");
$empId = (int)filter_input(INPUT_POST,"empId");
$hiringDate = filter_input(INPUT_POST,"hiringDate");
$dateObj = new DateTime($hiringDate);
$hiringDate = $dateObj->format("d-m-Y");

try{
    $employee = new Employee($ident,$name,$email,$provincia,$poblacio,$hiringDate,$empId);
    echo "Employee creat correctament";

}catch (BuildException $ex){
    print "ERROR: ".$ex->getMessage();

}
