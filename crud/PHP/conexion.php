<?php
// Conexión PDO simple para localhost
try {
    $host = 'localhost';
    $dbname = 'gimdb';
    $username = 'root';
    $password = '';
    
    $conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>
