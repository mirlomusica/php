<?php

require_once "conexion.php";

header ("Content-Type : application/text");

$usuari = $_POST["nom"];
$contrassenya = $_POST["contrassenya"];


$sql = "SELECT * FROM usuarios WHERE nomUsuari='$usuari' and contrassenya='$contrassenya'";
$result = $conn->query($sql);