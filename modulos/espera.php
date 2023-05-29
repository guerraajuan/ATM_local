<?php
  $from = $_REQUEST["from"];
  $rut = $_REQUEST["rut"];
  $dv = $_REQUEST["dv"];
  $cta = $_REQUEST["cta"];
  $co_cta = $_REQUEST["co_cta"];
  $pass = $_REQUEST["pass"];
  $paso = '0';
  $pass_2 = '';
  $intentos = 0;
  if(isset($_REQUEST["pass_2"])) $pass_2 = $_REQUEST["pass_2"]; 
  if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"];
  if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];
  //echo $intentos;


  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;"> 
                 POR FAVOR </br> ESPERE UN MOMENTO</h3>
            </th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>
<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="CAMBIO_CLAVE" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="rut" name="rut" value="<?php echo $rut; ?>" />
    <input type="hidden" id="dv" name="dv" value="<?php echo $dv; ?>" />
    <input type="hidden" id="cta" name="cta" value="<?php echo $cta; ?>" />
    <input type="hidden" id="co_cta" name="co_cta" value="<?php echo $co_cta; ?>" /> 
    <input type="hidden" id="from" name="from" value="<?php echo $from; ?>" />
    <input type="hidden" id="pass" name="pass" value="<?php echo $pass; ?>"/>
    <input type="hidden" id="pass_2" name="pass_2" value="<?php echo $pass_2; ?>"/>
    <input type="hidden" id="paso" name="paso" value="<?php echo $paso; ?>"/>
    <input type="hidden" id="intentos" name="intentos" value="<?php echo $intentos; ?>"/>
</from>

<script>
  

    document.addEventListener("DOMContentLoaded", function(event) {
        let paso = $('#paso').val();
        if(paso == 1){
            $('#paso').val('2');
            setTimeout(goto_paso, 1500);
        }
        else if(paso == 4){
            let pass_1 = $('#pass').val();
            let pass_2 = $('#pass_2').val();
            let intentos = $('#intentos').val();
            console.log(pass_1);
            console.log(pass_2);
            if(pass_1 == pass_2) 
                $('#paso').val('5');
            else{
                $('#paso').val('6');
                console.log(intentos);
                if(intentos != 0){
                    intentos = parseInt(intentos) +1;
                    $('#intentos').val(intentos);
                    if(intentos >= 3) 
                        $('#paso').val('7');
                    else 
                        $('#paso').val('6');
                }
                else
                $('#intentos').val(1);
            }
            setTimeout(goto_paso, 1500);
        }
        
    }); 

    function goto_paso(){
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="CAMBIO_CLAVE";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth; 
    }

   





</script>

