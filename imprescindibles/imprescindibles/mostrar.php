<?php
include "conexion.php";
header('Content-Type:application/json');
//aquí debería ir un try and catch
$sql="SELECT idcampo,campo2,campo3 FROM tabla1 ORDER BY idcampo DESC";
$stmt=$conn->prepare($sql);
$stmt->execute();
$registros=$stmt->fetchAll(PDO::FETCH_ASSOC);
//no tenemos en cuenta el control de errores
echo json_encode($registros);


?>