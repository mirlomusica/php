<?php

include ( '../persistence/PdoAdapter.php');

/*
 * PROVES D'UN ADAPTADOR PER TREBALLAR AMB LA CLASSE PDO DE FORMA MÉS MODULAR
 * ENCARA HEM DE TREBALLAR AMB CODI SQL I NO TENIM LA POSIBILITAT DE TREBALLAR 
 * DIRECTAMENT AMB ELS OBJECTE DEL NOSTRE DOMINI, PERO EL CODI ES UNA MICA MES CLAR
 * Y NO HI SOM TAN ACOBLATS A LA CLASSE PDO
 */

function showRows(array $rows) {
    if (($numRows = count($rows)) > 0) {
        print "<br>------- FOUND $numRows ROWS --------------<br><br>";
        foreach ($rows as $row) {
            foreach ($row as $field => $value) {
                print "$field : $value <br>";
            }
            print "-----------------------------------<br><br>";
        }
    } else {
        print "<br>------- NOT FOUND ANY ROWS --------------<br><br>";
    }
}

function showResult(bool $result) {
    if ($result === true) {
        print "<br>------ DONE --------------<br>";
    } else {
        print "<br>------ NO ROWS AFFECTED --------------<br>";
    }
}

try {
    $pdo = new PdoAdapter();
    print "Conexión correcta";
    print "<br>-----------------------------------<br><br>";
    $sql = "SELECT id_client, nom, cognom, email, provincia, poblacio FROM Clients";
    $rows = $pdo->read($sql);
    showRows($rows);

    $sqlTest = "SELECT id_client, nom, cognom, email, provincia, poblacio "
            . "FROM Clients WHERE id_client = 101";

    $sql = "INSERT INTO Clients VALUES
            (101,'Felix','Del Val','felixdv@example.com','Barcelona','Gava');";
    $rows = $pdo->write($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $rows = $pdo->read($sqlTest);
    showRows($rows);

    $sql = "UPDATE Clients SET poblacio = 'Castelldefells' WHERE id_client=101;";
    $rows = $pdo->write($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $rows = $pdo->read($sqlTest);
    showRows($rows);

    $sql = "DELETE FROM Clients WHERE id_client=101;";
    $rows = $pdo->write($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $rows = $pdo->read($sqlTest);
    showRows($rows);


    $sqlTest = "SELECT id_client, nom, cognom, email, provincia, poblacio "
            . "FROM Clients WHERE id_client = :id";
    $id = 102;
    $sql = "INSERT INTO Clients VALUES (:id,:nom,:cognom,:email,:prov,:pob);";
    $pdo->prepareStmt($sql);
    $result = $pdo->execWriteStmt([
        ':id' => $id,
        ':nom' => "Alex",
        ':cognom' => "Rodriguez",
        ':email' => "alexrod@gmail.com",
        ':prov' => "Tarragona",
        ':pob' => "Reus"
    ]);
    showResult($result);

    $pdo->prepareStmt($sqlTest);
    $rows = $pdo->execReadStmt([':id' => $id]);
    showRows($rows);

    $sql = "UPDATE Clients SET poblacio = :pob WHERE id_client=:id;";
    $pdo->prepareStmt($sql);
    $result = $pdo->execWriteStmt([
        ':id' => $id,
        ':pob' => "Tortosa"
    ]);
    showResult($result);

    $pdo->prepareStmt($sqlTest);
    $rows = $pdo->execReadStmt([':id' => $id]);
    showRows($rows);

    $sql = "DELETE FROM Clients WHERE id_client=:id;";
    $pdo->prepareStmt($sql);
    $result = $pdo->execWriteStmt([':id' => $id]);
    showResult($result);

    $pdo->prepareStmt($sqlTest);
    $rows = $pdo->execReadStmt([':id' => $id]);
    showRows($rows);
} catch (ServiveException $e) {
    print "Error de Servei: " . $e->getMessage();
}
