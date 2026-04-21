<?php
    $array = [1, 2, 3, 4, 5, 6];
    $bugnumber = $array[0];
    for($i = 0; $i<5; $i ++){
        if($array[$i]<$array[$i+1]){
            $bugnumber = $array[$i+1];
        }
    }

    echo $bugnumber;

?>