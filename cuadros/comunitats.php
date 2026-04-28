<?php

header("content-type=text;");

include_once "conexion.php";

$query = $conexion->query("select * from comunitats;");
$res = $query->execute();
echo json_encode($query->fetchAll());