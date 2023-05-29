<?php

    $from = $_REQUEST["from"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    /*echo $from;
    echo $rut;
    echo $dv;
    echo $cta;
    echo $co_cta;*/

?>


<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE EL MONTO QUE DESEA RETIRAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_monto(10000);" >$ 10.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(100000);">$ 100.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                        <a onclick="javascript:get_monto(20000);">$ 20.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;">
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(150000);">$ 150.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
        <td style="width:50%;">
                <div class="teaser with_border rounded text-center pt-0 m-0" style="cursor: pointer;" >
                    <h4 class="poppins hover-color2 text-left m-0 p-0">
                    <a onclick="javascript:get_monto(30000);">$ 30.000</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" >
                    <h4 class="poppins hover-color3 text-right">
                    <a onclick="javascript:get_monto(800000);">$ 800.000</a>
                    </h4>
                </div>
            </td>
        </tr>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center">
                    <h4 class="poppins hover-color3 text-left">
                    <a href="index.php?<?php echo util::encodeParamURL('pth=cliente_giro_otromonto&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta); ?>">OTRO MONTO</a>
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
<form name="frm_4" id="frm_4"  class="contact-form row columns_margin_bottom_20" >
    <input type="hidden" id="acc" name="acc" value="CLIENTE_GIRO" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>"/>
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" /> 
    <input type="hidden" id="monto" name="monto" value="" />
</from>

<script>
    function volver(){
        window.history.back();
    }
    function get_monto(monto){
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
