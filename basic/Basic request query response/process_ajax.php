<?php

  echo "This is the PHP page<br>";

  $names[] = "Anu";
  $names[] = "Raja";
  $names[] = "Ragav";
  $names[] = "Roja";

  $c = 1;

 foreach ($names as $name)

 {
     if ($_REQUEST['var1'] == $name)
     {
        echo $c ." " .$name . " is the important name<br><br>";

     }
     else {
        echo $c . " " . $name . "<br>";
     }
    $c++;
 }
 if (isset($_REQUEST ['var2']))
{
    if ($_REQUEST['var2'] == '')
    {
        echo "We have an empty variable so we&apos;re unable to show you the result.";
    }
    else {
        echo "We have some " .$_REQUEST ['var2'].". We will eat them";
    }
}
else {
   echo "Note: Something is more there but not visible because of a variable inside it, which is actually not declared any where.";
}

?>