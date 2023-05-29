<?php
  $from = $_REQUEST["from"];
  $rut_param = $_REQUEST["rut"];
  $dv = $_REQUEST["dv"];
  $cta1 = $_REQUEST["cta1"];
  $cta2 = $_REQUEST["cta2"];
  $cta3 = $_REQUEST["cta3"];
  if ($from != 'cliente-CAMBIOCLAVE') $from = 'cliente-CAMBIOCLAVE';
  //echo $from;
  $cta1_codigo = $cta1;
  $cta2_codigo = $cta2;
  $cta3_codigo = $cta3;
  if($cta1 == 'AB') $cta1 = 'CUENTA CORRIENTE';
  else if($cta1 == 'AC') $cta1 = 'CUENTA VISTA';
  else if($cta1 == 'AD') $cta1 = 'CUENTA DE AHORRO';
  else $cta1 = '';
  if($cta2 == 'AB') $cta2 = 'CUENTA CORRIENTE';
  else if($cta2 == 'AC') $cta2 = 'CUENTA VISTA';
  else if($cta2 == 'AD') $cta2 = 'CUENTA DE AHORRO';
  else $cta2 = '';
  if($cta3 == 'AB') $cta3 = 'CUENTA CORRIENTE';
  else if($cta3 == 'AC') $cta3 = 'CUENTA VISTA';
  else if($cta3 == 'AD') $cta3 = 'CUENTA DE AHORRO';
  else $cta3 = '';
 
  $pth1 = 'index.php?'.util::encodeParamURL('pth=cambio_clave_1&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta1.'&co_cta='.$cta1_codigo.'&from='.$from);
  $pth2 = $cta2 != ''? 'index.php?'.util::encodeParamURL('pth=cambio_clave_1&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta2.'&co_cta='.$cta2_codigo.'&from='.$from) : '#';
  $pth3 = $cta3 != ''? 'index.php?'.util::encodeParamURL('pth=cambio_clave_1&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta3.'&co_cta='.$cta3_codigo.'&from='.$from) : '#';

  $volver_menu = '<td style="width:50%;">
  <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
      <h4 class="poppins hover-color3 text-left">
      <a class="m-0" style="color:white;" href="#">SIN PRODUCTO</a>
      </h4>
  </div>
  </td>';

$clave = '<td style="width:50%;">
<div class="teaser with_border rounded text-center" style="cursor: pointer;" >
<h4 class="poppins hover-color3 text-right">
<a class="m-0" href="index.php?'.util::encodeParamURL("pth=cambio_clave_1&rut=".$rut_param."&dv=".$dv."&cta=multiclave&co_cta=MC&from=".$from).'">MULTICLAVE</a>
</h4>
</div>
</td>';
  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"> 
                 POR FAVOR SELECCIONE EL PRODUCTO CON EL QUE DESEA OPERAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  href="<?php echo $pth1; ?>">
                            <?php echo $cta1;  ?>
                        </a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a style="<?php if($cta2 == '') echo 'color:white'; else echo ''; ?>"   
                    href="<?php echo $pth2; ?>"><?php if($cta2 == '') echo 'SIN PRODUCTO'; else echo $cta2;  ?></a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-left">
                    <a style="<?php if($cta3 == '') echo 'color:white'; else echo ''; ?>"  
                     href="<?php echo $pth3; ?>"><?php if($cta3 == '')echo 'SIN PRODUCTO'; else echo $cta3;  ?></a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right"></h4>
                        <a style="color:white;" href="#">SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-left"></h4>
                        <a class="m-0" style="color:white;" href="#">SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
            <?php echo $clave; ?>


        </tr>
        <tr>
            <?php echo $volver_menu; ?>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a onclick="javascript:volver();">VOLVER</a>
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
        window.history.back();
    }
</script>

