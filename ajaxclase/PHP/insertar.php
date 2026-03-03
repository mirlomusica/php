<?php
header('Content-Type: application/json');

include 'conexion.php';

$user= filter_input(INPUT_POST, "nom");
$email= filter_input(INPUT_POST, "email");
$password= filter_input(INPUT_POST, "password");

if($_POST["nom"]=="" || $_POST["email"]=="" ||$_POST["password"]==""){
    echo json_encode("faltan campos");
    die();
}


$sql = "INSERT INTO usuarios (nomUsuari, contrassenya,email) VALUES ('$user', '$password','$email')"; // cambia tabla/campos si quieres
$stmt = $conn->prepare($sql);
$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
