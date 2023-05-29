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
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR INGRESE EL MONTO </br> QUE DESEA RETIRAR </h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="number" aria-required="true"   value=""  name="otro_monto" id="otro_monto" class="form-control text-center" placeholder="Ingrese Monto">
				</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">¿ESTÁ CORRECTO?</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:get_otro_monto();">SI</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:limpiar();">NO</a>
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

<script type="text/javascript">



	function limpiar(){
		$('#otro_monto').val('');
		$('#otro_monto').focus();
	}

	function get_otro_monto(){
        let monto = $('#otro_monto').val();
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