<?php
    $msj = '';
	if(isset($_REQUEST["msj"])) $msj = $_REQUEST["msj"];
    $test = '';
    if(isset($_REQUEST["pth"])) $test=$_REQUEST["pth"];
    echo $test;

   

?>

<div id="mensaje" style="display:none;">
    <p>EL ATM SELECCIONADO YA ESTA OCUPADO, FAVOR SELECCIONE UN ATM DISPONIBLE</p>
</div>


<table style="width:100%;">
    <thead >
        <tr>
            <th class="text-center"  style="color:#3c763d; padding-bottom:10px;" colspan="4" >
                <h3 class="poppins" style="color:#3c763d;">POR FAVOR SELECCIONE EL ATM CON QUE DESEA OPERAR</h3>
            </th>
        </tr>
    </thead>
    <tbody >
        <tr >
            <td >
                <div id ="atm900" atm="900"  class=" with_border rounded text-center " style="cursor: pointer;"  onclick="javascript:select_atm(900);">
                    
                    <h3 class="poppins hover-color4 text-center m-0 p-0">
                        <a >ATM 900   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado900"></p>
                </div>
            </td>
            <td >
                <div id ="atm901"  atm="901"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(901);">
                    <h3 class="poppins hover-color4 text-center">
                        <a >ATM 901   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado901"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id ="atm902"  atm="902"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(902);">
                    
                    <h3 class="poppins hover-color4 text-center m-0 p-0">
                        <a  >ATM 902   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado902"></p>
                </div>
            </td>
            <td >
                <div id ="atm903"  atm="903"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(903);">
                    <h3 class="poppins hover-color4 text-center">
                        <a >ATM 903   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado903"></p>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div id ="atm904"  atm="904"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(904);">
                    <h3 class="poppins hover-color4 text-center m-0 p-0">
                        <a  >ATM 904   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado904"></p>
                </div>
            </td>
            <td>
                <div id ="atm905"  atm="905"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(905);">
                    <h3 class="poppins hover-color4 text-center">
                        <a >ATM 905   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado905"></p>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div id ="atm906"  atm="906"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(906);">
                    
                    <h3 class="poppins hover-color4 text-center m-0 p-0">
                        <a  >ATM 906   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado906"></p>
                </div>
            </td>
            <td>
                <div id ="atm907"  atm="907"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(907);">
                    <h3 class="poppins hover-color4 text-center">
                        <a >ATM 907   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado907"></p>
                </div>
            </td>
        </tr>

        <tr>
            <td>
                <div id ="atm908"  atm="908"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(908);">
                    
                    <h3 class="poppins hover-color4 text-center m-0 p-0">
                        <a  >ATM 908   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado908"></p>
                </div>
            </td>
            <td>
                <div id ="atm909"  atm="909"  class=" with_border rounded text-center " style="cursor: pointer;" onclick="javascript:select_atm(909);">
                    <h3 class="poppins hover-color4 text-center">
                        <a >ATM 909   <i class="fa fa-desktop" aria-hidden="true"></i></a>
                    </h3>
                    <p id="estado909"></p>
                </div>
            </td>
        </tr>



        <tr>
            <td style="width:50%;">

            </td>
                <td style="width:50%;">
                    <div class="contact-form-submit topmargin_20 text-right">
                        <button id="btn_inicio" onclick="javascript:goto_inicio();" class="theme_button color1 " style="pointer-events: none; opacity: 0.5;">Ingresar</button>
                    </div>
            </td>
        </tr>

    </tbody>
</table>

<form name="frm_4" id="frm_4"  >
    <input type="hidden" id="acc" name="acc" value="GET_ATMS" />
    <input type="hidden" id="sel" name="sel" value="" />
    <input type="hidden" id="atm_sel" name="atm_sel" value="" />
    <input type="hidden" id="msj" name="msj" value="<?php echo $msj; ?>" />
    <input type="hidden" id="pth" name="pth" value="<?php echo $test; ?>" />
</from>

<script>


    document.addEventListener("DOMContentLoaded", function(event) {

        let pth_1 = $('#pth').val();
        if(pth_1 != ''){
            msjError = "No pudimos realizar lo solicitado";
            urlIn = "./srv/sistema.php";
            formalioID = "frm_4";
            srv="CIERRE";
            $("#acc").val(srv); 
            $("#sel").val(sel); 
            var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
            console.log(pth);
            location.href = "http://localhost/ATM/"; 
        }

        let msj = $('#msj').val();
        if(msj == '1') $('#mensaje').show();
        $('#btn_cerrar').css('pointer-events','none');
        estado_atms();

               
    }); 

    function estado_atms(){
        msjError = "No pudimos realizar lo solicitado";
        urlIn = "./srv/sistema.php";
        formalioID = "frm_4";
        srv="GET_ATMS";
        var atms = getDataJsonSbm(urlIn,formalioID,srv,msjError);

        for(i=0; i<atms.length; i++){
            let atm_num = atms[i]['numero'];
            if(atms[i]['ocupado']==0){
                $('#atm'+atm_num).addClass('main_bg_color4');
                $('#estado'+atm_num).text('(Disponible)');
                $('#atm'+atm_num).attr('ocupado', '0');  
            }
            else{
                $('#atm'+atm_num).addClass('main_bg_color5');
                $('#estado'+atm_num).text('(Ocupado)');
                $('#atm'+atm_num).attr('ocupado', '1');
            }
        };
    }

    function select_atm(atm){
        //maneja datos del clikeado
        let status = $('#atm'+atm).attr("ocupado");
        //el ckikeado esta disponible
        if(status == '0'){

            //Valida si ya hay alguno seleccionado y lo deja disponible
            $("div").each( function () {
            let data = $(this).attr("ocupado") ;
            if(data == 2){
                $(this).attr("ocupado",'0')
                let atm_div= $(this).attr("atm")
                $('#estado'+atm_div).text('(Disponible)');
                $(this).attr("ocupado",'0')
                $(this).removeClass('main_bg_color3').addClass( 'main_bg_color4' );
            }
            });

            $('#atm'+atm).removeClass('main_bg_color4').addClass( 'main_bg_color3' );
            $('#estado'+atm).text('(Seleccionado)');
            $('#atm'+atm).attr('ocupado', '2');
            $('#btn_inicio').css('pointer-events','');
            $('#btn_inicio').css('opacity',1);
        }
        else if(status == 2){ //Valida si se esta clikenado el ATM ya seleccionado para desmarcarlo

        }

    }

    function goto_inicio(){

        console.log('dentroo');
        //return false;


        $('div').each( function () {
            if( $(this).attr("ocupado") == 2 ){
                atm_sel= $(this).attr("atm")
            };
        });
        $('#atm_sel').val(atm_sel);
        console.log(atm_sel);
        msjError = "No pudimos realizar lo solicitado";
		urlIn = "./srv/sistema.php";
		formalioID = "frm_4";
		srv="GOTO_INICIO";
		var pth = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		console.log(pth);
        location.href = "index.php?"+pth; 
    }


</script>

