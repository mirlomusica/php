<?php

include_once __DIR__."/../model/products/Book.php";
include_once "PdoAdapter.php";

class BookPersistence extends PdoAdapter
{
    private function rowsToBooks($rows)
    {
        $books = [];
        foreach ($rows as $row) {
            $id_llibre = $row["id_llibre"];
            $titol = $row["titol"];
            $autor = $row["autor"];
            $tema = $row["tema"];
            $any_publicacio = $row["any_publicacio"];
            $preu = $row["preu"];
            $books [] = new Book($id_llibre, $titol, $autor, $tema, $any_publicacio, $preu);
        }
        return $books;

    }

    public function findByTitle($title)
    {

        try {
            $this->prepareStmt("SELECT * FROM Llibres where titol=:title");
            $rows = $this->execReadStmt([":title" => $title]);
        } catch (PDOException $ex) {
            throw new ServiceException("Consulta per titol fallida:". $ex->getMessage());
        }
        if (!$rows) {
            throw new ServiceException("cap llibre amb títol $title");
        }

        return $this->rowsToBooks($rows);
    }

}
