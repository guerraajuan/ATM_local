<?php
    function rut_format( $rut_ ) {
        return number_format( substr ( $rut_, 0 , -1 ) , 0, "", ".") . '-' . substr ( $rut_, strlen($rut_) -1 , 1 );
    }
    $from = $_REQUEST["from"];
    $tarjeta = '';
    $pass = '';
    $rut = '';
    $dv = '';
    $monto = '';
    $cuotas = '';
    $fecha = '';
    $valorcuota = '';
    $pass_actual = '';
    $pass_1 = '';
    $pass_2 = '';
    $paso = '';
    $intentos = 0;
    $id_dolicitud = '';
    $estado = '';
    $avance = '';
    $super = '';
    $nombre = '';

    $n_operacion='';
    $rut_op='';
    $nombre_op='';
    $n_tarjeta='';
    $monto_op='';
    $cuotas_op='';

    $fecha='';
    $fecha_cont='';
    $hora='';
    $cajero='';
    $operacion='';
    $n_cuenta='';

  
   
    $disp_avance ='';
    $disp_cred_consumo ='';
    $disp_compras ='';

    $atm_sel ='';

    $control = '';
    $res_erorr = '';
    $codigo_erorr = '';
    $description = '';
   

    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"]; 
    if(isset($_REQUEST["pass"])) $pass = $_REQUEST["pass"]; 
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"]; 
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"]; 
    if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"]; 
    //if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"]; 
    // if(isset($_REQUEST["super"])) $super = $_REQUEST["super"]; 
     if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"]; 
    if(isset($_REQUEST["cuotas"])) $cuotas = $_REQUEST["cuotas"]; 
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"]; 
    if(isset($_REQUEST["valorcuota"])) $valorcuota = $_REQUEST["valorcuota"]; 
    if(isset($_REQUEST["pass_actual"])) $pass_actual = $_REQUEST["pass_actual"]; 
    if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"]; 
    if(isset($_REQUEST["pass_1"])) $pass_1 = $_REQUEST["pass_1"]; 
    if(isset($_REQUEST["pass_2"])) $pass_2 = $_REQUEST["pass_2"]; 
    if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"]; 
    if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"]; 
    if(isset($_REQUEST["estado"])) $estado = $_REQUEST["estado"]; 

    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"]; 
    if(isset($_REQUEST["nombre_op"])) $nombre_op = $_REQUEST["nombre_op"]; 
    //if(isset($_REQUEST["n_tarjeta"])) $n_tarjeta = $_REQUEST["n_tarjeta"]; 
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"]; 
    if(isset($_REQUEST["cuotas_op"])) $cuotas_op = $_REQUEST["cuotas_op"];

    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"]; 
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"]; 
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"]; 
    if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"]; 
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];

    if(isset($_REQUEST["disp_avance"])) $disp_avance = $_REQUEST["disp_avance"]; 
    if(isset($_REQUEST["disp_cred_consumo"])) $disp_cred_consumo = $_REQUEST["disp_cred_consumo"]; 
    if(isset($_REQUEST["disp_compras"])) $disp_compras = $_REQUEST["disp_compras"];

    if(isset($_REQUEST["rut_op"])) $rut_op = rut_format($rut.$dv); 

    if(isset($_REQUEST["tarjeta"])) $n_tarjeta = '**************'.substr($tarjeta,-4);

    if (isset($_SESSION['atm_sel'])) $atm_sel = $_SESSION['atm_sel'];

    if (isset($_REQUEST['control'])) $control =$_REQUEST['control'];
    if (isset($_REQUEST['res_erorr'])) $res_erorr =$_REQUEST['res_erorr'];
    if (isset($_REQUEST['codigo_erorr'])) $codigo_erorr =$_REQUEST['codigo_erorr'];

?>

<table  id="mensaje">
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"> 
                    <span id="mensaje_1">POR FAVOR </span>
                    </br></br>
                    <span id="mensaje_2">ESPERE UN MOMENTO</span>
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>


<div id="recibo_avance" style="display:none;">
    <table > 
        <thead> 
            <th><b>COMPROBANTE DE OPERACION  <?php echo $n_operacion;?><b></th>
            <th></th>
            <th><b id="operacion_avance"></b></th>
        </thead>
        <tbody>
            <tr>
                <td><b>NUMERO DE TARJETA</b></td>
                <td> &nbsp &nbsp </td>
                <td id="n_tarjeta_avance"></td> 
            </tr>
            <tr>
                <td><b>MONTO</b></td>
                <td> &nbsp &nbsp </td>
                <td id="monto_op_avance"></td> 
            </tr>
            <tr>
                <td><b>CUOTAS</b></td>
                <td> &nbsp &nbsp </td>
                <td id="cuotas_op_avance"></td>
            </tr>
            <tr>
                <td><a title="Descargar Comprobante" onclick="javascript:descarga_avance();" style="cursor:pointer;"><img src="images\pdf.png" width="30" height="30"  ></a></td>
                <td>&nbsp &nbsp</td>
                <td>&nbsp &nbsp</td>
            </tr>
        </tbody>
    </table>
