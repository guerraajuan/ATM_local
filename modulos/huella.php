
<?php
    $cta = '';
    $co_cta = '';
    $pass = '';
    $pass_2 = '';
    $from = '';
    $rut = '';
    $dv = '';
    $tarjeta = '';
    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
    if(isset($_REQUEST["pass"])) $pass = $_REQUEST["pass"];
    if(isset($_REQUEST["pass_2"])) $pass_2 = $_REQUEST["pass_2"];
    if(isset($_REQUEST["pan"])) $tarjeta = $_REQUEST["pan"];
    $intentos = 0;
    if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];
    //echo $from;
    // echo $tarjeta;

    /*echo $pass;
    echo $intentos;*/
   


?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR APOYE UNO DE LOS DEDOS RESALTADOS EN EL LECTOR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <img src="img\img_1.PNG" alt="">
            </td>
            <td  style="width:50%;" >
                <input type="image" src="img\img_2.PNG" onclick="javascript:perfilacion_rut();" /> 
              
            </td>
        </tr>
    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="CAMBIO_CLAVE" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>" />
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" /> 
    <input type="hidden" id="pass" name="pass" value="<?php echo $pass; ?>" />
    <input type="hidden" id="pass_2" name="pass_2" value="<?php echo $pass_2; ?>" />
    <input type="hidden" id="paso" name="paso" value="4" />
    <input type="hidden" id="intentos" name="intentos" value="<?php echo $intentos; ?>" />
    <input type="hidden" id="pan" name="pan" value="<?php echo $tarjeta; ?>" />

    <input type="hidden" id="cta1" name="cta1" value="" />
    <input type="hidden" id="cta2" name="cta2" value="" />
    <input type="hidden" id="cta3" name="cta3" value="" />

    <input type="hidden" id="ncta" name="ncta" value="" />

    <input type="hidden" id="ncta1" name="ncta1" value="" />
    <input type="hidden" id="ncta2" name="ncta2" value="" />
    <input type="hidden" id="ncta3" name="ncta3" value="" />

    <input type="hidden" id="tarj1" name="tarj1" value="" />
    <input type="hidden" id="tarj2" name="tarj2" value="" />
    <input type="hidden" id="tarj3" name="tarj3" value="" />

</from>



<script type="text/javascript">
 
	function perfilacion_rut(){
		let rut = $('#rut').val();
		let dv = $('#dv').val();
        let from = $('#from').val();
        //console.log(rut);
        //console.log(dv);
        //console.log(from);
        //return false;

		if(rut != '' && from == 'cliente'){
			msjError = "No pudimos realizar lo solicitado";
			urlIn = "./srv/sistema.php?acc=PERFILACIONRUT&rut="+rut+"&dv=1&from="+from+"";
			dataIn = rut;
			srv="PERFILACIONRUT";
			let resp = getDataJson(urlIn,dataIn,srv,msjError);
            let cod = resp[2];
            let respuesta = resp[1];
            let productos;
            let flag =0;
            //console.log(resp);
            //return false;
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

                        $('#cta1').val(cta1);
                        $('#cta2').val(cta2);
                        $('#cta3').val(cta3);

                        $('#ncta1').val(ncta1);
                        $('#ncta2').val(ncta2);
                        $('#ncta3').val(ncta3);
                        
                        $('#tarj1').val(tarj1);
                        $('#tarj2').val(tarj2);
                        $('#tarj3').val(tarj3);
                        $('#acc').val('PERFILACIONRUTHUELLA');

                        msjError = "No pudimos realizar lo solicitado";
		                urlIn = "./srv/sistema.php";
		                formalioID = "frm_4";
		                srv="PERFILACIONRUTHUELLA";
		                var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
                        //console.log(pth);
                        location.href = "index.php?"+pth; 
                        
                    }

                }
                else{
                    console.log('rut sin cuentas asosciadas');
                    let msj = "RUT Sin cuentas asosciadas";
                    $('#msj').val(msj);
                    msjError = "No pudimos realizar lo solicitado";
		        	urlIn = "./srv/sistema.php?acc=CLIENTE_BANCOFALABELLA&from="+from+"&msj="+msj;
		        	srv="CLIENTE_BANCOFALABELLA";
                    dataIn = rut;
		        	var pth =  getDataJson(urlIn,dataIn,srv,msjError);
		            console.log(pth);
                    location.href = "index.php?"+pth;

                }
                    
            }
            /////////////////////////////////////////////////////////////////
            //ESTO VA CUANDO FUNCIONE EL SIMPLEXML
            else{
                console.log('rut erroneo');
                let msj = "RUT erroneo";
                $('#msj').val(msj);
                msjError = "No pudimos realizar lo solicitado";
		        urlIn = "./srv/sistema.php?acc=CLIENTE_BANCOFALABELLA&from="+from+"&msj="+msj;
		        srv="CLIENTE_BANCOFALABELLA";
                dataIn = rut;
		        var pth =  getDataJson(urlIn,dataIn,srv,msjError);
		        console.log(pth);
                location.href = "index.php?"+pth;  
            }
            ///////////////////////////////////////////////////////////////////////
			
		}
        else if(from == 'cliente-CAMBIOCLAVE'){
            $('#acc').val('CAMBIO_CLAVE');
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="CAMBIO_CLAVE";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;  

        }
        else if(from == 'PERFILACIONPAN'){
            $('#acc').val('PERFILACIONPAN');
            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="PERFILACIONPAN";
		    var resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    //console.log(resp);
            let cod = resp[2];
            let respuesta = resp[1];
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
                    //console.log(ncta);
                    if(ncta.length < 12){
                        //console.log('add');
                        ncta = ncta.padStart(12, '0');
                    }
                    // console.log(ncta);
                    // return false;
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