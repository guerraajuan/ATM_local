<?php
if(isset($_REQUEST["from"]))
{
    $from = $_REQUEST["from"];
}
$msj='';
if(isset($_REQUEST["msj"]))
{
    $msj = $_REQUEST["msj"];
}
/*echo $from;
echo $msj;*/
$div_work = ' <span id="div_work" style="color:red;">'.$msj.'</span>';

?>
<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">DIGITE SU RUT SI TERMINA EN K INGRESE UN 0 </br><span class="subtit">(Sin puntos ni guión y con diígito verificador Ejemplo: 12345678)</span></h3>
                <?php if($msj != '') echo $div_work; ?>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="number" maxlength="9"  aria-required="true"  value=""  name="rut" id="rut" class="form-control text-center" placeholder="RUT Usuario">
				</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">PARA CONFIRMAR PRESIONE LA TECLA 'ANOTACIÓN'</h4>
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">SI SE EQUIVOCA PRESIONE LA TECLA 'BORRAR'</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:huella_rut();">ANOTACIÓN</a>
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
    <form name="frm_4" id="frm_4" >
        <input type="hidden" id="acc" name="acc" value="RUTHUELLA" />
        <input type="hidden" id="sel" name="sel" value="" />
        <input type="hidden" id="rut_param" name="rut_param" value="" />
        <input type="hidden" id="dv" name="dv" value="" />
        <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    </from>
    
</table>

<script type="text/javascript">

document.addEventListener("DOMContentLoaded", function(event) {
    $('#rut').focus();
});

	function limpiar(){
		$('#rut').val('');
		$('#rut').focus();
	}

    function huella_rut(){
        let rut = $('#rut').val();
		let dv = rut.substr(-1);
		rut = rut.slice(0, -1);
        let from = $('#from').val();
        $('#rut_param').val(rut);
        $('#dv').val(dv);
        $('#from').val(from);

        if(rut != ''){
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="RUT_HUELLA";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;
        }
        else{
            $("#div_work").html("DEBE INGRESAR UN RUT VÁLIDO");
            $('#div_work').css('color', 'red');
        }

	}

	

	

</script>