</div>

<div id="recibo_consulta" style="display:none;">
    <table > 
        <thead> 
            <th><b>COMPROBANTE DE OPERACION  <?php echo $n_operacion;?><b></th>
            <th></th>
            <th><b id="operacion_consulta"></b></th>
        </thead>
        <tbody>
            <tr>
                <td><b>NUMERO TARJETA</b></td>
                <td> &nbsp &nbsp </td>
                <td id="n_tarjeta_consulta"></td> 
            </tr>
            <tr>
                <td><b>NUMERO CUENTA</b></td>
                <td> &nbsp &nbsp </td>
                <td id="n_cuenta_consulta"></td> 
            </tr>
            
            <tr>
                <td><b>DISP. AVANCE</b></td>
                <td> &nbsp &nbsp </td>
                <td id="disp_avance"></td> 
            </tr>
            <tr>
                <td><b>DISP. CRED. CONSUMO</b></td>
                <td> &nbsp &nbsp </td>
                <td id="disp_cred_consumo"></td> 
            </tr>
            <tr>
                <td><b>DISP. COMPRAS</b></td>
                <td> &nbsp &nbsp </td>
                <td id="disp_compras"></td> 
            </tr>
            <tr>
                <td><a title="Descargar Comprobante" onclick="javascript:descarga();" style="cursor:pointer;"><img src="images\pdf.png" width="30" height="30"  ></a></td>
                <td>&nbsp &nbsp</td>
                <td>&nbsp &nbsp</td>
            </tr>

        </tbody>
    </table>
</div>

<div id="recibo_super_avance" style="display:none;">
    <table > 
        <thead> 
            <th><b>COMPROBANTE DE OPERACION  <?php echo $n_operacion;?><b></th>
            <th></th>
            <th><b id="operacion_super_avance"></b></th>
        </thead>
        <tbody>
            <tr>
                <td><b>NUMERO DE TARJETA</b></td>
                <td> &nbsp &nbsp </td>
                <td id="n_tarjeta_super_avance"></td> 
            </tr>
            <tr>
                <td><b>MONTO</b></td>
                <td> &nbsp &nbsp </td>
                <td id="monto_op_super_avance"></td> 
            </tr>
            <tr>
                <td><b>CUOTAS</b></td>
                <td> &nbsp &nbsp </td>
                <td id="cuotas_op_super_avance"></td>
            </tr>
            <tr>
                <td><a title="Descargar Comprobante" onclick="javascript:descarga_super_avance();" style="cursor:pointer;"><img src="images\pdf.png" width="30" height="30"  ></a></td>
                <td>&nbsp &nbsp</td>
                <td>&nbsp &nbsp</td>
            </tr>
        </tbody>
    </table>
</div>


<div id="consulta" style="display:none;">
    <table>
        <thead>
            <tr>
                <th class="text-center"   colspan="2"  >
                    <h3 class="poppins" id="resultado" style="padding-top: 10px;"></h3>
                    <h4 class="poppins" id="error"></h4>
                    <h4 class="poppins" id="codigo_error"></h4>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width:50%;"></td>
                <td style="width:50%;">
                    <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                        <h4 class="poppins hover-color3 text-right">
                            <a  href="index.php?<?php echo util::encodeParamURL('pth=home'); ?>">INICIO</a>
                        </h4>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>





