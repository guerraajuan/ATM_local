<?php
  $rut = '';
  $dv = '';
  $from = '';
  $cta = '';
  $co_cta = '';
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


  if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
  if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
  if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
  if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
  if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
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


//   echo $from.'</br>';
//   echo $rut.'</br>';
//   echo $dv.'</br>';
//   echo $cta.'</br>';
//   echo $co_cta.'</br>';


    // echo $rut_param;
    // echo $dv;
    // echo $from;
    // echo $cta;
    // echo $co_cta;
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE SU FORMA DE DEPOSITO</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a  href="index.php?<?php echo util::encodeParamURL('pth=ingreso_efectivo&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta); ?>">EFECTIVO</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                    <a style="color:white"   
                    href="#">SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
        <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right"></h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right"></h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-left">
                        <a style="color:white;" href="#">SIN PRODUCTO</a>
                    </h4>
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a class="m-0" href="index.php?<?php echo util::encodeParamURL('pth=cuentas&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&rut='.$rut.'&from='.$from.'&dv='.$dv.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3); ?>">VOLVER AL MENÚ PRINCIPAL</a>
                        
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



