<?php
include "conexion.php";
$campo1=$_POST['cajaid'] ?? '';

$sql="DELETE FROM tabla1 WHERE idcampo=:campo1";
$stmt = $conn->prepare($sql);
//enlazar parámetros (bindparam)
$stmt->bindParam(':campo1',$campo1,PDO::PARAM_INT);

// Ejecutamos la consulta
$stmt->execute();
echo "se ha borrado correctamente, mensaje de php";

//mejorar con try and catch
?>