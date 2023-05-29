
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
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SELECCIONE EL MONTO A RETIRAR
                </br>MONTO DISPONIBLE: $ <?php echo number_format(intval($super), 0, ",", "."); ?>
                </br>MONTO MAXIMO POR GIRO: $ 800.000
            </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color2 text-left">
                        <a onclick="javascript:get_monto(100000);" >$ 100.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:get_monto(120000);" >$ 120.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left ">
                        <a onclick="javascript:get_monto(150000);" >$ 150.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:get_monto(800000);" >$ 800.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right"><a style="color:white;" href="#">#</a></h4>
                </div></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right"><a style="color:white;" href="#">#</a></h4>
                </div></td></td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center">
                    <h4 class="poppins hover-color3 text-left">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=credito_consumo_otro_montoCMR&from=SACMR&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre); ?>">OTRO MONTO</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=menu_CMR&from=SACMR&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre); ?>">VOLVER </a>
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

<script>
    function get_monto(monto){
        $('#monto').val(monto);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="SUPER_AVANCE_CMR";
		var resp = getDataJsonSbm(urlIn,formalioID,srv,msjError);
        // console.log(resp);
        // return false;
        let cod = resp[2];
        let respuesta = resp[1];
        let cuotas;
        let cuotas_normal = new Map();
        let cuotas_diferido = new Map();
            
        if(cod == 1){
            cuotas = respuesta['cuota'];
            for(let i = 0 ; i<cuotas.length; i++){
                if(cuotas[i]['tipo'] == 'normal'){
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

</script>



