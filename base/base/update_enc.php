<?php

include_once "conexion.php";

$id = filter_input(INPUT_POST, "id");
$num = filter_input(INPUT_POST, "opcion");

switch ($num) {
    case 1:
        $query = $conexion->prepare("UPDATE encuesta  SET pregunta1=pregunta1+1 WHERE codigo=:id");
        break;

    case 2:
        $query = $conexion->prepare("UPDATE encuesta  SET pregunta2=pregunta2+1 WHERE codigo=:id");
        break;

    case 3:
        $query = $conexion->prepare("UPDATE encuesta  SET pregunta3=pregunta3+1 WHERE codigo=:id");
        break;

}
$query->execute([":id" => $id]);


$query = $conexion->prepare("SELECT * FROM encuesta WHERE codigo=:id");
$query->execute([":id" => $id]);
echo json_encode($query->fetch(PDO::FETCH_ASSOC));
