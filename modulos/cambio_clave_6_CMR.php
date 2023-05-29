
<p style="color:red;">supero limite de intentos de cambio de clave, bloquear tarjeta</br></p>
<?php

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
  
    
    echo '<b>RUT:</b> '.$rut.'</br>';
    echo '<b>DV:</b> '.$dv.'</br>';
    echo '<b>tarjeta:</b> '.$tarjeta.'</br>';
   
   
  

?>

