<?php
// Incluimos los datos de conexión PDO
include_once 'conexion.php'; // Asegúrate de tener este archivo con la conexión

// Verificar que los datos llegaron por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los valores del formulario
    $nombre = $_POST['nom']; // Corregido: antes era 'cajanombre'
    $email = $_POST['email'];
    $contrasena = $_POST['password'];

    // Encriptar la contraseña (recomendado por seguridad)
    //$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // SQL con parámetros nombrados (:nom, :email, :contrasena)
    $sql = "INSERT INTO usuarios (nomUsuari, email, contrassenya) VALUES (:nom, :email, :contrasena)";

    try {
        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':nom', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();

        echo "Usuario insertado correctamente. ID: " . $conn->lastInsertId();

    } catch (PDOException $e) {
        echo "Error al insertar: " . $e->getMessage();
    }

} else {
    echo "No se recibieron datos por POST";
}
?>