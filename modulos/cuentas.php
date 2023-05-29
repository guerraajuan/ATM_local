<?php
    $from = $_REQUEST["from"];
    $rut_param = $_REQUEST["rut"];
    $dv = '';
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    $cta1 ='';
    $cta2 ='';
    $cta3 ='';
    $ncta1 ='';
    $ncta2 ='';
    $ncta3 ='';

    $tarjeta1 ='';
    $tarjeta2 ='';
    $tarjeta3 ='';

    if(isset($_REQUEST["cta1"])) $cta1 = $_REQUEST["cta1"];
    if(isset($_REQUEST["cta2"])) $cta2 = $_REQUEST["cta2"];
    if(isset($_REQUEST["cta3"])) $cta3 = $_REQUEST["cta3"];

    if(isset($_REQUEST["ncta1"])) $ncta1 = $_REQUEST["ncta1"];
    if(isset($_REQUEST["ncta2"])) $ncta2 = $_REQUEST["ncta2"];
    if(isset($_REQUEST["ncta3"])) $ncta3 = $_REQUEST["ncta3"];

    if(isset($_REQUEST["tarj1"])) $tarjeta1 = $_REQUEST["tarj1"];
    if(isset($_REQUEST["tarj2"])) $tarjeta2 = $_REQUEST["tarj2"];
    if(isset($_REQUEST["tarj3"])) $tarjeta3 = $_REQUEST["tarj3"];


    $cta1_codigo = $cta1;
    $cta2_codigo = $cta2;
    $cta3_codigo = $cta3;
    if($cta1 == 'AB') $cta1 = 'CUENTA CORRIENTE';
    else if($cta1 == 'AC') $cta1 = 'CUENTA VISTA';
    else if($cta1 == 'AD') $cta1 = 'CUENTA AHORRO';
 
    if($cta2 == 'AB') $cta2 = 'CUENTA CORRIENTE';
    else if($cta2 == 'AC') $cta2 = 'CUENTA VISTA';
    else if($cta2 == 'AD') $cta2 = 'CUENTA AHORRO';
  
    if($cta3 == 'AB') $cta3 = 'CUENTA CORRIENTE';
    else if($cta3 == 'AC') $cta3 = 'CUENTA VISTA';
    else if($cta3 == 'AD') $cta3 = 'CUENTA AHORRO';

//PARA LA SEGUNDA TRANSACCION DE DEPOSITO CON FROM DEPOSITO
	if($from == 'DEPOSITO'){

		if($cta1_codigo == 'CUENTA CORRIENTE') $cta1_codigo = 'AB';
    	else if($cta1_codigo == 'CUENTA VISTA') $cta1_codigo = 'AC';
 	   	else if($cta1_codigo == 'CUENTA AHORRO') $cta1_codigo = 'AD'	;

 	   	if($cta2_codigo == 'CUENTA CORRIENTE') $cta2_codigo = 'AB';	
    	else if($cta2_codigo == 'CUENTA VISTA') $cta2_codigo = 'AC';
    	else if($cta2_codigo == 'CUENTA AHORRO') $cta2_codigo = 'AD';
  
    	if($cta3_codigo == 'CUENTA CORRIENTE') $cta3_codigo = 'AB';
    	else if($cta3_codigo == 'CUENTA VISTA') $cta3_codigo = 'AC';
    	else if($cta3_codigo == 'CUENTA AHORRO') $cta3_codigo = 'AD';
	}

    if($from == 'DEPOSITO'){
        $pth1 = 'index.php?'.util::encodeParamURL('pth=forma_deposito&from=DEPOSITO&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta1.'&co_cta='.$cta1_codigo.'&ncta='.$ncta1.'&tarj='.$tarjeta1.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3);

        $pth2 = $cta2 != ''? 'index.php?'.util::encodeParamURL('pth=forma_deposito&from=DEPOSITO&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta2.'&co_cta='.$cta2_codigo.'&ncta='.$ncta2.'&tarj='.$tarjeta2.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3) : '#';

        $pth3 = $cta3 != ''? 'index.php?'.util::encodeParamURL('pth=forma_deposito&from=DEPOSITO&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta3.'&co_cta='.$cta3_codigo.'&ncta='.$ncta3.'&tarj='.$tarjeta3.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3) : '#';
        
        $volver_menu = '<td style="width:50%;">
        <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
            <h4 class="poppins hover-color3 text-left">
                <a class="m-0" href="index.php?'.util::encodeParamURL("pth=banco_falabella").'">VOLVER AL MENÚ PRINCIPAL</a>
            </h4>
        </div>
        </td>';
        $clave = '<td style="width:50%;">
        <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
            <h4 class="poppins hover-color3 text-right"></h4>
                <a class="m-0" style="color:white;" href="#">SIN PRODUCTO</a>
            </h4>
        </div>
        </td>';

    }else if($from == 'cliente' || $from == 'CLIENTE-CONSULTASALDO'){
        $pth1 = 'index.php?'.util::encodeParamURL('pth=cliente_cuenta&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta1.'&co_cta='.$cta1_codigo.'&from='.$from.'&cta1='.$cta1_codigo.'&cta2='.$cta2_codigo.'&cta3='.$cta3_codigo.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&ncta='.$ncta1.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta1);

        $pth2 = $cta2 != ''? 'index.php?'.util::encodeParamURL('pth=cliente_cuenta&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta2.'&co_cta='.$cta2_codigo.'&from='.$from.'&cta1='.$cta1_codigo.'&cta2='.$cta2_codigo.'&cta3='.$cta3_codigo.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&ncta='.$ncta2.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta2) : '#';
        
        $pth3 = $cta3 != ''? 'index.php?'.util::encodeParamURL('pth=cliente_cuenta&rut='.$rut_param.'&dv='.$dv.'&cta='.$cta3.'&co_cta='.$cta3_codigo.'&from='.$from.'&cta1='.$cta1_codigo.'&cta2='.$cta2_codigo.'&cta3='.$cta3_codigo.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&ncta='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta3) : '#';

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
        <a class="m-0" href="index.php?'.util::encodeParamURL("pth=clave&from=".$from."-CAMBIOCLAVE&cta1=".$cta1_codigo."&cta2=".$cta2_codigo."&cta3=".$cta3_codigo."&rut=".$rut_param."&dv=".$dv).'"  style="pointer-events: none; color:#CB1010; opacity: 0.5;" >OBTENCION Y CAMBIO DE CLAVE</a>
        </h4>
        </div>
        </td>';

        // echo $cta1_codigo;
        // echo $cta1;
        // echo $cta2_codigo;
         //echo $cta2;
        // echo $cta3_codigo;
         //echo $cta3;
    }
 

   
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"> 
                <?php if($from =='DEPOSITO') echo 'POR FAVOR SELECCIONE EL PRODUCTO AL QUE DESEA DEPOSITAR';
                else if($from == 'cliente') echo 'POR FAVOR SELECCIONE EL PRODUCTO CON EL QUE DESEA OPERAR'; ?> </h3>
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
                        <a class="m-0" href="index.php?">SALIR</a>
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



