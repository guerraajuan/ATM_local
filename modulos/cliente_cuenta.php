<?php

    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    $cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];

    $ncta ='';
    $ncta1 ='';
    $ncta2 ='';
    $ncta3 ='';

    $tarjeta ='';
    $tarjeta1 ='';
    $tarjeta2 ='';
    $tarjeta3 ='';

    if(isset($_REQUEST["ncta"])) $ncta = $_REQUEST["ncta"];
    if(isset($_REQUEST["ncta1"])) $ncta1 = $_REQUEST["ncta1"];
    if(isset($_REQUEST["ncta2"])) $ncta2 = $_REQUEST["ncta2"];
    if(isset($_REQUEST["ncta3"])) $ncta3 = $_REQUEST["ncta3"];

    if(isset($_REQUEST["tarj"])) $tarjeta = $_REQUEST["tarj"];
    if(isset($_REQUEST["tarj1"])) $tarjeta1 = $_REQUEST["tarj1"];
    if(isset($_REQUEST["tarj2"])) $tarjeta2 = $_REQUEST["tarj2"];
    if(isset($_REQUEST["tarj3"])) $tarjeta3 = $_REQUEST["tarj3"];
    //echo $co_cta;
    /*echo $rut;
    echo $dv;
    echo $cta;*/
    //echo $ncta;

?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"><?php echo $cta; ?></h3>
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE LA OPERACION QUE DESEA REALIZAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=cliente_giro&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3); ?>">GIRO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=rh_consultasaldo_espera&from=CLIENTE-CONSULTASALDO&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&paso=1&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta); ?>">CONSULTA DE SALDO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=pago_deposito'); ?>" style="pointer-events: none; color:#CB1010; opacity: 0.5;">PAGOS</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=forma_deposito&from=CLIENTE-DEPOSITO&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta); ?>">DEPOSITOS</a>
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
                        <a style="color:white;" href="#">#</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:volver();">VOLVER</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="" />
    <input type="hidden" id="sel" name="sel" value="" />
</from>

<script>
    function volver(){
        console.log('ad');
        window.history.back();
    }

</script>
