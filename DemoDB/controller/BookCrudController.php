<?php

include_once __DIR__."/../model/products/Book.php";
include_once __DIR__."/../persistence/BookPersistence.php";


$action = filter_input(INPUT_POST, "action");
$id_llibre = filter_input(INPUT_POST, "id_llibre");
$titol = filter_input(INPUT_POST, "titol");
$autor = filter_input(INPUT_POST, "autor");
$tema = filter_input(INPUT_POST, "tema");
$any_publicacio = filter_input(INPUT_POST, "any_publicacio");
$preu = filter_input(INPUT_POST, "preu");

$persistence = new BookPersistence();

switch ($action) {
    case "Create":
        if ($id_llibre == null || $titol == null || $autor == null || $tema == null || $any_publicacio == null || $preu == null) {
            print "datos incompletos";
            die();
        }
        try {
            $book = new Book($id_llibre, $titol, $autor, $tema, $any_publicacio, $preu);
        } catch (BuildException $ex) {
            print "Error creant llibre".$ex->getMessage();
            die();
        }

        try {
            $persistence->insertBook($book);
            print "llibre insertat";
        } catch (ServiceException $ex) {
            print "Error insertant llibre a la DB". $ex->getMessage();
            die();
        }
        break;

    case "Update":
        if ($id_llibre == null || $titol == null || $autor == null || $tema == null || $any_publicacio == null || $preu == null) {
            print "datos incompletos";
            die();
        }
        try {
            $book = new Book($id_llibre, $titol, $autor, $tema, $any_publicacio, $preu);
        } catch (Exception $ex) {
            print "Error creant llibre".$ex->getMessage();
        }

        try {
            $persistence->updateBook($book);
            print "llibre actualitzat";
        } catch (ServiceException $ex) {
            print "Error actualitzant llibre a la DB". $ex->getMessage();
        }
        break;

    case "Delete":
        if ($id_llibre == null) {
            print "inserta id_llibre";
            die();
        }

try{
    $persistence->findById($id_llibre);
        }catch(ServiceException $ex){
            print "llibre amb id $id_llibre no trobat";
            die();
        }
        try {
            $persistence->deleteBook($id_llibre);
            print "llibre esborrat";

        } catch (ServiceException $ex) {
            print "Error esborrant llibre a la DB". $ex->getMessage();

        }

        break;
}
