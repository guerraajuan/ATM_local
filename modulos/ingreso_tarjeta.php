<?php
    $from = isset($_REQUEST["from"]) ? $_REQUEST["from"] : '';
?>
<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:30px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">INGRESE NUMERO DE LA TARJETA</br><span class="subtit">(16 dígitos Ejemplo: xxxx xxxx xxxx xxxx ó xxxxxxxxxxxxxxxx)</span></h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="text" aria-required="true"  minlength="19" maxlength="19"  name="tarjetaIn" id="tarjetaIn" class="form-control text-center" placeholder="TARJETA" onkeypress='return validaNumericos(event)'>
				</div>
            </td>
        </tr>
        <tr>
            <td class="text-center" colspan="2">                
                <h3 class="poppins" style="color:#3c763d;">INGRESE DATOS DEL CHIP DE LA TARJETA </br><span class="subtit">(CVV-MM-AA)</span></h3>
            </td>
        </tr>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="text" aria-required="true"  minlength="19" maxlength="19"  name="chip" id="chip" class="form-control text-center" placeholder="CHIP" >
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
            <td style="width:50%;">
            <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-left">
                        <a  href="index.php">VOLVER</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:go_to_espera(event);">SI</a>
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
    <input type="hidden" id="acc" name="acc" value="" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tipo_error" name="tipo_error" value="" />

    <input type="hidden" id="rut" name="rut" value="" />
    <input type="hidden" id="dv" name="dv" value="" />
    <input type="hidden" id="super" name="super" value="" />
    <input type="hidden" id="avance" name="avance" value="" />
    <input type="hidden" id="nombre" name="nombre" value="" />
    <input type="hidden" id="cta" name="cta" value="" />
    <input type="hidden" id="n_cta" name="n_cta" value="" />

