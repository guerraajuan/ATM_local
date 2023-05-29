<?php
  $tarjeta = '';
  $from = '';
  $tarjeta_cmr = '';
  if(isset($_REQUEST["pan"])) $tarjeta = $_REQUEST["pan"];
  if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
  if(isset($_REQUEST["tarjeta"])) $tarjeta_cmr = $_REQUEST["tarjeta"];

  if($from == 'PERFILACIONPAN'){
    $numero_secreto = 'index.php?'.util::encodeParamURL('pth=clave_perfilacionpan&from=PERFILACIONPAN&pan='.$tarjeta); 
    $huella = 'index.php?'.util::encodeParamURL('pth=huella&from=PERFILACIONPAN&pan='.$tarjeta); 
  }
  else if ($from == 'TARJETA_CMR'){
    $numero_secreto = 'index.php?'.util::encodeParamURL('pth=clave_CMR&from=PERFILACIONCMR&tarjeta='.$tarjeta_cmr); 
    $huella = 'index.php?'.util::encodeParamURL('pth=mensaje_huella_CMR'); 
    $des = 'style="pointer-events: none; color:#CB1010; opacity: 0.5;"';

  }
 
  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">SR, CLIENTE: </br></br> POR FAVOR, ESCOJA SU FORMA DE INGRESO</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a  href="<?php echo $numero_secreto; ?>">NUMERO SECRETO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="<?php echo $huella; ?>"  <?php if($from =='TARJETA_CMR' ) echo $des   ?> >HUELLA</a>
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


