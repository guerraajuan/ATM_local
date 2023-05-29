<?php
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $tarjeta = $_REQUEST["tarjeta"];
    $avance = $_REQUEST["avance"];
    $super = $_REQUEST["super"];
    // echo $rut;
    // echo '</br>';
    // echo $dv;
    // echo '</br>';
    // echo $tarjeta;
    // echo '</br>';
    // echo $avance;
    // echo '</br>';


  
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SR. CLIENTE:</br> POR SEGURIDAD ANTES DE </br> CAMBIAR SU NUMERO SECRETO</br>REINGRESE SU NUMERO ACTUAL</h3>
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
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">AL COMPLETAR  PRESIONE 'CONFIRMAR'</h4>
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">SI DESEA ANULAR EL CAMBIO PRESIONE LA TECLA 'CANCELAR'</h4>
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
                    <a href="index.php?<?php echo util::encodeParamURL('pth=menu_CMR&from=PERFILACIONCMROK&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&tarjeta='.$tarjeta); ?>">CANCELAR</a>
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
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="pass_actual" name="pass_actual" value="" />
    <input type="hidden" id="paso" name="paso" value="1" />

</from>

<script type="text/javascript">

	function get_pass(){
        let pass = $('#clave').val();
        if(pass.length === 4){
            $('#pass_actual').val(pass);
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="CAMBIO_CLAVE_CMR";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;  
        }
        else{
		    $('#clave').focus();
            $("#div_work").html("DEBE INGRESAR SU NUMERO ALCTUAL");
            $('#div_work').css('color', 'red');
            $('#clave').val('');
            $('#clave').focus();
        }
	}

	

</script>
