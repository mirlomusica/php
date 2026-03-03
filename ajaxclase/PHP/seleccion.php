<?php
header('Content-Type: application/json');

include 'conexion.php';

$sql = "SELECT * FROM empleados "; // cambia tabla/campos si quieres
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
