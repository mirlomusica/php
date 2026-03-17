<?php

header("Content-Type: text/html; charset-UTF-8");

include_once(__DIR__ . "/conexion.php");

try {
    $stmt = $conn->prepare("SELECT * FROM empleados");
    $stmt->execute();
    $empleados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($empleados);



} catch (PDOException $e) {
    echo "<p>Error" . e->getMessage() . "</p>";
}