<?php
    $from = '';
    $pan = '';
    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["pan"])) $pan = $_REQUEST["pan"];
    /*echo $from;
    echo '</br>';
    echo $cta;
    echo $rut;
                */


  
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
    <input type="hidden" id="acc" name="acc" value="PERFILACIONPAN" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="pan" name="pan" value="<?php echo $pan; ?>" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="pass" name="pass" value="" />
    <input type="hidden" id="rut" name="rut" value="" />
    <input type="hidden" id="dv" name="dv" value="" />
    <input type="hidden" id="cta1" name="cta1" value="" />
    <input type="hidden" id="ncta" name="ncta" value="" />
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
        let pass = $('#clave').val();
        if(pass.length === 4){
            $('#pass').val(pass);
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="PERFILACIONPAN";
		    var resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(resp);
            let cod = resp[2];
            let respuesta = resp[1];
            //console.log(cod); 
            //console.log(respuesta);
            //return false
            if(cod == 1){
                if (respuesta.hasOwnProperty("productos")){
                    let codigo_error = respuesta['codigo_error'];
                    let cliente = respuesta['cliente'];
                    let productos = respuesta['productos']['productos'];
                    let rut = cliente['rut'];
                    let dv = cliente['dv'];
                    let cuenta = productos['codigo_producto_a'];
                    let pro = productos['producto'];
                    let ncta = pro['cuenta'];
                    ncta = ncta.toString();
                    console.log(ncta);
                    if(ncta.length < 12){
                        //console.log('add');
                        ncta = ncta.padStart(12, '0');
                    }
                    //console.log(pro);
                    console.log(ncta);
                    //return false
                    $('#rut').val(rut);
                    $('#dv').val(dv);
                    $('#cta1').val(cuenta);
                    $('#ncta').val(ncta);
                    $('#acc').val('TARJETACUENTAS');
                    msjError = "No pudimos realizar lo solicitado";
		            urlIn = "./srv/sistema.php";
		            formalioID = "frm_4";
		            srv="TARJETACUENTAS";
		            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                    console.log(pth);
                    location.href = "index.php?"+pth;  


                }
                else{
                    console.log('Tarjeta Erronea');
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
                console.log('Tarjeta Erronea');
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

	

</script>
