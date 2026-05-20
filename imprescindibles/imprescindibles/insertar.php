<?php
include "conexion.php";
$campo2=$_POST['campo2'] ?? '';
$campo3=$_POST['campo3'];
$sql="INSERT INTO tabla1 (campo2,campo3) VALUES(:campo2,:campo3)";
$stmt = $conn->prepare($sql);
//enlazar parámetros (bindparam)
$stmt->bindParam(':campo2',$campo2,PDO::PARAM_STR);
$stmt->bindParam(':campo3',$campo3,PDO::PARAM_STR);
// Ejecutamos la consulta
$stmt->execute();
echo "se ha insertado correctamente, mensaje de php";

//mejorar con try and catch
?>