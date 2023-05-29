<?php
    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $tarjeta = $_REQUEST["tarjeta"];
    $pass_actual = $_REQUEST["pass_actual"];
    $pass_1= $_REQUEST["pass_1"];
    $intentos = 0;
    if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];

?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">PARA VALIDAR SU NUEVO NUMERO SECRETO INGRESELO NUEVAMENTE</h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="password" aria-required="true"   minlength="4" maxlength="4" name="clave" id="clave" class="form-control text-center" placeholder="Ingrese Nueva Clave">
				</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">PARA CONFIRMAR PRESIONE 'CONFIRMAR'</h4>
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">SI SE EQUIVOCA PRESINE LA TECLA 'BORRAR'</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:get_pass();">CONFIRMAR</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:limpiar();">BORRAR</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="CAMBIO_CLAVE_CMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="pass_actual" name="pass_actual" value="<?php echo $pass_actual; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" /> 
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="intentos" name="intentos" value="<?php echo $intentos; ?>" />
    <input type="hidden" id="pass_1" name="pass_1" value="<?php echo $pass_1; ?>" />
    <input type="hidden" id="paso" name="paso" value="3" />
    <input type="hidden" id="pass_2" name="pass_2" value="" />
</from>

<script type="text/javascript">



	function limpiar(){
		$('#clave').val('');
		$('#clave').focus();
	}

	function get_pass(){
        let pass2 = $('#clave').val();
        $('#pass_2').val(pass2);
        console.log(pass2);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="CAMBIO_CLAVE_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth;  
	}

	

</script>
