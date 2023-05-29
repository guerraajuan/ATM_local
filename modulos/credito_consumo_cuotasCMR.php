
<?php

    $from = '';
    $rut = '';
    $dv = '';
    $tarjeta = '';
    $nombre = '';
    $avance = '';
    $super = '';
    $monto = '';

    $normal_12 = '';
    $normal_15 = '';
    $normal_18 = '';
    $normal_24 = '';
    $normal_36 = '';
    $normal_48 = '';

    $diferido_12 = '';
    $diferido_15 = '';
    $diferido_18 = '';
    $diferido_24 = '';
    $diferido_36 = '';
    $diferido_48 = '';

    $tipo_cuotas = '';

    $monto_12 = '';
    $monto_15 = '';
    $monto_18 = '';
    $monto_24 = '';
    $monto_36 = '';
    $monto_48 = '';

    $atm_sel ='';

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
	if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
	if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"];
	if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"];
	if(isset($_REQUEST["super"])) $super = $_REQUEST["super"];
	if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];

	if(isset($_REQUEST["normal_12"])) $normal_12 = $_REQUEST["normal_12"];
	if(isset($_REQUEST["normal_15"])) $normal_15 = $_REQUEST["normal_15"];
	if(isset($_REQUEST["normal_18"])) $normal_18 = $_REQUEST["normal_18"];
	if(isset($_REQUEST["normal_24"])) $normal_24 = $_REQUEST["normal_24"];
	if(isset($_REQUEST["normal_36"])) $normal_36 = $_REQUEST["normal_36"];
	if(isset($_REQUEST["normal_48"])) $normal_48 = $_REQUEST["normal_48"];

	if(isset($_REQUEST["diferido_12"])) $diferido_12 = $_REQUEST["diferido_12"];
	if(isset($_REQUEST["diferido_15"])) $diferido_15 = $_REQUEST["diferido_15"];
	if(isset($_REQUEST["diferido_18"])) $diferido_18 = $_REQUEST["diferido_18"];
	if(isset($_REQUEST["diferido_24"])) $diferido_24 = $_REQUEST["diferido_24"];
	if(isset($_REQUEST["diferido_36"])) $diferido_36 = $_REQUEST["diferido_36"];
	if(isset($_REQUEST["diferido_48"])) $diferido_48 = $_REQUEST["diferido_48"];

    if (isset($_SESSION['atm_sel'])) $atm_sel = $_SESSION['atm_sel'];


    
    if($from == 'normal') {
        $tipo_cuotas = 'CUOTAS NORMALES';
        $tipo_cuotas_rev = 'CUOTAS DIFERIDAS';
        $monto_12 = $normal_12;
        $monto_15 = $normal_15;
        $monto_18 = $normal_18;
        $monto_24 = $normal_24;
        $monto_36 = $normal_36;
        $monto_48 = $normal_48;
        $from_otra_cuota = 'diferido';
    } 
    else{
        $tipo_cuotas_rev = 'CUOTAS NORMALES';
        $tipo_cuotas = 'CUOTAS DIFERIDAS';
        $monto_12 = $diferido_12;
        $monto_15 = $diferido_15;
        $monto_18 = $diferido_18;
        $monto_24 = $diferido_24;
        $monto_36 = $diferido_36;
        $monto_48 = $diferido_48;
        $from_otra_cuota = 'normal';
    }
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SELECCIONE CUOTA
                </br>MONTO A GIRAR: $ <?php echo number_format(intval($monto), 0, ",", "."); ?>
                </br><?php echo $tipo_cuotas ?>
            </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color2 text-left">
                        <a onclick="javascript:get_cuotas(12);" >12 CUOTAS </br>$ <?php echo number_format(intval($monto_12), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:get_cuotas(15);" >15 CUOTAS </br>$ <?php echo number_format(intval($monto_15), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left ">
                        <a onclick="javascript:get_cuotas(18);" >18 CUOTAS </br>$ <?php echo number_format(intval($monto_18), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:get_cuotas(24);" >24 CUOTAS </br>$ <?php echo number_format(intval($monto_24), 0, ",", "."); ?></a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-left">
                        <a onclick="javascript:get_cuotas(36);" >36 CUOTAS </br>$ <?php echo number_format(intval($monto_36), 0, ",", "."); ?></a>
                    </h4>
                </div></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_cuotas(48);" >48 CUOTAS </br>$ <?php echo number_format(intval($monto_48), 0, ",", "."); ?></a>
                    </h4>
                </div></td></td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center">
                    <h4 class="poppins hover-color3 text-left">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=credito_consumo_cuotasCMR&from='.$from_otra_cuota.'&rut='.$rut.'&dv='.$dv.'&tarjeta='.$tarjeta.'&nombre='.$nombre.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&normal_12='.$normal_12.'&normal_15='.$normal_15.'&normal_18='.$normal_18.'&normal_24='.$normal_24.'&normal_36='.$normal_36.'&normal_48='.$normal_48.'&diferido_12='.$diferido_12.'&diferido_15='.$diferido_15.'&diferido_18='.$diferido_18.'&diferido_24='.$diferido_24.'&diferido_36='.$diferido_36.'&diferido_48='.$diferido_48); ?>" ><?php echo $tipo_cuotas_rev ?></a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=credito_consumo_montosCMR&from=SACMR&rut='.$rut.'&dv='.$dv.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre ); ?>" >VOLVER </a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="ESPERACMR" />
    <input type="hidden" id="sel" name="sel" value="" />

    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="atm_sel" name="atm_sel" value="<?php echo $atm_sel; ?>" />
    <input type="hidden" id="paso" name="paso" value="1" />

    <input type="hidden" id="cuotas" name="cuotas" value="" />

    <input type="hidden" id="normal_12" name="normal_12" value="" />
    <input type="hidden" id="normal_15" name="normal_15" value="" />
    <input type="hidden" id="normal_18" name="normal_18" value="" />
    <input type="hidden" id="normal_24" name="normal_24" value="" />
    <input type="hidden" id="normal_36" name="normal_36" value="" />
    <input type="hidden" id="normal_48" name="normal_48" value="" />

    <input type="hidden" id="diferido_12" name="diferido_12" value="" />
    <input type="hidden" id="diferido_15" name="diferido_15" value="" />
    <input type="hidden" id="diferido_18" name="diferido_18" value="" />
    <input type="hidden" id="diferido_24" name="diferido_24" value="" />
    <input type="hidden" id="diferido_36" name="diferido_36" value="" />
    <input type="hidden" id="diferido_48" name="diferido_48" value="" />




</from>

<script>
    function get_cuotas(cant){

        let from = $('#from').val();
        let tipo;
        if(from == 'normal') tipo = 'N';
        else tipo = 'D';
        let cuotas = cant+tipo;
        $('#cuotas').val(cuotas);
        $('#from').val('SACMR');

        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="ESPERACMR";
        var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
        console.log(pth);
        location.href = "index.php?"+pth; 
 
          
    }

</script>



