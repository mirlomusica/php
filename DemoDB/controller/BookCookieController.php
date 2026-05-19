<?php

include_once __DIR__."/../model/products/Book.php";
include_once __DIR__."/../persistence/BookPersistence.php";

function booksToCsv($books)
{
    $res = "";
    foreach ($books as $book) {
        $id_llibre = $book->getId_llibre();
        $titol = $book->getTitol();
        $autor = $book->getAutor();
        $tema = $book->getTema();
        $any = $book->getAny_publicacio();
        $preu = $book->getPreu();

        $row = "";
        $row = "$id_llibre,$titol,$autor,$tema,$any,$preu;";
        $res .= $row;
    }
    return $res;

}

function sendResults($header, $result)
{
    $csv = "$header:";
    $csv .= booksToCsv($result);
    print strlen($csv);
    $cookieCode = setcookie("result", $csv, 0, "/");
    if (strlen($csv)>4096) {

        $errormsg = "la cookie ha fallado: demasiada información";
        setcookie("error", $errormsg, 0, "/");
        header("location:../view/Error.php");

    } else {
        header("location:../view/Results.php");

    }
}

$field = filter_input(INPUT_POST, "field");
$value = filter_input(INPUT_POST, "value");


if (!$field || !$value) {
    $errormsg = "rellena el formulario";
    setcookie("error", $errormsg, 0, "/");
    header("location:../view/Error.php");
}

$persistence = new BookPersistence();

switch ($field) {
    case "id_llibre":

        try {
            $result = $persistence->findById($value);
            $header = "id_llibre $value";
            sendResults($header, $result);

        } catch (ServiceException $ex) {
            $errormsg = "Error de cerca:".$ex->getMessage();
            setcookie("error", $errormsg, 0, "/");
            header("location:../view/Error.php");
        }
        break;
    case "title":
        try {
            $result = $persistence->findByTitle($value);
            $header = "titol $value";
            sendResults($header, $result);
        } catch (ServiceException $ex) {
            $errormsg = "Error de cerca:".$ex->getMessage();
            setcookie("error", $errormsg, 0, "/");
            header("location:../view/Error.php");
        }
        break;

    case "any_publicacio":
        try {
            $result = $persistence->findByYear($value);
            $header = "any_publicacio $value";
            sendResults($header, $result);
        } catch (ServiceException $ex) {
            $errormsg = "Error de cerca:".$ex->getMessage();
            setcookie("error", $errormsg, 0, "/");
            header("location:../view/Error.php");
        }
        break;

    case "tema":
        try {
            $result = $persistence->findByTheme($value);
            $header = "tema $value";
            sendResults($header, $result);
        } catch (ServiceException $ex) {
            $errormsg = "Error de cerca:".$ex->getMessage();
            setcookie("error", $errormsg, 0, "/");
            header("location:../view/Error.php");
        }
        break;

    case "temes":
        try {
            $value = explode(",", $value);
            $formatted = [];
            foreach ($value as $theme) {
                $formatted [] = trim($theme);
            }


            $result = $persistence->findByThemes($formatted);
            $header = "temes $value";
            sendResults($header, $result);
        } catch (ServiceException $ex) {
            $errormsg = "Error de cerca:".$ex->getMessage();
            setcookie("error", $errormsg, 0, "/");
            header("location:../view/Error.php");
        }
        break;
}
