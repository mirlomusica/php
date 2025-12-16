<?php

$COUNTRIES = [
    ["pais" => "España", "capital" => "Madrid", "poblacio" => 4000000],
    ["pais" => "Francia", "capital" => "Paris", "poblacio" => 6000000],
    ["pais" => "Italia", "capital" => "Roma", "poblacio" => 5000000],
    ["pais" => "Portugal", "capital" => "Lisboa"],
    ["pais" => "Alemania", "capital" => "Berlin"],
    ["pais" => "Reino Unido", "capital" => "Londres"],
    ["pais" => "Grecia", "capital" => "Atenas"],
    ["pais" => "Suecia", "capital" => "Estocolmo"],
    ["pais" => "Noruega", "capital" => "Oslo"],
    ["pais" => "Finlandia", "capital" => "Helsinki"],
    ["pais" => "Rusia", "capital" => "Moscu"],
    ["pais" => "Ucrania", "capital" => "Kiev"],
    ["pais" => "Austria", "capital" => "Viena"],
    ["pais" => "Hungria", "capital" => "Budapest"],
    ["pais" => "Belgica", "capital" => "Bruselas"],
    ["pais" => "Holanda", "capital" => "Amsterdam"],
    ["pais" => "Rumania", "capital" => "Bucarest"],
    ["pais" => "Bulgaria", "capital" => "Sofia"]
];

function printArrayCountries(): void {
    global $COUNTRIES;

    foreach ($COUNTRIES as $country) {
        printCountry($country);
        echo "<br>";
    }
}

function printCountry(array $country): void {

    $first = true;
    foreach ($country as $index => $valor) {
        if ($first == true) {
            $first = false;
        } else {
            echo ", ";
        }
        echo "$index: $valor";
    }
}

function orderCountriesByField($field): void {
    global $COUNTRIES;

    $column = array_column($COUNTRIES, $field);
    array_multisort($column, $COUNTRIES, SORT_ASC);
}

function getCountryByPos(int $pos): array {
    global $COUNTRIES;

    if ($pos >= 0 and count($COUNTRIES) > $pos) {
        return $COUNTRIES[$pos];
    }
    return [];
}

function findCountryByName(string $name): array {
    global $COUNTRIES;

    foreach ($COUNTRIES as $country) {
        if ($country["pais"] == $name) {
            return $country;
        }
    }
    return [];
}
