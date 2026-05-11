<?php

include_once "conexion.php";

$id = filter_input(INPUT_POST, "id");

$query = $conexion->prepare("SELECT * FROM encuesta WHERE codigo=:id");
$query->execute([":id"=>$id]);
$resp = $query->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resp);
