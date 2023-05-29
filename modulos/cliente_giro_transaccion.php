<?php
    $estado = '';
    $id_solicitud = '';

    $n_operacion = '';
    $n_cuenta = '';
    $operacion =  '';
    $monto_op=  '';;
    $max_giro =  '';
    $disponible =  '';

    $fecha='';
    $fecha_cont='';
    $hora='';
    $cajero='';
    $operacion='';
    $saldo_total='';
    $giros_realizados='';
    $intereses='';
    $reajuste='';


    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    
    $co_cta ='';
    $monto = '';
    

    $cta = '';
    $cta1 = '';
    $cta2 = '';
    $cta3 = '';

    
    $ncta ='';
    $ncta1 ='';
    $ncta2 ='';
    $ncta3 ='';

    $tarjeta ='';
    $tarjeta1 ='';
    $tarjeta2 ='';
    $tarjeta3 ='';

    $atm_sel ='';

    $control = '';
    $res_erorr = '';
    $codigo_erorr = '';
    $description = '';

    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
    if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];

    if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"];
    if(isset($_REQUEST["estado"])) $estado = $_REQUEST["estado"];
    if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];

    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
    if(isset($_REQUEST["max_giro"])) $max_giro = $_REQUEST["max_giro"];
    if(isset($_REQUEST["disponible"])) $disponible = $_REQUEST["disponible"];

    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
    if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["saldo_total"])) $saldo_total = $_REQUEST["saldo_total"];
    if(isset($_REQUEST["giros_realizados"])) $giros_realizados = $_REQUEST["giros_realizados"];
    if(isset($_REQUEST["intereses"])) $intereses = $_REQUEST["intereses"];
    if(isset($_REQUEST["reajuste"])) $reajuste = $_REQUEST["reajuste"];
    


    if(isset($_REQUEST["cta1"])) $cta1 = $_REQUEST["cta1"];
    if(isset($_REQUEST["cta2"])) $cta2 = $_REQUEST["cta2"];
    if(isset($_REQUEST["cta3"])) $cta3 = $_REQUEST["cta3"];

    if(isset($_REQUEST["ncta"])) $ncta = $_REQUEST["ncta"];
    if(isset($_REQUEST["ncta1"])) $ncta1 = $_REQUEST["ncta1"];
    if(isset($_REQUEST["ncta2"])) $ncta2 = $_REQUEST["ncta2"];
    if(isset($_REQUEST["ncta3"])) $ncta3 = $_REQUEST["ncta3"];

    if(isset($_REQUEST["tarj"])) $tarjeta = $_REQUEST["tarj"];
    if(isset($_REQUEST["tarj1"])) $tarjeta1 = $_REQUEST["tarj1"];
    if(isset($_REQUEST["tarj2"])) $tarjeta2 = $_REQUEST["tarj2"];
    if(isset($_REQUEST["tarj3"])) $tarjeta3 = $_REQUEST["tarj3"];

    if (isset($_SESSION['atm_sel'])) $atm_sel = $_SESSION['atm_sel'];

    if (isset($_REQUEST['control'])) $control =$_REQUEST['control'];
    if (isset($_REQUEST['res_erorr'])) $res_erorr =$_REQUEST['res_erorr'];
    if (isset($_REQUEST['codigo_erorr'])) $codigo_erorr =$_REQUEST['codigo_erorr'];
  

    // if($co_cta == 'AB') $operacion = 'GIRO CUENTA CORRIENTE';
    // else if($co_cta== 'AC') $operacion = 'GIRO CUENTA VISTA';
    // else if($co_cta== 'AD') $operacion = 'GIRO CUENTA AHORRO';
    

?>



<table id="mensaje">
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3  class="poppins" style="color:#3c763d;"> 
                    </br>POR FAVOR </br></br> <span id="titulo" >ESPERE UN MOMENTO</span></h3>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="recibo" style="display:none;">
    <table > 
        <thead> 
            <th><b>COMPROBANTE DE OPERACION  <?php echo $n_operacion;?><b></th>
            <th></th>
            <th><b id="operacion"></b></th>
        </thead>

        <tbody>
            <tr>
                <td><b>NUMERO DE CUENTA</b></td>
                <td> &nbsp &nbsp </td>
                <td id="n_cuenta"></td> 
            </tr>
            <tr>
                <td><b>MONTO</b></td>
                <td> &nbsp &nbsp </td>
                <td id="monto_op"></td> 
            </tr>
            <tr>
                <td><b>MAXIMO DE GIRO</b></td>
                <td> &nbsp &nbsp </td>
                <td id="max_giro"></td>
            </tr>
            <tr>
                <td><b>DISPONIBLE</b></td>
                <td> &nbsp &nbsp </td>
                <td id="disponible"></td>
            </tr>
            <tr>
                <td><b>SALDO TOTAL</b></td>
                <td>&nbsp &nbsp</td>
                <td id="saldo_total"></td>
            </tr>
            <tr>
                <td><a title="Descargar Comprobante" onclick="javascript:descarga();" style="cursor:pointer;"><img src="images\pdf.png" width="30" height="30"  ></a></td>
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
            <td colspan="2">                
                
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">¿DESEA OTRA OPERACION?</h4>
                
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:otra_Operacion();">SI</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?">NO</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
</div>



