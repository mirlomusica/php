<?php

function BooksByYear($filePath){
    $file = fopen($filePath, "r");
    while ( ($line = fgets($file) ) !== false) {
        print $line . "<br>";
}
}
