<?php

function printArray($array){
    print "$array[0]";
    for($i = 1; $i< count($array);$i++){
        print ", $array[$i]";
    }
}
function printDetailsArray($array){
    print "$array[0]";
    for($i = 1; $i< count($array);$i++){
        if ($array[$i] < PHP_INT_MAX) {
            print ", ($i):$array[$i]";
        } else {
            //return;
            $i = count($array);
        }
    }
    
    
}
