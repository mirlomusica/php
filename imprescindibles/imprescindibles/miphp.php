<?php
$caja1=$_POST['caja1'];
$caja2=$_POST['caja2'];
$select1=$_POST['select1'];
//echo "esto viene de php ".$campo1;
$respuesta=[
            "OK" =>true,
            "mensaje" => "Datos recibidos",
            "DATOS" => [
                    "caja1" => $caja1,
                    "caja2" => $caja2,
                    "select1" => $select1

            ]
];
header('Content-Type=application/json');
echo json_encode($respuesta);



?>