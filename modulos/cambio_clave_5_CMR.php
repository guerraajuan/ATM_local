
<p style="color:red;">Se realiza transaccion de cambio de clave </br></p>
<?php

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
    if(isset($_REQUEST["pass_actual"])) $pass_actual = $_REQUEST["pass_actual"];
    if(isset($_REQUEST["pass_1"])) $pass_1 = $_REQUEST["pass_1"];

   
    echo '<b>RUT:</b> '.$rut.'</br>';
    echo '<b>DV:</b> '.$dv.'</br>';
    echo '<b>tarjeta:</b> '.$tarjeta.'</br>';
    echo '<b>CLAVE ACTUAL:</b> '.$pass_actual.'</br>';
    echo '<b>CLAVE NUEVA:</b> '.$pass_1.'</br>';
  

?>