<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="GIRO" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>" /> 
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="paso" name="paso" value="<?php echo $paso; ?>" />
    <input type="hidden" id="id_solicitud" name="id_solicitud" value="<?php echo $id_solicitud; ?>" />
    <input type="hidden" id="estado" name="estado" value="<?php echo $estado; ?>" />

    <input type="hidden" id="cta1" name="cta1" value="<?php echo $cta1; ?>" />
    <input type="hidden" id="cta2" name="cta2" value="<?php echo $cta2; ?>" />
    <input type="hidden" id="cta3" name="cta3" value="<?php echo $cta3; ?>" />

    <input type="hidden" id="ncta" name="ncta" value="<?php echo $ncta; ?>" />
    <input type="hidden" id="ncta1" name="ncta1" value="<?php echo $ncta1; ?>" />
    <input type="hidden" id="ncta2" name="ncta2" value="<?php echo $ncta2; ?>" />
    <input type="hidden" id="ncta3" name="ncta3" value="<?php echo $ncta3; ?>" />
    <input type="hidden" id="tarj" name="tarj" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="tarj1" name="tarj1" value="<?php echo $tarjeta1; ?>" />
    <input type="hidden" id="tarj2" name="tarj2" value="<?php echo $tarjeta2; ?>" />
    <input type="hidden" id="tarj3" name="tarj3" value="<?php echo $tarjeta3; ?>" />


    <input type="hidden" id="fecha" name="fecha" value="<?php echo $fecha; ?>" />
    <input type="hidden" id="fecha_cont" name="fecha_cont" value="<?php echo $fecha_cont; ?>" />
    <input type="hidden" id="hora" name="hora" value="<?php echo $hora; ?>" />
    <input type="hidden" id="cajero" name="cajero" value="<?php echo $cajero; ?>" />
    <input type="hidden" id="operacion" name="operacion" value="<?php echo $operacion; ?>" />
    <input type="hidden" id="saldo_total" name="saldo_total" value="<?php echo $saldo_total; ?>" />
    <input type="hidden" id="giros_realizados" name="giros_realizados" value="<?php echo $giros_realizados; ?>" />
    <input type="hidden" id="intereses" name="intereses" value="<?php echo $intereses; ?>" />
    <input type="hidden" id="reajuste" name="reajuste" value="<?php echo $reajuste; ?>" />
    <input type="hidden" id="n_operacion" name="n_operacion" value="<?php echo $n_operacion; ?>" />
    <input type="hidden" id="n_cuenta" name="n_cuenta" value="<?php echo $n_cuenta; ?>" />
    <input type="hidden" id="max_giro" name="max_giro" value="<?php echo $max_giro; ?>" />
    <input type="hidden" id="disponible" name="disponible" value="<?php echo $disponible; ?>" />
    <input type="hidden" id="monto_op" name="monto_op" value="<?php echo $monto_op; ?>" />

    <input type="hidden" id="atm_sel" name="atm_sel" value="<?php echo $atm_sel; ?>" />

    <input type="hidden" id="control" name="control" value="<?php echo $control; ?>" />
    
</from>

<script>
  

    document.addEventListener("DOMContentLoaded", function(event) {
        let from = $('#from').val();
        let paso = $('#paso').val();
        console.log(from);
        console.log(paso);
      
         if(paso == '1'){  
             //SE DEBE HACER EL INSERT DE LA SOLICITUD DE TRANSACCION
             setTimeout(goto_paso, 2500);
         }
        else if(paso == 2){
            //BUSCO LA RESPUESTA DE LA TRANSACCION
            setTimeout(goto_paso, 2500);
        }
        else if(paso == 3){
            //MUESTRO RESULTADO
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
                $('#mensaje').hide();

                $('#n_operacion').text(<?php echo "'".$n_operacion."'"; ?>);
                $('#n_cuenta').text(<?php echo "'".$n_cuenta."'"; ?>);
                $('#operacion').text(<?php echo "'". $operacion."'"; ?>);
                $('#monto_op').text(<?php echo "'".$monto_op."'"; ?>);
                $('#max_giro').text(<?php echo "'".$max_giro."'"; ?>);
                $('#disponible').text(<?php echo "'".$disponible."'"; ?>);
                $('#saldo_total').text(<?php echo "'".$saldo_total."'"; ?>);
                $('#resultado').text('OPERACION REALIZADA');
                $('#resultado').css('color', '#3c763d');
                $('#recibo').show()
                $('#consulta').show()
                }
                else{
                    $('#mensaje').hide();
                    $('#resultado').text('No se pudo completar la transacción, valide los datos.');
                    $('#error').text('Error: '+<?php echo "'".$res_erorr."'"; ?>);
                    $('#resultado').css('color', 'red');
                    $('#consulta').show()
                }

            }

            
        }          
    });

    function goto_paso(){
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="GIRO";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth; 
    }

    function otra_Operacion(){
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="RH_CONSULTA_OTRAOPERACION";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		//console.log(pth);
        location.href = "index.php?"+pth; 
    }

    function descarga(){
        $('#acc').val('DESCARGA_GIRO');
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="DESCARGA_GIRO";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		//console.log(pth);
        window.open("index.php?"+pth); 
    }

   





</script>




