<?php

include_once "conexion.php";


$data = array(
    "status" => "ok",
    "mensaje" => "datos recibidos",
    "items" => ["1","2","3"]
);

//agregar cabezera

header("Content-Type:application/json");

echo json_encode($data);
