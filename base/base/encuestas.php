<?php


include_once "conexion.php";

$query = $conexion->query("select * FROM encuesta");

echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
