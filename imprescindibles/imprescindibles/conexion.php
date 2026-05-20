<?php
// Datos de conexión
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "repaso";

// Intentar establecer la conexión
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // Establecer el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    // En producción, sería mejor loguear el error en lugar de mostrarlo
    error_log("Error de conexión: " . $e->getMessage());
    die("Error de conexión a la base de datos");
}
?>