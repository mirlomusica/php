<?php

include_once "conexion.php";

$query = $conexion->query("select * from comunitats");
$output = "";
while ($fila = $query->fetch(PDO::FETCH_ASSOC)) {
    $output .= "<option value='" . $fila["id_com"] . "'>" . $fila["comunitat"] . "</option>";

}
echo $output;