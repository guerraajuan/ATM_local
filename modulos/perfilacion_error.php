<?php
   	$from = isset($_REQUEST["from"]) ? $_REQUEST["from"] : '';
    $tipo_error = isset($_REQUEST["tipo_error"]) ? $_REQUEST["tipo_error"] : '';
    $mensaje ='';
    $goto = 'index.php?'.util::encodeParamURL('pth=ingreso_tarjeta&from='.$from); 
    
    switch ($tipo_error) {
        case "1":
            $mensaje ='Tarjeta Errónea';						
        break;
        case "2":
            $mensaje ='Tiempo de respuesta en servicio de perfilación superado';											
        break;
        case "3":
            $mensaje ='Error en servicio de perfilación';					
        break;
        case "4":
            $mensaje ='Datos incompletos en servicio de perfilación';					
        break;							
    }
  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"><?php echo $mensaje; ?></h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a href="<?php echo $goto; ?>">VOLVER A INGRESAR TARJETA</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?">INICIO</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="" />
    <input type="hidden" id="sel" name="sel" value="" />
</form>
