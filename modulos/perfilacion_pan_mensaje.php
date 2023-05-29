<?php
    $from = '';
    if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
  
    if($from == 'CMR'){
        $goto = 'index.php?'.util::encodeParamURL('pth=tarjeta_CMR'); 
    
    }
    else{
        $goto = 'index.php?'.util::encodeParamURL('pth=perfilacion_pan'); 
    }
  
?>

<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:60px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">TARJETA ERRONEA</h3>
                <span id="div_work"></span>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a href="<?php echo $goto; ?>">VOLVER A INGRESAR TARJETA</a>
                    </h4>
                </div>
            </td>
        </tr>
		<tr>
            <td style="width:50%;"></td>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <h4 class="poppins hover-color3 text-right">
                        <a  href="index.php?">INICIO</a>
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
