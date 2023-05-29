<?php
    $from = '';
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $disponible_avance = '';
    $disponible_super = '';
    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["avance"])) $disponible_avance = $_REQUEST["avance"];
    if(isset($_REQUEST["super"])) $disponible_super = $_REQUEST["super"];
  
   
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">INGRESE SU NUMERO SECRETO</h3>
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
    <input type="hidden" id="acc" name="acc" value="PERFILACIONCMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="pass" name="pass" value="" />
    <input type="hidden" id="rut" name="rut" value="" />
    <input type="hidden" id="dv" name="dv" value="" />
    <input type="hidden" id="avance" name="avance" value="" />
    <input type="hidden" id="super" name="super" value="" />
    <input type="hidden" id="nombre" name="nombre" value="" />

</from>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) { 
        $('#clave').focus();
    });

	function limpiar(){
		$('#clave').val('');
		$('#clave').focus();
	}

	function get_pass(){
        let from = $('#from').val();
        let pass = $('#clave').val();
        if(from == 'PERFILACIONCMR'){
            if(pass.length === 4){
                $('#acc').val('PERFILACIONCMR');
                $('#pass').val(pass);
                msjError = "No pudimos realizar lo solicitado";
		        urlIn = "./srv/sistema.php";
		        formalioID = "frm_4";
		        srv="PERFILACIONCMR";
		        let resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		        console.log(resp);
                let cod = resp[2];
                let respuesta = resp[1];
                console.log(cod); 
                console.log(respuesta); 
           
                if(cod == 1){
                    if (respuesta.hasOwnProperty("productos")){
                        console.log('aqui');
                        let codigo_error = respuesta['codigo_error'];
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
                        $('#from').val('PERFILACIONCMROK');
                        $('#nombre').val(nombre);
    
                        msjError = "No pudimos realizar lo solicitado";
		                urlIn = "./srv/sistema.php";
		                formalioID = "frm_4";
		                srv="PERFILACIONCMR";
		                var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                        console.log(pth);
                        location.href = "index.php?"+pth; 
                    }
                    else{
                        console.log('sino');
                        $('#from').val('CMR');
                        $('#acc').val('TARJETACUENTASERROR');
                        msjError = "No pudimos realizar lo solicitado";
		                urlIn = "./srv/sistema.php";
		                formalioID = "frm_4";
		                srv="TARJETACUENTASERROR";
		                var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                        console.log(pth);
                        location.href = "index.php?"+pth;
                    }
                }
                else{
                    console.log('sinooo');
                    $('#from').val('CMR');
                    $('#acc').val('TARJETACUENTASERROR');
                    msjError = "No pudimos realizar lo solicitado";
		            urlIn = "./srv/sistema.php";
		            formalioID = "frm_4";
		            srv="TARJETACUENTASERROR";
		            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                    console.log(pth);
                    location.href = "index.php?"+pth;
                }
	        }

        }
        
    }

	

</script>
