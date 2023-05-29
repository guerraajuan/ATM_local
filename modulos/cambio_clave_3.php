
<p style="color:red;">Se realiza transaccion de cambio de clave </br></p>
<?php

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
    if(isset($_REQUEST["pass"])) $pass = $_REQUEST["pass"];

   
    echo '<b>RUT:</b> '.$rut.'</br>';
    echo '<b>DV:</b> '.$dv.'</br>';
    echo '<b>CUENTA:</b> '.$cta.'</br>';
    echo '<b>CODIGO CUENTA:</b> '.$co_cta.'</br>';
    echo '<b>CLAVE NUEVA:</b> '.$pass.'</br>';
  

?>

