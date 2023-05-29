<?php
    $from = "";
    $rut= "";
    $dv = "";
    $nombre = "";
    $tarjeta = "";
    $estado = "";
    $fecha_1 ="";
    $monto_1 ="";
    $fecha_2 ="";
    $monto_2 ="";
    $fecha_3 ="";
    $monto_3 ="";
    $fecha_4 ="";
    $monto_4 ="";
    $monto="";
    $cuotas="";
    $paso="4";

    $atm_sel ='';
    


    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"];

    if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
    if(isset($_REQUEST["estado"])) $estado = $_REQUEST["estado"];

    if(isset($_REQUEST["fecha_1"])) $fecha_1 = $_REQUEST["fecha_1"];
    if(isset($_REQUEST["fecha_2"])) $fecha_2 = $_REQUEST["fecha_2"];
    if(isset($_REQUEST["fecha_3"])) $fecha_3 = $_REQUEST["fecha_3"];
    if(isset($_REQUEST["fecha_4"])) $fecha_4 = $_REQUEST["fecha_4"];

    if(isset($_REQUEST["monto_1"])) $monto_1 = $_REQUEST["monto_1"];
    if(isset($_REQUEST["monto_2"])) $monto_2 = $_REQUEST["monto_2"];
    if(isset($_REQUEST["monto_3"])) $monto_3 = $_REQUEST["monto_3"];
    if(isset($_REQUEST["monto_4"])) $monto_4 = $_REQUEST["monto_4"];

    if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];
    if(isset($_REQUEST["cuotas"])) $cuotas = $_REQUEST["cuotas"];

    if (isset($_SESSION['atm_sel'])) $atm_sel = $_SESSION['atm_sel'];

  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:25px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"> 
                CUANDO LE GUSTARIA  COMENZAR A PAGAR </br> MONTO: $ <?php echo number_format(intval($monto), 0, ",", "."); ?> </br> <?php echo $cuotas; ?> CUOTAS DE
                </h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  onclick="javascript:get_seleccion('0');">
                            <?php echo $fecha_1; ?> </br>
                            <?php echo $monto_1; ?>
                        </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" href="#">SIN PRODUCTO </br> SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  onclick="javascript:get_seleccion('101');">
                            <?php echo $fecha_2; ?> </br>
                            <?php echo $monto_2; ?>
                        </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" href="#">SIN PRODUCTO </br> SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  onclick="javascript:get_seleccion('102');">
                            <?php echo $fecha_3; ?> </br>
                            <?php echo $monto_3; ?>
                        </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white;" href="#">SIN PRODUCTO </br> SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  onclick="javascript:get_seleccion('103');">
                            <?php echo $fecha_4; ?> </br>
                            <?php echo $monto_4; ?>
                        </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=avance_cuotas_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&monto='.$monto); ?>">VOLVER</br> <span style="color:white;">SIN PRODUCTO</span></a>
                    </h4>
                </div>
            </td>
        </tr>



    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="ESPERACMR" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="tarjeta" name="tarjeta" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="monto" name="monto" value="<?php echo $monto; ?>" />
    <input type="hidden" id="cuotas" name="cuotas" value="<?php echo $cuotas; ?>" />
    <input type="hidden" id="seleccion" name="seleccion" value="<?php echo $seleccion; ?>" />
    <input type="hidden" id="paso" name="paso" value="<?php echo $paso; ?>" />
    <input type="hidden" id="nombre" name="nombre" value="<?php echo $nombre; ?>" />
    <input type="hidden" id="atm_sel" name="atm_sel" value="<?php echo $atm_sel; ?>" />

</from>

<script>
    function get_seleccion(seleccion){
        console.log(seleccion);
        $('#seleccion').val(seleccion);
        msjError = "No pudimos realizar lo solicitado";
	    urlIn = "./srv/sistema.php";
	    formalioID = "frm_4";
	    srv="ESPERACMR";
	    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
	    console.log(pth);
        location.href = "index.php?"+pth;



    }


            


        
    
</script>




