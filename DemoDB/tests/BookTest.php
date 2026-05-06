<?php


include_once __DIR__."/../model/products/Book.php";
include_once __DIR__."/../persistence/BookPersistence.php";


$id_llibre = 1;
$titol = "Jaume";
$autor = "Jaume";
$tema = "Programacio";
$any_publicacio = 1990;
$preu = 20.00;

try {
    $book = new Book($id_llibre, $titol, $autor, $tema, $any_publicacio, $preu);
    print "Objecte Creat Correctament";

} catch (Exception $ex) {
    print "Error Creant Book object<br>";
}

$p = new BookPersistence();

$title = ".NET";
$return = $p->findByTitle($title);
var_dump($return);
