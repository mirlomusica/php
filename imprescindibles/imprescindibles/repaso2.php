<?php
$caja1=$_POST['caja1'];
$caja2=$_POST['caja2'];

$array=[
    "propiedad1" => $caja1,
    "propiedad2" => $caja2,
    "info" => "Fin del mensaje"
];


echo json_encode($array);
?>