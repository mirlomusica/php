<?php

include_once "../../model/examples/Paginator.php";
//Mostrar 10 primeras lineas del fichero

$lines = 10;
$filename = "../../llibres.csv";
$paginador = new Paginator($filename, $lines);
$paginador->setLines($lines);

$data =$paginador->getData();
var_dump($data);

echo "<br><br>";
$data =$paginador->getData();
var_dump($data);

echo "<br><br>";
$paginador->setLines(20);
$data =$paginador->getData();
var_dump($data);
