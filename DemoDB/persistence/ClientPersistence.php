<?php

include_once __DIR__ . '/../model/stakeholders/Client.php';
include_once __DIR__ . '/../exceptions/ServiceException.php';
include_once __DIR__ . "/PdoAdapter.php";

class ClientPersistence extends PdoAdapter
{
    private function rowsToClients(array $rows): array
    {
        $arrayClients = [];
        foreach ($rows as $data) {
            $arrayClients[] = new Client(
                $data["id_client"],
                $data["nom"],
                $data["email"],
                $data["cognom"],
                $data["provincia"],
                $data["poblacio"]
            );
        }
        return $arrayClients;
    }

    public function getAll(): array
    {
        $arrayClients = [];
        $rows = $this->read("SELECT id_client,nom,cognom,email,provincia,poblacio FROM Clients ");
        foreach ($rows as $data) {
            $arrayClients[] = new Client(
                $data["id_client"],
                $data["nom"],
                $data["email"],
                $data["cognom"],
                $data["provincia"],
                $data["poblacio"]
            );
        }
        return $arrayClients;
    }

    public function getByIdent(int $id): Client
    {
        $this->prepareStmt("SELECT id_client,nom,cognom,email,provincia,poblacio FROM Clients WHERE id_client = :id;");
        $data = $this->execReadStmt([":id" => $id]);
        if (count($data) > 0) {

            return new Client(
                $data[0]["id_client"],
                $data[0]["nom"],
                $data[0]["email"],
                $data[0]["cognom"],
                $data[0]["provincia"],
                $data[0]["poblacio"]
            );
        } else {
            throw new ServiceException("Not Cient found with id = " . $id);
        }
    }

    public function delete(int $id): bool
    {
        try {
            $this->prepareStmt("DELETE FROM Clients WHERE id_client=:id;");

            return $this->execWriteStmt([":id" => $id]);
        } catch (PDOException $ex) {
            throw new ServiceException("Error al esborrar al client $id -->" . $ex->getMessage());
        }
    }

    public function add(Client $c): bool
    {
        try {
            $this->prepareStmt("INSERT INTO Clients VALUES (:id,:nom,:cognom,:email,:prov,:pob);");

            return $this->execWriteStmt(
                [
                        ':id' => $c->getId(),
                        ':nom' => $c->getNom(),
                        ':cognom' => $c->getCognom(),
                        ':email' => $c->getEmail(),
                        ':prov' => $c->getProvincia(),
                        ':pob' => $c->getPoblacio()
                            ]
            );
        } catch (PDOException $ex) {
            throw new ServiceException("Error al insertar client -->" . $ex->getMessage());
        }
    }

    public function update(Client $c): bool
    {
        try {
            $this->prepareStmt("UPDATE Clients "
                    . "SET nom = :nom, cognom = :cognom, "
                    . "email = :email, provincia = :prov, poblacio = :pob "
                    . "WHERE id_client=:id;");

            return $this->execWriteStmt(
                [
                        ':id' => $c->getId(),
                        ':nom' => $c->getNom(),
                        ':cognom' => $c->getCognom(),
                        ':email' => $c->getEmail(),
                        ':prov' => $c->getProvincia(),
                        ':pob' => $c->getPoblacio()
                            ]
            );
        } catch (PDOException $ex) {
            throw new ServiceException("Error al actualitzar client -->" . $ex->getMessage());
        }
    }
    public function getByProvince(string $province)
    {
        try {
            $this->prepareStmt("SELECT * FROM Clients Where provincia=:provincia");
            $rows = $this->execReadStmt([":provincia" => $province]);
        } catch (PDOException $ex) {
            throw new ServiceException("Error al llegir per provincia".$ex->getMessage());
        }


        if (!$rows) {
            throw new ServiceException("No clients of Provincia $province");
        }

        return $this->rowsToClients($rows);

    }

    public function findByName(string $name)
    {
        try {
            $this->prepareStmt("SELECT * FROM Clients WHERE nom=:name");
            $rows = $this->execReadStmt([":name" => $name]);
        } catch (PDOException $ex) {
            throw new ServiceException("Error al buscar per nom: ".$ex->getMessage());
        }

        if (!$rows) {
            throw new ServiceException("Cap client amb nom $name");
        }

        return $this->rowsToClients($rows);


    }

    public function findByNameAndSurname(string $name, string $surname)
    {
        try {
            $this->prepareStmt("SELECT * FROM Clients WHERE nom=:name AND cognom=:surname");
            $rows = $this->execReadStmt([":name" => $name, ":surname" => $surname]);
        } catch (PDOException $ex) {
            throw new ServiceException("Error al buscar per nom i cognon: ".$ex->getMessage());
        }

        if (!$rows) {
            throw new ServiceException("Cap client amb nom $name i cognom $surname");
        }

        return $this->rowsToClients($rows);


    }
    public function findByCites(array $cities): array
    {
        $cityQuery ="";
        foreach($cities as $city){
            if($cityQuery != ""){
                $cityQuery .= ", ";
            }

            $cityQuery .="'".$city."'";

        }
        try {
            $rows = $this->read("SELECT * FROM Clients WHERE poblacio IN ( ".$cityQuery .")");
        } catch (PDOException $ex) {
            throw new ServiceException("Error al buscar per nom: ".$ex->getMessage());
        }


        if (!$rows) {
            throw new ServiceException("Cap client de les següents ciutats: $cityQuery");
        }


        return $this->rowsToClients($rows);


    }
}
