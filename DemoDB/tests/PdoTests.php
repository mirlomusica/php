<?php

/*
 * PRIMERA APROXIMACIÓ A L'US DE LA CLASSE PDO
 * COMPROVACIÓ DE LES FUNCIONALITATS BASICAS
 * CODI MOLT MILLORABLE AMB MODULARITZACIO I PATRONS DE DISSENY
 */
$host = 'localhost';
$db = 'infobooks';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$user = 'daw1';
$pass = 'M0485phpdaw@';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Errores como excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch() devuelve arrays asociativos
    PDO::ATTR_EMULATE_PREPARES => false, // Usar prepared statements nativos si es posible
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    print "Conexión correcta";
    print "<br>-----------------------------------<br><br>";
    $sql = "SELECT id_client, nom, cognom, email, provincia, poblacio FROM clients";
    $stmt = $pdo->query($sql);

    if (($numRows = $stmt->rowCount()) > 0) {
        print "<br>------- FOUND $numRows ROWS --------------<br><br>";
        while ($row = $stmt->fetch()) {
            foreach ($row as $field => $value) {
                print "$field : $value <br>";
            }
            print "-----------------------------------<br><br>";
        }
    } else {
        print "<br>------- NOT FOUND ANY ROWS --------------<br><br>";
    }


    $sqlTest = "SELECT id_client, nom, cognom, email, provincia, poblacio "
            . "FROM clients WHERE id_client = 101";

    $sql = "INSERT INTO clients VALUES
            (101,'Felix','Del Val','felixdv@example.com','Barcelona','Gava');";
    $rows = $pdo->exec($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $stmt = $pdo->query($sqlTest);
    $rows = $stmt->fetchAll();
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

    $sql = "UPDATE clients SET poblacio = 'Castelldefells' WHERE id_client=101;";
    $rows = $pdo->exec($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $stmt = $pdo->query($sqlTest);
    $rows = $stmt->fetchAll();
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

    $sql = "DELETE FROM clients WHERE id_client=101;";
    $rows = $pdo->exec($sql);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";

    $stmt = $pdo->query($sqlTest);
    $rows = $stmt->fetchAll();
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


    $sqlTest = "SELECT id_client, nom, cognom, email, provincia, poblacio "
            . "FROM clients WHERE id_client = :id";
    $id = 102;

    $sql = "INSERT INTO clients VALUES
            (:id,:nom,:cognom,:email,:prov,:pob);";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':id' => $id,
        ':nom' => "Alex",
        ':cognom' => "Rodriguez",
        ':email' => "alexrod@gmail.com",
        ':prov' => "Tarragona",
        ':pob' => "Reus"
    ]);

    if ($result === true) {
        print "<br>------ DONE --------------<br>";
    } else {
        print "<br>------ NO ROWS AFFECTED --------------<br>";
    }

    $stmt = $pdo->prepare($sqlTest);
    $result = $stmt->execute([':id' => $id]);
    $rows = $stmt->fetchAll();
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

    $sql = "UPDATE clients SET poblacio = :pob WHERE id_client=:id;";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([
        ':id' => $id,
        ':pob' => "Tortosa"
    ]);

    if ($result === true) {
        print "<br>------ DONE --------------<br>";
    } else {
        print "<br>------ NO ROWS AFFECTED --------------<br>";
    }

    $stmt = $pdo->prepare($sqlTest);
    $result = $stmt->execute([':id' => $id]);
    $rows = $stmt->fetchAll();
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

    $sql = "DELETE FROM clients WHERE id_client=:id;";
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([':id' => $id]);

    if ($result === true) {
        print "<br>------ DONE --------------<br>";
    } else {
        print "<br>------ NO ROWS AFFECTED --------------<br>";
    }
    
    $stmt = $pdo->prepare($sqlTest);
    $result = $stmt->execute([':id' => $id]);
    $rows = $stmt->fetchAll();
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
} catch (PDOException $e) {
    print "Error de conexión: " . $e->getMessage();
}
