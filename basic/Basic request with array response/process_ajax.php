<?php

    echo "This is the PHP page<br>";

    $names[] = "Deepa";
    $names[] = "Anu";
    $names[] = "Charu";
    $names[] = "Vinitha";
    

    $c = 1;

    foreach ($names as $name) 
    {
        echo $c . " " . $name . "<br>";

        $c++;
    }
?>