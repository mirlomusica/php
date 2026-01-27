<?php

session_start();    //COMENZAMOS A TRABAJAR CON VARIABLES DE SESION

$input = filter_input(INPUT_POST, "input");

if($input == 12){
    $_SESSION["output"] = true;
    setcookie('output', "1", 0, '/', 'localhost');
}else{
    $_SESSION["output"] = false;
    setcookie('output', "0", 0, '/', 'localhost');
}

print $input;


header('location: ../prova.php');


