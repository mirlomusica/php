<?php
header('Content-Type: application/json');

include 'conexion.php';

$sql = "SELECT id, nom_usuari, contrassenya FROM usuaris "; // cambia tabla/campos si quieres
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
