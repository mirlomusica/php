<?php

include_once __DIR__ . '/../persistence/ClientPersistence.php';
include_once __DIR__ . '/../exceptions/ServiceException.php';
include_once __DIR__ . '/../model/stakeholders/Client.php';

/*
 * PROVES D'UN ADAPTADOR ESPECIFIC PER TREBALLAR AMB ELS OBJECTES DEL NOSTRE DOMINI
 * HAUREM DE DISSENYAR UN PER CADA ENTITAT, PERO JA NO ESTEN ACOBLATS NI A PDO
 * NI AL CODI SQL I PODEM TREBALLAR DIRECTAMENT AMB ELS OBJECTES
 */

function showRows(array $rows) {
    if (($numRows = count($rows)) > 0) {
        print "<br>------- FOUND $numRows ROWS --------------<br><br>";
        foreach ($rows as $row) {
            print "<br> $row <br>";
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
    $c1 = new Client(101, 'Felix', 'felixdv@example.com', 'Del Val', 'Barcelona', 'Gava');
    $clientRepo = new ClientPersistence();
    print "Conexión correcta";
    
    print "<br>----------- LLISTA DE CLIENTS ------------------------<br><br>";
    $clients = $clientRepo->getAll();
    showRows($clients);

    
    $client = $clientRepo->getByIdent(33);
    print "<br>$client<br>";

    
    $rows = $clientRepo->add($c1);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";
    $client = $clientRepo->getByIdent(101);
    print "<br>$client<br>";

    
    $c1->setProvincia("Tarragona");
    $c1->setPoblacio("Tortosa");
    $rows = $clientRepo->update($c1);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";
    $client = $clientRepo->getByIdent(101);
    print "<br>$client<br>";

    
    $clientRepo->delete(101);
    print "<br>-------ROWS AFFECTEDS : $rows --------------<br>";
    $client = $clientRepo->getByIdent(101);
    print "<br>$client<br>";
    
} catch (ServiceException $e) {
    print "Error de Servei: " . $e->getMessage();
}
