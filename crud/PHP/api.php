<?php

require_once 'conexion.php';

$method = $_SERVER["REQUEST_METHOD"];

$operacion = $_POST['operacion'] ?? $_GET['operacion'] ?? '';

if ($method == "GET") {


    if (isset($_GET["id"])) {

        $id = $_GET["id"];
        $stmt = $conexion->prepare("SELECT * FROM socis WHERE socis.id = :id ");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $registro = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($registro);

    } else {
        $stmt = $conexion->query("SELECT * FROM socis");
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($registros);
    }
}
