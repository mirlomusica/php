<?php

include_once __DIR__."/../persistence/ClientPersistence.php";

function formatCities($citiesString)
{
    $citiesExploded = explode(",", $citiesString);
    $formatted = [];
    foreach ($citiesExploded as $city) {
        $formatted [] = trim($city);
    }
    return $formatted;
}

function clientsToCsv($clients,$value1,$value2)
{
    $csv = "$value1 $value2:";
    foreach ($clients as $client) {
        $id_client = $client->getId();
        $nom = $client->getNom();
        $cognom = $client->getCognom();
        $email = $client->getEmail();
        $provincia = $client->getProvincia();
        $poblacio = $client->getPoblacio();

        $csv .= "$id_client,$nom,$cognom,$email,$provincia,$poblacio;";
    }
    return $csv;
}
function showResults($results,$value1,$value2)
{
    $csv = clientsToCsv($results,$value1,$value2);
    setcookie("res", $csv, 0, "/");
    header("location:../view/ClientResults.php");
}

function showError($error)
{
    setcookie("error", $error, 0, "/");
    header("location:../view/Error.php");

}

$clientRepo = new ClientPersistence();

$field = filter_input(INPUT_POST, "field");
$value1 = filter_input(INPUT_POST, "value1");
$value2 = filter_input(INPUT_POST, "value2");



switch ($field) {
    case "nom":
        try {
            $results = $clientRepo->findByName($value1);
            showResults($results,$value1,$value2);

        } catch (ServiceException $ex) {
            showError("Error cerca per nom:".$ex->getMessage());
        }
        break;

    case "provincia":
        try {
            $results = $clientRepo->getByProvince($value1);
            showResults($results,$value1,$value2);

        } catch (ServiceException $ex) {
            showError("Error cerca per provincia:".$ex->getMessage());
        }
        break;

    case "nomCognom":
        try {
            $results = $clientRepo->findByNameAndSurname($value1, $value2);
            showResults($results,$value1,$value2);

        } catch (ServiceException $ex) {
            showError("Error cerca per nom i cognom:".$ex->getMessage());
        }
        break;

    case "ciutats":
        try {
            $formatted = formatCities($value1);
            $results = $clientRepo->findByCites($formatted);
            showResults($results,$value1,$value2);

        } catch (ServiceException $ex) {
            showError("Error cerca per ciutats:".$ex->getMessage());
        }
        break;
    default:
        showError("Error: camp de cerca no identificat");

}
