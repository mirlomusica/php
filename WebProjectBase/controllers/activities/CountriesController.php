<?php
declare(strict_types=1);
include_once '../../model/CountriesLib.php';

$key = filter_input(INPUT_POST, "key");
$showCountries = (bool) filter_input(INPUT_POST, "showcountries");
$country = filter_input(INPUT_POST, "pais");
$pos = (int) filter_input(INPUT_POST, "pos");

if ($key) {
    echo "<br><br><b>Paissos ordenats per $key: DONE!</b><br><br>";
    orderCountriesByField($key);
    if ($showCountries) {
        printArrayCountries();
    }
}

if ($country != null) {
    $selectedCountry = findCountryByName($country);
    if ($selectedCountry) {
        echo "<br><br><b>Dades de $country</b><br><br>";
        printCountry($selectedCountry);
    }else {
        echo "<br><br><b>No trobem dades del país amb el nom $country</b><br><br>";
    }   
}

if ($pos > 0) {
    $selectedCountry = getCountryByPos($pos);
    if ($selectedCountry) {
        echo "<br><br><b>Dades del país ubicat a la posicio: $pos</b><br><br>";
        printCountry($selectedCountry);
    }else {
        echo "<br><br><b>No trobem dades del país a la posició $pos</b><br><br>";
    }   
} 

print "  <p><a href=\"../../views/activities/ArrayAssocView.html\">Volver a la página anterior</a></p>\n";

