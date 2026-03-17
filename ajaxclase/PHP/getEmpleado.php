<?php
// Incluimos los datos de conexión PDO
include_once 'conexion.php'; // Asegúrate de tener este archivo con la conexión

// Verificar que los datos llegaron por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Recoger los valores del formulario
    $id = $_POST['id']; // Corregido: antes era 'cajanombre'

    // Encriptar la contraseña (recomendado por seguridad)
    //$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // SQL con parámetros nombrados (:nom, :email, :contrasena)
    $sql = "SELECT * FROM empleados WHERE idempleado=:id";

    try {
        // Preparar la consulta
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);

        // Ejecutar la consulta
        $stmt->execute();
        $empleado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($empleado)

    } catch (PDOException $e) {
        echo "Error al pillar el usuario: " . $e->getMessage();
    }

} else {
    echo "No se recibieron datos por POST";
}