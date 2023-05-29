
<p style="color:red;">supero limite de intentos de cambio de clave, bloquear tarjeta de cuenta</br></p>
<?php

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
 

   
    echo '<b>RUT:</b> '.$rut.'</br>';
    echo '<b>DV:</b> '.$dv.'</br>';
    echo '<b>CUENTA:</b> '.$cta.'</br>';
    echo '<b>CODIGO CUENTA:</b> '.$co_cta.'</br>';
   
  

?>

