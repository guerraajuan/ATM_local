<?php
    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    $intentos = $_REQUEST["intentos"];
  
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:10px;" colspan="2"  >
                <h3 class="poppins" style="color:#3c763d;">EL NUMERO SECRETO QUE ACABA DE INGRESAR ES INCORRECTO, POR FAVOR INTENTELO NUEVAMENTE</h3>
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
        <tr>
            <td colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">RECUERDE QUE AL TERCER INTENTO ERRONEO SU TARJETA SERA BLOQUEADA</h3>
            </td>

        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="CAMBIO_CLAVE" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>" />
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" /> 
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="pass" name="pass" value="" />
    <input type="hidden" id="paso" name="paso" value="1" />
    <input type="hidden" id="intentos" name="intentos" value="<?php echo $intentos; ?>"/>
</from>

<script type="text/javascript">



	function limpiar(){
		$('#clave').val('');
		$('#clave').focus();
	}

	function get_pass(){
        let pass = $('#clave').val();
        if(pass.length === 4){
            $('#pass').val(pass);
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="CAMBIO_CLAVE";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;  
        }
        else{
		    $('#clave').focus();
            $("#div_work").html("DEBE INGRESAR 4 DIGITOS");
            $('#div_work').css('color', 'red');
        }
	}

	

</script>
