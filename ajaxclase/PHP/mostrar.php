<?php

header("Content-Type: text/html; charset-UTF-8");

include_once(__DIR__ . "/conexion.php");

try {
    $stmt = $conn->prepare("SELECT * FROM usuarios");
    $stmt->execute();
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table><tr><th>Id</th><th>Nombre</th><th>Mail</th><th>Password</th>";
    foreach ($usuarios as $usuario) {
        echo "<tr>";
        echo "<td>";
        echo $usuario["idUsuari"];
        echo "</td>";
        echo "<td>";
        echo $usuario["nomUsuari"];
        echo "</td>";
        echo "<td>";
        echo $usuario["email"];
        echo "</td>";
        echo "<td>";
        echo $usuario["contrassenya"];
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";



} catch (PDOException $e) {
    echo "<p>Error" . e->getMessage() . "</p>";
}