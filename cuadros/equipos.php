<?php

include_once "conexion.php";

$query = $conexion->query("select * from equipos");

echo json_encode($query->fetchAll(PDO::FETCH_ASSOC));
