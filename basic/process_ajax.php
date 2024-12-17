<?php

  echo "This is the PHP page<br>";

  $names[] = "Anu";
  $names[] = "Raja";
  $names[] = "Ragav";
  $names[] = "Roja";

  $c = 1;

 foreach ($names as $name)

 {
    echo $c . " " . $name . "<br>";

    $c++;

  }

?>