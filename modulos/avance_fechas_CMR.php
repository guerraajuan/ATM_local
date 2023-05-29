<?php

    $from = $_REQUEST["from"];
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $avance = '';
    $super = '';
    $monto = '';
    $cuotas = '';
    

    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"]; 
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"]; 
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"]; 
    if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"]; 
    if(isset($_REQUEST["super"])) $super = $_REQUEST["super"]; 
    if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"]; 
    if(isset($_REQUEST["cuotas"])) $cuotas = $_REQUEST["cuotas"]; 
    //echo $tarjeta;

    $hoy = date("d-m-Y");
    $fecha_1 = strtotime($hoy."+ 1  months");
    $fecha_2 = strtotime($hoy."+ 2  months");
    $fecha_3 = strtotime($hoy."+ 3  months");
    $fecha_4 = strtotime($hoy."+ 4  months");
    $procentaje_1 = 8.072;
    $procentaje_2 = 11.404;
    $procentaje_3 = 14.736;
    $procentaje_4 = 18.064;

    $cuota_sin = intval($monto) / intval($cuotas);
    $couta_1= ($cuota_sin * $procentaje_1 )/ 100;
    $couta_1 = $couta_1 + $cuota_sin;

    $couta_2= ($cuota_sin * $procentaje_2 )/ 100;
    $couta_2 = $couta_2 + $cuota_sin;

    $couta_3= ($cuota_sin * $procentaje_3)/ 100;
    $couta_3 = $couta_3 + $cuota_sin;

    $couta_4= ($cuota_sin * $procentaje_4)/ 100;
    $couta_4 = $couta_4 + $cuota_sin;


?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:20px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">¿CUANDO LE GUSTARIA
                    </br>COMENZAR A PAGAR?
                    </br>MONTO: $ <?php echo number_format(intval($monto), 0, ",", "."); ?>
                    </br><?php echo intval($cuotas); ?> CUOTAS DE
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a id="boton1" onclick="javascript:get_data(1);"  fecha1 = "<?php echo date("d/m/Y",$fecha_1); ?>" monto1 = "<?php echo intval($couta_1); ?>" ><?php echo date("d/m/Y",$fecha_1); ?>
                     </br>$  <?php echo number_format(intval($couta_1), 0, ",", "."); ?> </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" >
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" >#</br>#</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a id="boton2" onclick="javascript:get_data(2);" fecha2 = "<?php echo date("d/m/Y",$fecha_2); ?>" monto2 = "<?php echo intval($couta_2); ?>" ><?php echo date("d/m/Y",$fecha_2); ?>
                     </br>$  <?php echo number_format(intval($couta_2), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" >
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" >#</br>#</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
        <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a id="boton3" onclick="javascript:get_data(3);" fecha3 = "<?php echo date("d/m/Y",$fecha_3); ?>" monto3 = "<?php echo intval($couta_3); ?>" ><?php echo date("d/m/Y",$fecha_3); ?> 
                    </br>$  <?php echo number_format(intval($couta_3), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center"  >
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" >#</br>#</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-left">
                    <a id="boton4" onclick="javascript:get_data(4);"  fecha4 = "<?php echo date("d/m/Y",$fecha_4); ?>" monto4 = "<?php echo intval($couta_4); ?>" ><?php echo date("d/m/Y",$fecha_4); ?>
                 </br>$  <?php echo number_format(intval($couta_4), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=avance_cuotas_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto); ?>">VOLVER</br><span style="color:white;">#</span></a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="AVANCE_FECHAS_CMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="cuotas" name="cuotas" value="<?php echo $cuotas; ?>" />
    <input type="hidden" id="fecha" name="fecha" value="" />
    <input type="hidden" id="valorcuota" name="valorcuota" value="" />
</from>

<script>
    function volver(){
        window.history.back();
    }
    function get_data(pos){
        fec =  $('#boton'+pos).attr('fecha'+pos);
        cuota =  $('#boton'+pos).attr('monto'+pos);
        //console.log(fec);
        console.log(cuota);
        $('#fecha').val(fec);
        $('#valorcuota').val(cuota);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="AVANCE_FECHAS_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth;   
    }

</script>
