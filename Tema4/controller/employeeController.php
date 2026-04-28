<?php

include_once(__DIR__."/../model/stakeholders/Employee.php");

$ident = (int)filter_input(INPUT_POST, "id");
$name = filter_input(INPUT_POST, "name");
$surname = filter_input(INPUT_POST, "surname");
$email = filter_input(INPUT_POST, "email");
$provincia = filter_input(INPUT_POST, "provincia");
$poblacio = filter_input(INPUT_POST, "poblacio");
$empId = (int)filter_input(INPUT_POST, "empId");
$hiringDate = filter_input(INPUT_POST, "hiringDate");
$dateObj = new DateTime($hiringDate);
$hiringDate = $dateObj->format("d-m-Y");

try {
    $employee = new Employee($ident, $name, $email, $provincia, $poblacio, $hiringDate, $empId);
    $return = ["status" => "ok","msg" => "Employee Creat correctament"];
    echo json_encode($return);

} catch (BuildException $ex) {
    $msg = str_replace(",", "<br>", $ex->getMessage());

    $errorMessage = "ERROR: <br>".$msg;
    $return = ["status" => "error","msg" => $errorMessage];
    echo json_encode($return);
}
