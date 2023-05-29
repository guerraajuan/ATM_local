<p style="color:red;">SE IMPRIME DETALLE DE CONSULTA DE SALDO DE LOS SIGUIENTES DATOS</br></p>
<?php
    
    $from = $_REQUEST["from"];
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $avance = '';
    $super = '';
    
    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"]; 
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"]; 
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"]; 
    if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"]; 
    if(isset($_REQUEST["super"])) $super = $_REQUEST["super"]; 

    if($from == 'SALDOCMR') $from = 'PERFILACIONCMROK';

    echo '<b>RUT:</b> '.$rut.'</br>';
    echo '<b>DV:</b> '.$dv.'</br>';
    echo '<b>TARJETA CMR:</b> '.$tarjeta.'</br>';
    echo '<b>DISPONIBLE EN AVANCE:</b> $'.number_format(intval($avance), 0, ",", ".").'</br>';
    echo '<b>DISPONIBLE EN SUPER AVANCE:</b> $'.number_format(intval($super), 0, ",", ".").'</br>';
  
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">OPERACION REALIZADA</h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>

        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">¿DESEA OTRA OPERACION?</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:otra_Operacion();">SI</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?">NO</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="PERFILACIONCMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
</from>

<script>
    function otra_Operacion(){
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="PERFILACIONCMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth; 
    }
</script>