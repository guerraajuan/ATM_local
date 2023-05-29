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

    // echo $from.'</br>';
    // echo $rut.'</br>';
    // echo $dv.'</br>';
    // echo $cta.'</br>';
    // echo $co_cta.'</br>';


?>

<table>
    <thead>
        <tr>
            <th class="text-center p-0"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h2 class="poppins" style="color:#3c763d;">INGRESE BILLETES</h2>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <label class="poppins hover-color3 text-center"><b>$20.000</b></label>
                    <input type="number" aria-required="true" max="99"  onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }"  value=""  name="efec_20" id="efec_20" class="form-control text-center" placeholder="Cantidad Biilletes">
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <label class="poppins hover-color3 text-center"><b>$10.000</b></label>
                    <input type="number" aria-required="true" max="99"  onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }" value=""  name="efec_10" id="efec_10" class="form-control text-center" placeholder="Cantidad Biilletes">
                </div>
            </td>
        </tr>

        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <label class="poppins hover-color3 text-center"><b>$5.000</b></label>
                    <input type="number" aria-required="true" max="99"  onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }"  value=""  name="efec_5" id="efec_5" class="form-control text-center" placeholder="Cantidad Biilletes">
                </div>
            </td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <label class="poppins hover-color3 text-center"><b>$2.000</b></label>
                    <input type="number" aria-required="true"  max="99"  onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }" value=""  name="efec_2" id="efec_2" class="form-control text-center" placeholder="Cantidad Biilletes">
                </div>
            </td>
        </tr>

        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <label class="poppins hover-color3 text-center"><b>$1.000</b></label>
                    <input type="number" aria-required="true" max="99"  onkeyup="if(parseInt(this.value)>99){ this.value =99; return false; }"  value=""  name="efec_1" id="efec_1" class="form-control text-center" placeholder="Cantidad Biilletes">
                </div>
            </td>
            <td style="width:50%;">
                
                    <div  class="text-right mt-3">
                        <button type="button" onclick="get_billetes();" >AVANZAR</button>
                    </div>
            </td>

        </tr>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  class="contact-form row columns_margin_bottom_20" >
    <input type="hidden" id="acc" name="acc" value="DEPOSITO_EFECTIVO" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv ?>" />
    <input type="hidden" id="from" name="from" value="<?php echo $from ?>" />
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta ?>" />

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

    <input type="hidden" id="total" name="total" value="" /> 
    <input type="hidden" id="cant_1" name="cant_1" value="" /> 
    <input type="hidden" id="cant_2" name="cant_2" value="" /> 
    <input type="hidden" id="cant_5" name="cant_5" value="" /> 
    <input type="hidden" id="cant_10" name="cant_10" value="" /> 
    <input type="hidden" id="cant_20" name="cant_20" value="" /> 
</from>

<script>
    function get_billetes(rut,cta){
        let cant_20 = $('#efec_20').val();
        let cant_10 = $('#efec_10').val();
        let cant_5 = $('#efec_5').val();
        let cant_2 = $('#efec_2').val();
        let cant_1 = $('#efec_1').val();
        if(cant_20 == '' && cant_10 == '' && cant_5 == '' && cant_2 == '' && cant_1 == '' ){
            $("#div_work").html("DEBE INGRESAR AL MENOS UN BILLETE");
            $('#div_work').css('color', 'red');
        }
        else{
            let total_20 = 20000 * cant_20;
            let total_10 = 10000 * cant_10;
            let total_5 = 5000 * cant_5;
            let total_2 = 2000 * cant_2;
            let total_1 = 1000 * cant_1;
            let total = total_20 + total_10 + total_5 + total_2 + total_1;
            console.log(total);
            console.log($('#cta').val());
            $('#total').val(total);
            $('#cant_1').val(cant_1);
            $('#cant_2').val(cant_2);
            $('#cant_5').val(cant_5);
            $('#cant_10').val(cant_10);
            $('#cant_20').val(cant_20);

            msjError = "No pudimos realizar lo solicitado";
		    urlIn = "./srv/sistema.php";
		    formalioID = "frm_4";
		    srv="DEPOSITO_EFECTIVO";
		    var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		    console.log(pth);
            location.href = "index.php?"+pth;
            

        }
        
    }
</script>



