<?php
$host = 'localhost';
$dbname = 'Users';
$username = 'root';
$password = '';

/** @var PDO $conn */
$conn = null;

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar el juego de caracteres a UTF-8
    $conn->exec("SET NAMES 'utf8'");
    
    // Mensaje opcional para confirmar conexión (solo desarrollo)
    // echo "Conexión exitosa";
    
} catch(PDOException $e) {
    // En producción, registrar en log en lugar de mostrar
    die("Error de conexión: " . $e->getMessage());
}

// Para usar en otros archivos, puedes retornar o almacenar $conn
// return $conn; // si es un include
?>
