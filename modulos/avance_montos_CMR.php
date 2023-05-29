<?php

    $from = $_REQUEST["from"];
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $avance = '';
    $super = '';
    $nombre = '';

    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"]; 
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"]; 
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"]; 
    if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"]; 
    if(isset($_REQUEST["super"])) $super = $_REQUEST["super"];
    if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"];


?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SELECCIONE EL MONTO A RETIRAR
                    </br>MONTO DISPONIBLE: $ <?php echo number_format(intval($avance), 0, ",", "."); ?>
                    </br>MONTO MAXIMO POR GIRO: $ 800.000
                    </br>MONTO MINIMO POR GIRO: $ 5.000
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_monto(5000);" >$ 5.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(50000);">$ 50.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_monto(100000);">$ 100.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(150000);">$ 150.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
        <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a onclick="javascript:get_monto(180000);">$ 180.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(800000);">$ 800.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center">
                    <h4 class="poppins hover-color3 text-left">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=avance_otro_monto_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&nombre='.$nombre); ?>">OTRO MONTO</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:volver();">VOLVER</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="AVANCE_CMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
    <input type="hidden" id="monto" name="monto" value="" />
</from>

<script>
    function volver(){
        window.history.back();
    }
    function get_monto(monto){
        $('#monto').val(monto);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="AVANCE_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth;   
    }

</script>
