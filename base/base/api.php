<?php
require_once 'conexion.php';

$operacion = $_POST['operacion'] ?? $_GET['operacion'] ?? '';

switch($operacion) {
    case 'obtener':
        $stmt = $conexion->query("SELECT * FROM tabla1 ORDER BY campo1");
        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($registros);
        break;
        
    case 'insertar':
        $campo2 = $_POST['campo2'] ?? '';//si no existe el valor lo deja vacío, operador NULL
        $campo3 = $_POST['campo3'] ?? '';
        
        $stmt = $conexion->prepare("INSERT INTO tabla1 (campo2, campo3) VALUES (:campo2, :campo3)");
        $stmt->bindParam(':campo2', $campo2);
        $stmt->bindParam(':campo3', $campo3);
        $resultado = $stmt->execute();
        
        echo json_encode(['success' => $resultado]);
        break;
        
    case 'actualizar':
        $campo1 = $_POST['campo1'] ?? '';
        $campo2 = $_POST['campo2'] ?? '';
        $campo3 = $_POST['campo3'] ?? '';
        
        $stmt = $conexion->prepare("UPDATE tabla1 SET campo2 = :campo2, campo3 = :campo3 WHERE campo1 = :campo1");
        $stmt->bindParam(':campo1', $campo1);
        $stmt->bindParam(':campo2', $campo2);
        $stmt->bindParam(':campo3', $campo3);
        $resultado = $stmt->execute();
        
        echo json_encode(['success' => $resultado]);
        break;
        
    case 'borrar':
        $campo1 = $_POST['campo1'] ?? '';
        
        $stmt = $conexion->prepare("DELETE FROM tabla1 WHERE campo1 = :campo1");
        $stmt->bindParam(':campo1', $campo1);
        $resultado = $stmt->execute();
        
        echo json_encode(['success' => $resultado]);
        break;
        
    default:
        echo json_encode(['error' => 'Operación no válida']);
}
?>