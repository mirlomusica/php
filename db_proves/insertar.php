<?php
header('Content-Type: application/json');

include 'conexion.php';

$user= filter_input(INPUT_POST, "name");
$password= filter_input(INPUT_POST, "password");


$sql = "INSERT INTO usuaris (nom_usuari, contrassenya) VALUES ('$user', '$password')"; // cambia tabla/campos si quieres
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
