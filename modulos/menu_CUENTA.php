<?php
    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $tarjeta = $_REQUEST["tarjeta"];
    $cta = $_REQUEST["cta"];
    $n_cta = $_REQUEST["n_cta"];
    $nombre = $_REQUEST["nombre"];

   
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:40px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE LA OPERACION QUE DESEA REALIZAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=avance_montos_CMR&from=AVANCECMR&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre); ?>">GIRO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=credito_consumo_montosCMR&from=SACMR&rut='.$rut.'&dv='.$dv.'&super='.$super.'&tarjeta='.$tarjeta.'&nombre='.$nombre ); ?>" >CONSULTA DE SALDO</a>
                        
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a >CAMBIO DE CLAVE</a>
                    </h4>
                </div>
            </td>
        </tr>

        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  >SALIR</a>
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




