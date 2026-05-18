<?php

include_once "conexion.php";

$query = $conexion->query("Select * from pizza");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($res);