</form>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#tarjetaIn').focus();
       
    });

    /*============MANEJO PEGADO=======================*/
    //asignacion de funcion para manejar el pegado en input tarjertaIn
    document.getElementById('tarjetaIn').addEventListener('paste', interceptarPegado);
    //funcion para manejar el dato pegado en tarjetaIn
    function interceptarPegado(ev) {
        let tarjeta = ev.clipboardData.getData('text/plain');
        tarjeta = tarjeta.replace(/\s/g, '');
        
        let espacios = 0;
        let tar_final = '';
        if(tarjeta.length<= 17){
            for(i=0; i<tarjeta.length; i++){
            if(espacios === 4){
                char_add = ' '+tarjeta[i];
                espacios = 0;
            }
            else{
                char_add = tarjeta[i];
                
            }
            espacios ++; 
            tar_final += char_add;
            };
            $('#tarjetaIn').val(tar_final);
        }
        else{
            $('#tarjetaIn').val(tarjeta);
        }
    }
    /*============MANEJO PEGADO=======================*/

    /*============Limpiar input Tarjeta=======================*/
	function limpiar(){
		$('#tarjetaIn').val('');
		$('#tarjetaIn').focus();
	}
    /*============Limpiar input Tarjeta=======================*/


    /*============Valida solo numeros y agrega espacios=======================*/
    function validaNumericos(event) {
        if(event.charCode >= 48 && event.charCode <= 57){
            let  tarjetaIn = $('#tarjetaIn').val()
            let largo = tarjetaIn.length;
            if(largo == 4 || largo == 9 || largo == 14){
                $('#tarjetaIn').val(tarjetaIn+' ');
            }
            return true;
        }
        return false;        
    }
    /*============Valida solo numeros y agrega espacios=======================*/

    function go_to_espera(event){
        $("#overlay").show(); //abre div CARGANDO
        let tarjetaIn = $('#tarjetaIn').val();
        let from = $('#from').val();

        if(tarjetaIn.length === 19){

            if(from === 'CMR'){
                setTimeout(function() {
                    $('#tarjeta').val(tarjetaIn);
                    msjError = "No pudimos realizar lo solicitado";
                    urlIn = "./srv/sistema.php";
                    formalioID = "frm_4";
                    srv="PERF_CMR";
                    let resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                    let cod = resp[2];
                    let respuesta = resp[1];
                    let tipo_error = resp[3];
                    // console.log(cod); 
                    // console.log(respuesta); 
                    // console.log(tipo_error); 
                    //return false;

                    if(cod == 1){
                        if (respuesta.hasOwnProperty("productos")){
                            let cliente = respuesta['cliente'];
                            let producto = respuesta['productos']['producto'];
                            let rut = cliente['rut'];
                            let dv = cliente['dv'];
                            let disponible_avance = producto['disponible_avance'];
                            let disponible_super = producto['disponible_super'];
                            let nombre = cliente['nombre'];

                            $('#rut').val(rut);
                            $('#dv').val(dv);
                            $('#super').val(disponible_super);
                            $('#avance').val(disponible_avance);
                            $('#nombre').val(nombre);
                           
                            msjError = "No pudimos realizar lo solicitado";
                            urlIn = "./srv/sistema.php";
                            formalioID = "frm_4";
                            srv="PERF_CMR_OK";
                            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                            console.log(pth);
                            location.href = "index.php?"+pth; 
                        }
                        else{
                            $('#tipo_error').val(tipo_error);
                            msjError = "No pudimos realizar lo solicitado";
                            urlIn = "./srv/sistema.php";
                            formalioID = "frm_4";
                            srv="ERROR_PERF";
                            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                            console.log(pth);
                            location.href = "index.php?"+pth;
                        }
                    }
                    else{
                        $('#tipo_error').val(tipo_error);
                        msjError = "No pudimos realizar lo solicitado";
                        urlIn = "./srv/sistema.php";
                        formalioID = "frm_4";
                        srv="ERROR_PERF";
                        var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                        console.log(pth);
                        location.href = "index.php?"+pth;
                    }
                }, 500);
            }
            else if(from === 'CUENTA'){
                setTimeout(function() {
                    $('#tarjeta').val(tarjetaIn);
                    msjError = "No pudimos realizar lo solicitado";
                    urlIn = "./srv/sistema.php";
                    formalioID = "frm_4";
                    srv="PERF_PAN";
                    let resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                    let cod = resp[2];
                    let respuesta = resp[1];
                    let tipo_error = resp[3]; 
                    //return false;


                    if(cod == 1){
                        if (respuesta.hasOwnProperty("productos")){
                            let codigo_error = respuesta['codigo_error'];
                            let cliente = respuesta['cliente'];
                            let productos = respuesta['productos']['productos'];
                            let rut = cliente['rut'];
                            let dv = cliente['dv'];
                            let nombre = cliente['nombre'];
                            let cuenta = productos['codigo_producto_a'];
                            let pro = productos['producto'];
                            let ncta = pro['cuenta'];
                            ncta = ncta.toString();
                            ncta = ncta.length < 12 ? ncta.padStart(12, '0') : ncta;
                            $('#rut').val(rut);
                            $('#dv').val(dv);
                            $('#nombre').val(nombre);
                            $('#cta').val(cuenta);
                            $('#n_cta').val(ncta);
                
                            msjError = "No pudimos realizar lo solicitado";
                            urlIn = "./srv/sistema.php";
                            formalioID = "frm_4";
                            srv="PERF_CUENTA_OK";
                            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                            console.log(pth);
                            location.href = "index.php?"+pth;  
                        }
                        else{
                            $('#tipo_error').val(tipo_error);
                            msjError = "No pudimos realizar lo solicitado";
                            urlIn = "./srv/sistema.php";
                            formalioID = "frm_4";
                            srv="ERROR_PERF";
                            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                            console.log(pth);
                            location.href = "index.php?"+pth;
                        }
                    }
                    else{
                        $('#tipo_error').val(tipo_error);
                        msjError = "No pudimos realizar lo solicitado";
                        urlIn = "./srv/sistema.php";
                        formalioID = "frm_4";
                        srv="ERROR_PERF";
                        var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                        console.log(pth);
                        location.href = "index.php?"+pth;
                    }
                }, 500);
            }
        }
        else{

            console.log('menor');
            setTimeout(function() {
                $("#overlay").hide();
                $("#div_work").html("INGRESE UN NÚMERO DE TARJETA VÁLIDO");
                $('#div_work').css('color', 'red');
                $('#tarjetaIn').val('');
                $('#tarjetaIn').focus();
            }, 2000);
           


        }

       
    }

    
	

	

</script>