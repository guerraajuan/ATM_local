<?php
    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];


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

?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR INGRESE EL MONTO QUE DESEA RETIRAR </h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
				<div class="form-group">
					<input type="number" aria-required="true"  value=""  name="otro_monto" id="otro_monto" class="form-control text-center" placeholder="Ingrese Monto">
				</div>
            </td>
        </tr>
        <tr>
            <td colspan="2">                
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-center" style="color:#3c763d;">¿ESTÁ CORRECTO?</h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:get_otro_monto();">SI</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  onclick="javascript:limpiar();">NO</a>
                    </h4>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="GIRO_OTROMONTO" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>" />
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" /> 
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="monto" name="monto" value="" />

    <input type="hidden" id="cta1" name="cta1" value="<?php echo $cta1; ?>" />
    <input type="hidden" id="cta2" name="cta2" value="<?php echo $cta2; ?>" />
    <input type="hidden" id="cta3" name="cta3" value="<?php echo $cta3; ?>" />
    <input type="hidden" id="ncta" name="ncta" value="<?php echo $ncta; ?>" />
    <input type="hidden" id="ncta1" name="ncta1" value="<?php echo $ncta1; ?>" />
    <input type="hidden" id="ncta2" name="ncta2" value="<?php echo $ncta2; ?>" />
    <input type="hidden" id="ncta3" name="ncta3" value="<?php echo $ncta3; ?>" />
    <input type="hidden" id="tarj" name="tarj" value="<?php echo $tarjeta; ?>" />
    <input type="hidden" id="tarj1" name="tarj1" value="<?php echo $tarjeta1; ?>" />
    <input type="hidden" id="tarj2" name="tarj2" value="<?php echo $tarjeta2; ?>" />
    <input type="hidden" id="tarj3" name="tarj3" value="<?php echo $tarjeta3; ?>" />
</from>

<script type="text/javascript">



	function limpiar(){
		$('#otro_monto').val('');
		$('#otro_monto').focus();
	}

	function get_otro_monto(){
        let monto = $('#otro_monto').val();
        $('#monto').val(monto);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="CLIENTE_GIRO";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth;  
		
		

	}

	

</script>