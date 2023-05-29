<?php

    $from = $_REQUEST["from"];
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $avance = '';
    $super = '';
    $monto = '';
    $nombre = '';

    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"]; 
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"]; 
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"]; 
    if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"]; 
    if(isset($_REQUEST["super"])) $super = $_REQUEST["super"]; 
    if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"]; 
    if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"]; 
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SELECCIONE CUOTA
                    </br>MONTO A GIRAR: $ <?php echo number_format(intval($monto), 0, ",", "."); ?>
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_cuotas(03);" >3</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_cuotas(04);">4</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_cuotas(06);">6</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_cuotas(08);">8</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
        <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a onclick="javascript:get_cuotas(10);">10</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_cuotas(12);">12</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center">
                    <h4 class="poppins hover-color3 text-left">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=avance_otra_cuota_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&nombre='.$nombre); ?>">OTRO CUOTA</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=avance_montos_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super); ?>">VOLVER</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="AVANCE_CUOTAS_CMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
    <input type="hidden" id="cuotas" name="cuotas" value="" />
</from>

<script>
    function volver(){
        window.history.back();
    }
    function get_cuotas(cuotas){
        $('#cuotas').val(cuotas);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="AVANCE_CUOTAS_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth;   
    }

</script>
