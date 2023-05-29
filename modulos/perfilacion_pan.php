<?php

/*
if(isset($_REQUEST["from"]))
{
    $from = $_REQUEST["from"];
}
echo $from;*/

?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">INGRESE NUMERO DE LA TARJETA </br><span class="subtit">(16 dígitos Ejemplo: xxxx xxxx xxxx xxxx ó xxxxxxxxxxxxxxxx)</span></h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="text" aria-required="true"  minlength="19" maxlength="19"  name="pan" id="pan" class="form-control text-center" placeholder="TARJETA" onkeypress='return validaNumericos(event)'>
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
                        <a  onclick="javascript:go_to_clave();">SI</a>
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
<form name="frm_4" id="frm_4"   >
    <input type="hidden" id="acc" name="acc" value="CLAVEPERFILACIONPAN" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="" />
    <input type="hidden" id="from" name="from" value="PERFILACION-PAN" />

</from>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#pan').focus();
    });

    document.getElementById('pan').addEventListener('paste', interceptarPegado);

    function interceptarPegado(ev) {
        let tarjeta = ev.clipboardData.getData('text/plain');
        let espacios = 0;
        let tar_final = '';
        if(tarjeta.length<= 17){
            for(i=0; i<tarjeta.length; i++){
            if(espacios == 4){
                char_add = ' '+tarjeta[i];
                espacios = 0;
            }
            else{
                char_add = tarjeta[i];
                
            }
            espacios ++; 
            tar_final += char_add;
            };
            $('#pan').val(tar_final);
        }
        else{
            $('#pan').val(tarjeta);
        }
    }

	function limpiar(){
		$('#pan').val('');
		$('#pan').focus();
	}

    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
            let  pan = $('#pan').val()
            let largo = pan.length;
            if(largo == 4 || largo == 9 || largo == 14){
                $('#pan').val(pan+' ');
            }
            return true;
        }
        return false;        
    }

    function go_to_clave(){
        pan = $('#pan').val();
        if(pan.length >= 16 && pan.length <=21){
            $('#tarjeta').val(pan);
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="CLAVEPERFILACIONPAN";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;  

        }
        else{
            $("#div_work").html("INGRESE UN NUMERO DE TARJETA VALIDO");
            $('#div_work').css('color', 'red');
            $('#pan').val('');
		    $('#pan').focus();
        }

       
    }

	

	

</script>