<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="ESPERACMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="pass" name="pass" value="<?php echo $pass; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="cuotas" name="cuotas" value="<?php echo $cuotas; ?>" />
    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
    <input type="hidden" id="valorcuota" name="valorcuota" value="<?php echo $valorcuota; ?>" />
    <input type="hidden" id="pass_actual" name="pass_actual" value="<?php echo $pass_actual; ?>" />
    <input type="hidden" id="pass_1" name="pass_1" value="<?php echo $pass_1; ?>" />
    <input type="hidden" id="pass_2" name="pass_2" value="<?php echo $pass_2; ?>" />
    <input type="hidden" id="intentos" name="intentos" value="<?php echo $intentos; ?>" />
    <input type="hidden" id="paso" name="paso" value="<?php echo $paso; ?>" />
    <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $id_solicitud; ?>" />
    <input type="hidden" id="estado" name="estado" value="<?php echo $estado; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />

    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
    <input type="hidden" id="fecha_cont" name="fecha_cont" value="<?php echo $fecha_cont; ?>" />
    <input type="hidden" id="hora" name="hora" value="<?php echo $hora; ?>" />
    <input type="hidden" id="cajero" name="cajero" value="<?php echo $cajero; ?>" />
    <input type="hidden" id="operacion" name="operacion" value="<?php echo $operacion; ?>" />
    <input type="hidden" id="n_operacion" name="n_operacion" value="<?php echo $n_operacion; ?>" />
    <input type="hidden" id="n_cuenta" name="n_cuenta" value="<?php echo $n_cuenta; ?>" />
    <input type="hidden" id="n_tarjeta" name="n_tarjeta" value="<?php echo $n_tarjeta; ?>" />

    <input type="hidden" id="disp_avance" name="disp_avance" value="<?php echo $disp_avance; ?>" />
    <input type="hidden" id="disp_cred_consumo" name="disp_cred_consumo" value="<?php echo $disp_cred_consumo; ?>" />
    <input type="hidden" id="disp_compras" name="disp_compras" value="<?php echo $disp_compras; ?>" />

    <input type="hidden" id="monto_op" name="monto_op" value="<?php echo $monto_op; ?>" />
    <input type="hidden" id="cuotas_op" name="cuotas_op" value="<?php echo $cuotas_op; ?>" />
    <input type="hidden" id="rut_op" name="rut_op" value="<?php echo $rut_op; ?>" />
    <input type="hidden" id="nombre_op" name="nombre_op" value="<?php echo $nombre_op; ?>" />

    <input type="hidden" id="atm_sel" name="atm_sel" value="<?php echo $atm_sel; ?>" />

    <input type="hidden" id="control" name="control" value="<?php echo $control; ?>" />
</from>

