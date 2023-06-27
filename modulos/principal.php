<table>
    <thead>
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:100px; padding-top:100px;" colspan="2" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE LA INSTITUCIÓN CON QUE DESEA OPERAR</h3>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width:50%;">
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <div class="teaser_icon main_bg_color2 round size_small offset_icon">
                        <i>1</i>
                    </div>
                    <h4 class="poppins hover-color2 text-left">
                        <a class="" href="index.php?<?php echo util::encodeParamURL('pth=banco_falabella'); ?>">CUENTAS</a>
                    </h4>
                </div>
            </td>
            <td  style="width:50%;" >
                <div class="teaser with_border rounded text-center" style="cursor: pointer;" onclick="">
                    <div class="teaser_icon main_bg_color3 round size_small offset_icon">
                        <i>2</i>
                    </div>
                    <h4 class="poppins hover-color3 text-right">
                        <a href="index.php?<?php echo util::encodeParamURL('pth=tarjeta_CMR'); ?>">CMR</a>
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



