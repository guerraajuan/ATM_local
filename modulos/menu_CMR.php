<?php

    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $tarjeta = $_REQUEST["tarjeta"];
    $avance = $_REQUEST["avance"];
    $super = $_REQUEST["super"];
    $nombre = $_REQUEST["nombre"];
    
?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE EL PRODUCTO CON QUE DESEA OPERAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=avance_montos_CMR&from=AVANCECMR&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre); ?>">AVANCE EFECTIVO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=credito_consumo_montosCMR&from=SACMR&rut='.$rut.'&dv='.$dv.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre ); ?>" >CREDITO DE CONSUMO</a>
                        
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=espera_CMR&from=SALDOCMR&rut='.$rut.'&dv='.$dv.'&tarjeta='.$tarjeta.'&paso=1'); ?>">CONSULTA DE SALDO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=cambio_clave_1_CMR&rut='.$rut.'&dv='.$dv.'&tarjeta='.$tarjeta.'&avance='.$avance.'&super='.$super); ?>" style="pointer-events: none; color:#CB1010; opacity: 0.5;">CAMBIO DE CLAVE</a>
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
                        <a  href="#">SALIR</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  >VOLVER</a>
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


