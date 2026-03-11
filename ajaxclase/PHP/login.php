<?php
require_once 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['nom'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($usuario) && !empty($password)) {

        try {
            $sql = "SELECT * FROM usuarios WHERE nomUsuari = '$usuario' AND contrassenya = '$password'";
            $result = $conn->query($sql);

            if ($result->rowCount() > 0) {
                header('Location: ../mostrar.html');
                exit();
            } else {
                echo " Usuario o contraseña incorrectos";
            }

        } catch (PDOException $e) {
            echo " Error: " . $e->getMessage();
        }

    } else {
        echo " Complete todos los campos";
    }
} else {
    echo " Acceso no permitido";
}
?>