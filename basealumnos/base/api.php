<?php
require_once 'conexion.php';

$operacion = $_POST['operacion'] ?? $_GET['operacion'] ?? '';

switch ($operacion) {
    case 'obtener':
        $stmt = $conexion->query("SELECT * FROM alumnos ORDER BY IDALUMNO");
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($registros);
        break;

    case 'insertar':
        $NOMBRE = $_POST['NOMBRE'] ?? '';//si no existe el valor lo deja vacío, operador NULL
        $APELLIDOS = $_POST['APELLIDOS'] ?? '';

        $stmt = $conexion->prepare("INSERT INTO alumnos (NOMBRE, APELLIDOS) VALUES (:NOMBRE, :APELLIDOS)");
        $stmt->bindParam(':NOMBRE', $NOMBRE);
        $stmt->bindParam(':APELLIDOS', $APELLIDOS);
        $resultado = $stmt->execute();

        echo json_encode(['success' => $resultado]);
        break;

    case 'actualizar':
        $IDALUMNO = $_POST['IDALUMNO'] ?? '';
        $NOMBRE = $_POST['NOMBRE'] ?? '';
        $APELLIDOS = $_POST['APELLIDOS'] ?? '';

        $stmt = $conexion->prepare("UPDATE alumnos SET NOMBRE = :NOMBRE, APELLIDOS = :APELLIDOS WHERE IDALUMNO = :IDALUMNO");
        $stmt->bindParam(':IDALUMNO', $IDALUMNO);
        $stmt->bindParam(':NOMBRE', $NOMBRE);
        $stmt->bindParam(':APELLIDOS', $APELLIDOS);
        $resultado = $stmt->execute();

        echo json_encode(['success' => $resultado]);
        break;

    case 'borrar':
        $IDALUMNO = $_POST['IDALUMNO'] ?? '';

        $stmt = $conexion->prepare("DELETE FROM alumnos WHERE IDALUMNO = :IDALUMNO");
        $stmt->bindParam(':IDALUMNO', $IDALUMNO);
        $resultado = $stmt->execute();

        echo json_encode(['success' => $resultado]);
        break;

    default:
        echo json_encode(['error' => 'Operación no válida']);
}
?>
