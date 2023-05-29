<?php
    $from = '';
    $rut = '';
    $dv = '';
    $tarjeta = '';
    $avance ='';
    $super ='';
    $nombre = '';
   

    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
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
    <input type="hidden" id="acc" name="acc" value="SUPER_AVANCE_CMR" />
    <input type="hidden" id="sel" name="sel" value="" />

    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="avance" name="avance" value="<?php echo $avance; ?>" />
    <input type="hidden" id="super" name="super" value="<?php echo $super; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
    <input type="hidden" id="monto" name="monto" value="" />

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

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) {
        $('#otro_monto').focus();
    });

	function limpiar(){
		$('#otro_monto').val('');
		$('#otro_monto').focus();
	}

	function get_otro_monto(){
        let monto = $('#otro_monto').val();
        

        if(parseInt(monto) < 100000){
            $('#otro_monto').val('');
            $('#otro_monto').focus();
            $("#div_work").html("EL MONTO DE CREDITO DE CONSUMO DEBE SER MAYOR O IGUAL A $ 100.000 ");
            $('#div_work').css('color', 'red');
        }
        else{
            $('#monto').val(monto);
            msjError = "No pudimos realizar lo solicitado";
            urlIn = "./srv/sistema.php";
            formalioID = "frm_4";
            srv="SUPER_AVANCE_CMR";
            var resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
            let cod = resp[2];
            let respuesta = resp[1];
            let cuotas;
            let cuotas_normal = new Map();
            let cuotas_diferido = new Map();
            console.log(respuesta);
            if(cod == 1){
                cuotas = respuesta['cuota'];
                for(let i = 0 ; i<cuotas.length; i++){
                    if(cuotas[i]['@attributes']['tipo'] == 'normal'){
                        let numero = cuotas[i]['numero'];
                        let monto = cuotas[i]['monto'];
                        cuotas_normal.set(numero, monto);         
                    }
                    else{
                        let numero = cuotas[i]['numero'];
                        let monto = cuotas[i]['monto'];
                        cuotas_diferido.set(numero, monto); 
                    }
                }
                for (let [key, value] of cuotas_normal) {
                    //console.log('cuota: '+ key + ' monto: ' + value);
                    $('#normal_'+key).val(value);
                }
                for (let [key, value] of cuotas_diferido) {
                    //console.log('cuota: '+ key + ' monto: ' + value);
                    $('#diferido_'+key).val(value);
                }

                $('#acc').val('SUPER_AVANCE_CUOTAS_CMR');
                $('#from').val('MONTOSSA');
                msjError = "No pudimos realizar lo solicitado";
                urlIn = "./srv/sistema.php";
                formalioID = "frm_4";
                srv="SUPER_AVANCE_CUOTAS_CMR";
                var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                console.log(pth);
                location.href = "index.php?"+pth; 
            }
            else{
                console.log('voy a mensaje de error');
                $('#acc').val('ESPERACMR');
                $('#from').val('ERRORSA');
                msjError = "No pudimos realizar lo solicitado";
                urlIn = "./srv/sistema.php";
                formalioID = "frm_4";
                srv="ESPERACMR";
                var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                console.log(pth);
                location.href = "index.php?"+pth; 

            }
            
        }






	}

	

</script>