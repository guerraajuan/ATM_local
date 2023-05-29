<?php

$rut = $_REQUEST["rut"];
$dv = $_REQUEST["dv"];
$from = $_REQUEST["from"];

$cta = $_REQUEST["cta"];
$co_cta = $_REQUEST["co_cta"];

$cta1 = $_REQUEST["cta1"];
$cta2 = $_REQUEST["cta2"];
$cta3 = $_REQUEST["cta3"];

$ncta = $_REQUEST["ncta"];
$ncta1 = $_REQUEST["ncta1"];
$ncta2 = $_REQUEST["ncta2"];
$ncta3 = $_REQUEST["ncta3"];

$tarjeta = $_REQUEST["tarj"];
$tarjeta1 = $_REQUEST["tarj1"];
$tarjeta2 = $_REQUEST["tarj2"];
$tarjeta3 = $_REQUEST["tarj3"];

$total = $_REQUEST["total"];
$cant_1 = $_REQUEST["cant_1"];
$cant_2 = $_REQUEST["cant_2"];
$cant_5 = $_REQUEST["cant_5"];
$cant_10 = $_REQUEST["cant_10"];
$cant_20 = $_REQUEST["cant_20"];



if($cant_1 == '') $cant_1 = 0;
if($cant_2 == '') $cant_2 = 0;
if($cant_5 == '') $cant_5 = 0;
if($cant_10 == '') $cant_10 = 0;
if($cant_20 == '') $cant_20 = 0;


// echo $from.'</br>';
// echo $rut.'</br>';
// echo $dv.'</br>';
// echo $cta.'</br>';
// echo $co_cta.'</br>';




?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">CONFIRME SI LA CANTIDAD INGRESADA ES CORRECTA</h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">¿ESTÁ CORRECTO?</h4>
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;"><?php echo $total; ?></h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?<?php echo util::encodeParamURL('pth=deposito_efectivo&rut='.$rut.'&dv='.$dv.'&from='.$from.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&total='.$total.'&cant_1='.$cant_1.'&cant_2='.$cant_2.'&cant_5='.$cant_5.'&cant_10='.$cant_10.'&cant_20='.$cant_20.'&paso=1'); ?>">SI</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?<?php echo util::encodeParamURL('pth=ingreso_efectivo&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta); ?>">NO</a>
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