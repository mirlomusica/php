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

    public function insertBook(Book $book)
    {
        try {
            $this->prepareStmt("INSERT 
                INTO Llibres (id_llibre, titol, autor, tema, any_publicacio, preu)
                VALUES(:id_llibre, :titol, :autor, :tema, :any_publicacio, :preu )");
            $this->execWriteStmt([
                ":id_llibre" => $book->getId_llibre(),
                ":titol" => $book->getTitol(),
                ":autor" => $book->getAutor(),
                ":tema" => $book->getTema(),
                ":any_publicacio" => $book->getAny_publicacio(),
                ":preu" => $book->getPreu()

            ]);

        } catch (PDOException $ex) {
            throw new ServiceException("Error al introduir Llibre". $ex->getMessage());
        }
    }

    public function updateBook(Book $book)
    {
        try {
            $this->prepareStmt("SELECT * From Llibres WHERE id_llibre=:id_llibre");
            $rows = $this->execReadStmt([
                ":id_llibre" => $book->getId_llibre()]);

            if (!$rows) {
                throw new ServiceException("llibre amb id ".$book->getId_llibre()." no trobat");
            }
            $this->prepareStmt(
                "UPDATE Llibres
                SET  titol=:titol, autor=:autor, tema=:tema, any_publicacio=:any_publicacio, preu=:preu
                Where id_llibre=:id_llibre"
            );

            $this->execWriteStmt([
                ":id_llibre" => $book->getId_llibre(),
                ":titol" => $book->getTitol(),
                ":autor" => $book->getAutor(),
                ":tema" => $book->getTema(),
                ":any_publicacio" => $book->getAny_publicacio(),
                ":preu" => $book->getPreu()

            ]);


        } catch (PDOException $ex) {
            throw new ServiceException("Error al actualitzar Llibre". $ex->getMessage());
        }
    }


    public function deleteBook(int $id_llibre)
    {
        try {
            $this->prepareStmt("DELETE  FROM Llibres WHERE id_llibre=:id_llibre");

            $this->execWriteStmt([ ":id_llibre" => $id_llibre]);

        } catch (PDOException $ex) {
            throw new ServiceException("Error al esborrar Llibre". $ex->getMessage());
        }
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

    public function findById($id_llibre)
    {

        try {
            $this->prepareStmt("SELECT * FROM Llibres where id_llibre=:id_llibre");
            $rows = $this->execReadStmt([":id_llibre" => $id_llibre]);
        } catch (PDOException $ex) {
            throw new ServiceException("Consulta per id fallida:". $ex->getMessage());
        }
        if (!$rows) {
            throw new ServiceException("cap llibre amb id $id_llibre");
        }

        return $this->rowsToBooks($rows);
    }

    public function findByYear($year)
    {

        try {
            $this->prepareStmt("SELECT * FROM Llibres where any_publicacio=:year");
            $rows = $this->execReadStmt([":year" => $year]);
        } catch (PDOException $ex) {
            throw new ServiceException("Consulta per any fallida:". $ex->getMessage());
        }
        if (!$rows) {
            throw new ServiceException("cap llibre amb any de Publicació $year");
        }

        return $this->rowsToBooks($rows);
    }

    public function findByTheme($theme)
    {

        try {
            $this->prepareStmt("SELECT * FROM Llibres where tema=:theme");
            $rows = $this->execReadStmt([":theme" => $theme]);
        } catch (PDOException $ex) {
            throw new ServiceException("Consulta per any fallida:". $ex->getMessage());
        }
        if (!$rows) {
            throw new ServiceException("cap llibre amb tema $theme");
        }

        return $this->rowsToBooks($rows);
    }

    public function findByThemes(array $themes): array
    {
        $themeQuery = "";
        foreach ($themes as $theme) {
            if ($themeQuery != "") {
                $themeQuery .= ",";
            }

            $themeQuery .= "'".$theme."'";

        }
        try {
            $rows = $this->read("SELECT * FROM Llibres WHERE tema IN ( ".$themeQuery .")");
        } catch (PDOException $ex) {
            throw new ServiceException("Error al buscar per temes: ".$ex->getMessage());
        }


        if (!$rows) {
            throw new ServiceException("Cap llibre amb els seguents temes: $themeQuery");
        }


        return $this->rowsToBooks($rows);


    }

}
