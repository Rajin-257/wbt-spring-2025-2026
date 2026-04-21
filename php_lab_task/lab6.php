<?php
    $array = [30,20,10,30,20];
    $key = 10;

    for($i = 0 ; $i <5 ; $i++){
        if($array[$i] == $key){
            echo "Found On" . $i;
        }
    }
?>