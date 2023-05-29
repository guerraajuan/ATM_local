<?php


if(isset($_REQUEST["from"]))
{
    $from = $_REQUEST["from"];
}



?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">INGRESE RUT DEL TITULAR DE LA CUENTA SI TERMINA EN K INGRESE UN 0 </br><span class="subtit">(Sin puntos ni guión y con diígito verificador Ejemplo: 12345678)</span></h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="number" aria-required="true"  value=""  name="rut" id="rut" class="form-control text-center" placeholder="RUT Usuario">
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
                        <a  onclick="javascript:perfilacion_rut();">SI</a>
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
<form name="frm_4" id="frm_4" >
    <input type="hidden" id="acc" name="acc" value="PERFIL" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut_param" name="rut_param" value="" />
    <input type="hidden" id="dv" name="dv" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />

    <input type="hidden" id="cta1" name="cta1" value="" />
    <input type="hidden" id="cta2" name="cta2" value="" />
    <input type="hidden" id="cta3" name="cta3" value="" /> 

    <input type="hidden" id="ncta1" name="ncta1" value="" />
    <input type="hidden" id="ncta2" name="ncta2" value="" />
    <input type="hidden" id="ncta3" name="ncta3" value="" />

    
    <input type="hidden" id="tarj1" name="tarj1" value="" />
    <input type="hidden" id="tarj2" name="tarj2" value="" />
    <input type="hidden" id="tarj3" name="tarj3" value="" />
    
</from>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        $('#rut').focus();
    });


	function limpiar(){
		$('#rut').val('');
		$('#rut').focus();
	}

	function perfilacion_rut(){
		let rut = $('#rut').val();
		let dv = rut.substr(-1);
		rut = rut.slice(0, -1);
        let from = $('#from').val();

		if(rut != ''){
			msjError = "No pudimos realizar lo solicitado";
			urlIn = "./srv/sistema.php?acc=PERFILACIONRUT&rut="+rut+"&dv="+dv+"&from="+from+"";
			dataIn = rut;
			srv="PERFILACIONRUT";
			let resp = getDataJson(urlIn,dataIn,srv,msjError);
            let cod = resp[2];
            let respuesta = resp[1];
            let productos;
            let flag =0;
            //console.log(resp);
            if(cod == 1){
                if (respuesta.hasOwnProperty("productos")){
                    if(respuesta['productos'].length > 0){ //trato diferente del objeto cuando cliente tiene creditos
                        //cuentas y creditos
                        flag =1;
                        for(let i = 0 ; i<respuesta['productos'].length; i++){
                            if(respuesta['productos'][i]['tipo']=='cuentas'){
                                productos = respuesta['productos'][i];
                            }
                        } 
                    }
                    else{
                        //solo cuentas
                        productos = respuesta['productos']['productos'];
                    }
                    let codigo_error = respuesta['codigo_error'];
                    let cliente = respuesta['cliente'];
                    console.log(productos);
                    let pr = productos;
                    let arr = [];
                    let cta1 = '';
                    let cta2 = '';
                    let cta3 = '';
                    let arr_tarj = [];
                    let tarj1 = '';
                    let tarj2 = '';
                    let tarj3 = '';
                    let arr_cuentas = [];
                    let ncta1 = '';
                    let ncta2 = '';
                    let ncta3 = '';
                    if(productos.length > 0){
                        for(let i = 0 ; i<productos.length; i++){
                            pr = productos[i];
                            let pro = pr['producto'];
                            let ncta_ = pro['cuenta'];
                            let tarjeta_ = pro['tarjeta'];
                            let codigo_a = pr.codigo_producto_a;
                            arr.push(codigo_a);   
                            arr_tarj.push(tarjeta_);   
                            arr_cuentas.push(ncta_);   
                        }   
                    }
                    else{
                        if(flag == 1) pr = pr['productos']; //trato diferente del objeto cuando cliente tiene creditos
                        let codigo_a = pr.codigo_producto_a;
                        let pro = pr['producto'];
                        let ncta_ = pro['cuenta'];
                        let tarjeta_ = pro['tarjeta'];
                        arr.push(codigo_a);
                        arr_tarj.push(tarjeta_);   
                        arr_cuentas.push(ncta_);
                    }
                    if(arr.length >= 1){
                        cta1 = arr[0];
                        tarj1 = arr_tarj[0];
                        ncta1 = arr_cuentas[0];
                        if(arr.length  == 2){
                            cta2 = arr[1];
                            tarj2 = arr_tarj[1];
                            ncta2 = arr_cuentas[1];
                        }
                        if(arr.length  == 3){
                            cta2 = arr[1];
                            cta3 = arr[2];
                            tarj2 = arr_tarj[1];
                            tarj3 = arr_tarj[2];
                            ncta2 = arr_cuentas[1];
                            ncta3 = arr_cuentas[2];
                        }

                        
                        // console.log(cta1);
                        // console.log(tarj1);
                        // console.log(ncta1);
                        // console.log(cta2);
                        // console.log(tarj2);
                        // console.log(ncta2);
                        // console.log(cta3);
                        // console.log(tarj3);
                        // console.log(ncta3);
                        $('#rut_param').val(rut);
                        $('#dv').val(dv);

                        $('#cta1').val(cta1);
                        $('#cta2').val(cta2);
                        $('#cta3').val(cta3);

                        $('#ncta1').val(ncta1);
                        $('#ncta2').val(ncta2);
                        $('#ncta3').val(ncta3);
                        
                        $('#tarj1').val(tarj1);
                        $('#tarj2').val(tarj2);
                        $('#tarj3').val(tarj3);
                        msjError = "No pudimos realizar lo solicitado";
		        		urlIn = "./srv/sistema.php";
		        		formalioID = "frm_4";
		        		srv="PERFIL";
		        		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		                console.log(pth);
                        location.href = "index.php?"+pth;
                        
                    }

                }
                else{
                    console.log('rut sin cuentas asosciadas');
                    $("#div_work").html("RUT sin cuentas asosciadas");
                    $('#div_work').css('color', 'red');
                    $('#rut').val('');
		            $('#rut').focus();
                }
                    
            }
            else{
                console.log('rut erroneo');
                $("#div_work").html("RUT erroneo");
                $('#div_work').css('color', 'red');
                $('#rut').val('');
		        $('#rut').focus();
            }
			
		}

	}

	

</script>