<script>
  
    document.addEventListener("DOMContentLoaded", function(event) {
        let paso = $('#paso').val();
        let from = $('#from').val();
        console.log(paso);
        console.log(from);

        if(from == 'SALDOCMR'){
            if(paso == '1'){  
                //SE DEBE HACER EL INSERT DE LA SOLICITUD DE TRANSACCION
                //$('#mensaje').text('SE DEBE HACER EL INSERT DE LA SOLICITUD DE TRANSACCION');
                setTimeout(goto_paso, 2000);
            }
            else if(paso == 2){
                //BUSCO LA RESPUESTA DE LA TRANSACCION
               // $('#mensaje').text('/BUSCO LA RESPUESTA DE LA TRANSACCION');
                setTimeout(goto_paso, 2000);
            }
            else if(paso == 3){
                let estado = $('#estado').val();
                let control = $('#control').val();
                if(control == 0){
                    //No conecto con el host
                    $('#mensaje').hide();
                    $('#resultado').text('No se logró establecer conexión con el HOST');
                    $('#resultado').css('color', 'red');
                    $('#consulta').show()

                }
                else{
                    if(estado == 1){
                        $('#mensaje').hide()
                        $('#operacion_consulta').text(<?php echo "'".$operacion."'"; ?>);
                        $('#n_tarjeta_consulta').text(<?php echo "'".$n_tarjeta."'"; ?>);
                        $('#n_cuenta_consulta').text(<?php echo "'".$n_cuenta."'"; ?>);
                        $('#disp_avance').text(<?php echo "'".$disp_avance."'"; ?>);
                        $('#disp_cred_consumo').text(<?php echo "'".$disp_cred_consumo."'"; ?>);
                        $('#disp_compras').text(<?php echo "'".$disp_compras."'"; ?>);
                        $('#resultado').text('OPERACION REALIZADA');
                        $('#resultado').css('color', '#3c763d');
                        $('#recibo_consulta').show();
                        $('#consulta').show();
                    }
                    else{
                        $('#mensaje').hide();
                        $('#resultado').text('No se pudo completar la transacción, valide los datos.');
                        $('#error').text('Error: '+<?php echo "'".$res_erorr."'"; ?>);
                        $('#resultado').css('color', 'red');
                        $('#consulta').show();
                    }

                }

                
            }
        }
        else if(from =='AVANCECMR'){
            if(paso == '1'){  
                //SE DEBE HACER EL INSERT DE LA SOLICITUD DE TRANSACCION
                setTimeout(goto_paso, 2000);
            }
            else if(paso == 2){
                //BUSCO LA RESPUESTA DE LA TRANSACCION
                setTimeout(goto_paso, 2000);
            }
            else if(paso == 3){
                // muestro mensaje de error
                let estado = $('#estado').val();
                let control = $('#control').val();
                if(control == 0){
                    //No conecto con el host
                    $('#mensaje').hide();
                    $('#resultado').text('No se logró establecer conexión con el HOST');
                    $('#resultado').css('color', 'red');
                    $('#consulta').show();

                }
                else{
                    if(estado == 0){
                        //muestro mensaje de error, sino el flujo es por otro lado
                        $('#mensaje').hide();
                        $('#resultado').text('No se pudo completar la transacción, valide los datos.');
                        $('#error').text('Error: '+<?php echo "'".$res_erorr."'"; ?>);
                        $('#resultado').css('color', 'red');
                        $('#consulta').show();
                    }

                }

            }
            else if(paso == 5){
                //BUSCO LA RESPUESTA DE LA TRANSACCION
                setTimeout(goto_paso, 2000);
            }
            else if(paso == 6){
                let estado = $('#estado').val();
                let control = $('#control').val();
                if(control == 0){
                    //No conecto con el host
                    $('#mensaje').hide();
                    $('#resultado').text('No se logró establecer conexión con el HOST');
                    $('#resultado').css('color', 'red');
                    $('#consulta').show();

                }
                else{
                    if(estado == 1){
                        $('#mensaje').hide()
                        $('#operacion_avance').text(<?php echo "'".$operacion."'"; ?>);
                        $('#n_tarjeta_avance').text(<?php echo "'".$n_tarjeta."'"; ?>);
                        $('#monto_op_avance').text(<?php echo "'".$monto_op."'"; ?>);
                        $('#cuotas_op_avance').text(<?php echo "'".$cuotas_op."'"; ?>);
                        $('#resultado').text('OPERACION REALIZADA');
                        $('#resultado').css('color', '#3c763d');
                        $('#recibo_avance').show();
                        $('#consulta').show();
                    }
                    else{
                        //muestro mensaje de error, sino el flujo es por otro lado
                        $('#mensaje').hide();
                        $('#resultado').text('No se pudo completar la transacción, valide los datos.');
                        $('#error').text('Error: '+<?php echo "'".$res_erorr."'"; ?>);
                        $('#resultado').css('color', 'red');
                        $('#consulta').show();
                    }

                }

                
            }
        }
        else if(from == 'SACMR'){
            if(paso == '2'){  
                //BUSCO LA RESPUESTA DE LA TRANSACCION
                setTimeout(goto_paso, 2000);
            }
            else if(paso ==3 ){
                //BUSCO LA RESPUESTA DE LA TRANSACCION
                let estado = $('#estado').val();
                let control = $('#control').val();
                if(control == 0){
                    //No conecto con el host
                    $('#mensaje').hide();
                    $('#resultado').text('No se logró establecer conexión con el HOST');
                    $('#resultado').css('color', 'red');
                    $('#consulta').show();

                }
                else{
                    if(estado == 1){
                    $('#mensaje').hide()
                    $('#operacion_super_avance').text(<?php echo "'".$operacion."'"; ?>);
                    $('#n_tarjeta_super_avance').text(<?php echo "'".$n_tarjeta."'"; ?>);
                    $('#monto_op_super_avance').text(<?php echo "'".$monto_op."'"; ?>);
                    $('#cuotas_op_super_avance').text(<?php echo "'".$cuotas_op."'"; ?>);
                    $('#resultado').text('OPERACION REALIZADA');
                    $('#resultado').css('color', '#3c763d');
                    $('#recibo_super_avance').show();
                    $('#consulta').show();
                }
                else{
                        //muestro mensaje de error, sino el flujo es por otro lado
                        $('#mensaje').hide();
                        $('#resultado').text('No se pudo completar la transacción, valide los datos.');
                        $('#error').text('Error: '+<?php echo "'".$res_erorr."'"; ?>);
                        $('#resultado').css('color', 'red');
                        $('#consulta').show();
                }

                }

            }
        }
        else{
            setTimeout(goto_paso, 1000);
        }      
    }); 

    function goto_paso(){
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="ESPERACMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		//console.log(pth);
        location.href = "index.php?"+pth; 
    }

    function descarga(){
        $('#acc').val('DESCARGA_COMSULTA_CMR');
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="DESCARGA_COMSULTA_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
        window.open("index.php?"+pth); 
    }

    function descarga_avance(){
        $('#acc').val('DESCARGA_AVANCE_CMR');
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="DESCARGA_AVANCE_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
        window.open("index.php?"+pth); 
    }

    function descarga_super_avance(){
        $('#acc').val('DESCARGA_SUPER_AVANCE_CMR');
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="DESCARGA_SUPER_AVANCE_CMR";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
        window.open("index.php?"+pth); 
    }





</script>
