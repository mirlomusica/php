<?php

include "model/FileFunctionsBooks.php";
include "model/ArrayFunctions.php";


$res = BooksByYear(2025,"./llibres.csv");

var_dump($res);
