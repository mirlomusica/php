<?php

include_once __DIR__."/../model/products/Book.php";
include_once __DIR__."/../persistence/BookPersistence.php";

function booksToAssoc($books)
{
    $res = [];
    foreach ($books as $book) {
        $row = [];
        $row["id_llibre"] = $book->getId_llibre();
        $row["titol"] = $book->getTitol();
        $row["autor"] = $book->getAutor();
        $row["tema"] = $book->getTema();
        $row["any_publicacio"] = $book->getAny_publicacio();
        $row["preu"] = $book->getPreu();
        $res[] = $row;


    }
    return $res;

}

$field = filter_input(INPUT_POST, "field");
$value = filter_input(INPUT_POST, "value");


if (!$field || !$value) {
    print "rellena el formulario";
    die();
}

$persistence = new BookPersistence();

switch ($field) {
    case "id_llibre":

        try {
            $result = $persistence->findById($value);
            echo json_encode(booksToAssoc($result));
        } catch (ServiceException $ex) {
            print json_encode(["error"=>"Error de cerca:".$ex->getMessage()]);
        }
        break;
    case "title":
        try {
            $result = $persistence->findByTitle($value);
            echo json_encode(booksToAssoc($result));
        } catch (ServiceException $ex) {
            print json_encode(["error"=>"Error de cerca:".$ex->getMessage()]);
        }
        break;

    case "any_publicacio":
        try {
            $result = $persistence->findByYear($value);
            echo json_encode(booksToAssoc($result));
        } catch (ServiceException $ex) {
            print json_encode(["error"=>"Error de cerca:".$ex->getMessage()]);
        }
        break;

    case "tema":
        try {
            $result = $persistence->findByTheme($value);
            echo json_encode(booksToAssoc($result));
        } catch (ServiceException $ex) {
            print json_encode(["error"=>"Error de cerca:".$ex->getMessage()]);
        }
        break;

    case "temes":
        try {
            $value = explode(",",$value);
            $formatted = [];
            foreach($value as $theme){
                $formatted [] = trim($theme);
            }
            

            $result = $persistence->findByThemes($formatted);
            echo json_encode(booksToAssoc($result));
        } catch (ServiceException $ex) {
            print json_encode(["error"=>"Error de cerca:".$ex->getMessage()]);
        }
        break;
}
