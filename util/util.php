<?php
class util
{
	public static function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	public static function encodeKeyWord($palabra)
	{
		
		$ct="S";
		if(!strpos($palabra, "0") === false){$ct="N";}
		if(!strpos($palabra, "1") === false){$ct="N";}
		if(!strpos($palabra, "2") === false){$ct="N";}
		if(!strpos($palabra, "3") === false){$ct="N";}
		if(!strpos($palabra, "4") === false){$ct="N";}
		if(!strpos($palabra, "5") === false){$ct="N";}
		if(!strpos($palabra, "6") === false){$ct="N";}
		if(!strpos($palabra, "7") === false){$ct="N";}
		if(!strpos($palabra, "8") === false){$ct="N";}
		if(!strpos($palabra, "9") === false){$ct="N";}
		
		if($ct == "S")  
		{
			$palabra = str_replace("a", "0", $palabra);
			$palabra = str_replace("e", "9", $palabra);
			$palabra = str_replace("i", "8", $palabra);
			$palabra = str_replace("o", "7", $palabra);
			$palabra = str_replace("u", "6", $palabra);
			
			$palabra = str_replace("A", "5", $palabra);
			$palabra = str_replace("E", "4", $palabra);
			$palabra = str_replace("I", "3", $palabra);
			$palabra = str_replace("O", "2", $palabra);
			$palabra = str_replace("U", "1", $palabra);
		} 
		
		return ($palabra);
	}
	public static function decodeKeyWord($palabra)
	{
		$ct="S";
		if(!strpos($palabra, "a") === false){$ct="N";}
		if(!strpos($palabra, "e") === false){$ct="N";}
		if(!strpos($palabra, "i") === false){$ct="N";}
		if(!strpos($palabra, "o") === false){$ct="N";}
		if(!strpos($palabra, "u") === false){$ct="N";}
		
		if(!strpos($palabra, "A") === false){$ct="N";}
		if(!strpos($palabra, "E") === false){$ct="N";}
		if(!strpos($palabra, "I") === false){$ct="N";}
		if(!strpos($palabra, "O") === false){$ct="N";}
		if(!strpos($palabra, "U") === false){$ct="N";}
		
		if($ct == "S")
		{
			$palabra = str_replace("0", "a", $palabra);
			$palabra = str_replace("9", "e", $palabra);
			$palabra = str_replace("8", "i", $palabra);
			$palabra = str_replace("7", "o", $palabra);
			$palabra = str_replace("6", "u", $palabra);
			
			$palabra = str_replace("5", "A", $palabra);
			$palabra = str_replace("4", "E", $palabra);
			$palabra = str_replace("3", "I", $palabra);
			$palabra = str_replace("2", "O", $palabra);
			$palabra = str_replace("1", "U", $palabra);
		}
		
		return ($palabra);
	}
	/**
     * util::decodeParamURL($string)
     * [13-01-2016]-DOO: Decodifica los parametros de la URL
     * Version: 1.0
     * Estado: En Operacion
     * @param mixed $string: Parametros de la URL encriptado
     * @1q	return retorna la URL decodificada
     */
    public static function decodeParamURL($string)
    {
        $string = base64_decode($string);
        $string= self::decodeKeyWord($string);
        
        $cad_get = explode("&",$string); //separo la url por &
        foreach($cad_get as $value)
        {
            $val_get = explode("=",$value); //asigno los valosres al GET
            $_REQUEST[$val_get[0]]=utf8_decode($val_get[1]);
        }
    }
    public static function validaSession($vuelve) 
    {
    	if(!isset($_SESSION["IGT-usuarioid"]))
    	{	
    		$url = $vuelve.'/login.php';
    		header('Location: ' . $url, true, 301);    		
    		exit();
    	}
    }
    public static function encodeParamURL($urlParam)
    {
    	
    	$urlParam = self::encodeKeyWord($urlParam);
    	return  "qwerty=".base64_encode($urlParam);
    }
    public static function validaFuncionApps($aplicacionid)
    {
    	$apps = $_SESSION["IGT-perfil_obj"];
    	$salida = "NO";
    	foreach ($apps as $a)
    	{
    		if($aplicacionid == $a["aplicacionid"])
    		{
    			$salida = "SI";
    		}
    		
    	}
    	
    	return $salida;
    }
    public static function getMenu5($level,$gof)    
    {
    	
    	$vuelve=self::getLevel($level);
		//Se habilita solo cuando requieran autenticación
    	
     	$dpl = '';	
     
     
   
     
    return $dpl;
    }
    

    public static function getHeadHtml($level,$descripcion,$validaSession='si'){

    	$vuelve=self::getLevel($level);      
    	if($validaSession == 'si')
    	{
    		//Valida session
    		self::validaSession($vuelve);
    		
    	}
        $html= '
					<meta charset="utf-8">
				    <title>'.$descripcion.'- Biblioteca de datos</title>
				    <meta name="viewport" content="width=device-width, initial-scale=1.0">
				    <meta name="description" content="">
				    <meta name="author" content="ImaginaSoft Chile 2018">
			
				    <!-- Bootstrap core CSS -->
				    <link href="'.$vuelve.'bootstrap/css/bootstrap.min.css" rel="stylesheet">
					
					<!-- Font Awesome -->
					<link href="'.$vuelve.'css/font-awesome.min.css" rel="stylesheet">
			
					<!-- ionicons -->
					<link href="'.$vuelve.'css/ionicons.min.css" rel="stylesheet">
					
					<!-- Slider -->
					<link href="'.$vuelve.'css/bootstrap-slider.css" rel="stylesheet"/>
			
					<!-- Tag Input -->
					<link href="'.$vuelve.'css/jquery.tagsinput.css" rel="stylesheet">
			
					<!-- Date Time Picker -->
					<link href="'.$vuelve.'css/datetimepicker.css" rel="stylesheet">
					
					<!-- Select2 -->
					<link href="'.$vuelve.'css/select2/select2.css" rel="stylesheet"/>	


					<!-- Morris -->
					<link href="'.$vuelve.'css/morris.css" rel="stylesheet"/>	
			
					<!-- Datepicker -->
					<link href="'.$vuelve.'css/datepicker.css" rel="stylesheet"/>	
			
					<!-- Animate -->
					<link href="'.$vuelve.'css/animate.min.css" rel="stylesheet">
			
					<!-- Owl Carousel -->
					<link href="'.$vuelve.'css/owl.carousel.min.css" rel="stylesheet">
					<link href="'.$vuelve.'css/owl.theme.default.min.css" rel="stylesheet">

					
					<!-- Simplify -->
					<link href="'.$vuelve.'css/simplify.min.css" rel="stylesheet">

					<!-- datatable -->
					<link href="'.$vuelve.'css/dataTables.bootstrap.css" rel="stylesheet">

				

					
			
					
					';
      
        return $html;       
    }
    public static function getLevel($level)    
    {
        $vuelve="";
        if($level==0){
        	$vuelve="./";
        }
        if($level==1 || $level==1000){
            $vuelve="../";
        }
        if($level==2){
            $vuelve="../../";
        }
        if($level==3){
            $vuelve="../../../";
        }
        return $vuelve;
    }
   	
	public static function pintaConsoleJquery($datoInConsole)
    {
        echo '<script language="javascript" type="text/javascript">
                    $( document ).ready(function() {
                        console.log("'.$datoInConsole.'")
                    });
                    
             </script>
            ';
    }
    public static function getSelected($d1,$d2)
    {
    	$salida='  ';
    	if($d1==$d2)
    	{
    		$salida=' selected="selected" ';
    	}
    	
    	return($salida);
    }
    /***
     * 
     * @param int $tipo 
     * 		   		1 = normal Modal
     * 				2 = large Modal
     * 				3 = small Modal
     *  			4 = todos
     *  @param boolean $btnCloseTit
     */
    public static function getModal($tipo,$btnCloseTit,$titulo='Información',$body='',$footer='<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>',$styleHead="",$styleBody="",$styleFooter="")
    {
    	$htm ='';
    	$n_m = '';
    	$l_m = '';
    	$s_m = '';
    	$a_m = '';
    	
    	/*DEFINE NORMAL MODAL INI*/
    		$n_m = '
					<div class="modal fade" id="normalModal"  >
					  	<div class="modal-dialog">
					    	<div class="modal-content">
					      		<div class="modal-header" '.$styleHead.'>';
    								if($btnCloseTit == true)
    								{$n_m .= '<button id="btn_modal_close_adm" type="button" class="close" data-dismiss="modal" style=" opacity: 1;color:#fff"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';}
    								$n_m .= '
									<h4 class="modal-title"><span id="nmod-titulo">'.$titulo.'</span></h4>
					      		</div>
					      		<div class="modal-body" id="nmod-body" '.$styleBody.'>
					        		'.$body.'
					      		</div>
					      		<div class="modal-footer" id="nmod-footer" '.$styleFooter.'>
					        		'.$footer.'
					      		</div>
					    	</div>
					  	</div>
					</div>';
    	/*DEFINE NORMAL MODAL FIN*/
    	
    	/*DEFINE LARGE MODAL INI*/
    		$l_m = '
					<div class="modal fade" id="largeModal">
					  	<div class="modal-dialog modal-lg">
					    	<div class="modal-content">
					      		<div class="modal-header" '.$styleHead.'>';
    								if($btnCloseTit == true)
    								{$l_m.= '<button type="button" class="close" data-dismiss="modal" style=" opacity: 1;color:#fff"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';}
    								$l_m.= '
									<h4 class="modal-title"><span id="lmod-titulo">'.$titulo.'</span></h4>
					      		</div>
					      		<div class="modal-body" id="lmod-body" '.$styleBody.'>
					        		'.$body.'
					      		</div>
					      		<div class="modal-footer" id="lmod-footer" '.$styleFooter.'>
					        		'.$footer.'
					      		</div>
					    	</div>
					  	</div>
					</div>';
    	/*DEFINE LARGE MODAL FIN*/
    	
    	/*DEFINE SMALL MODAL INI*/
    		$s_m = '
					<div class="modal fade" id="smallModal">
					  	<div class="modal-dialog modal-sm">
					    	<div class="modal-content">
					      		<div class="modal-header" '.$styleHead.'>';
    								if($btnCloseTit == true)
    								{$s_m.= '<button type="button" class="close" data-dismiss="modal" style=" opacity: 1; color:#fff"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';}
    								$s_m.= '
									<h4 class="smod-title"><span id="smod-titulo">'.$titulo.'</span></h4>
					      		</div>
					      		<div class="modal-body" id="smod-body" '.$styleBody.'>
					        		'.$body.'
					      		</div>
					      		<div class="modal-footer" id="smod-footer" '.$styleFooter.'>
					        		'.$footer.'
					      		</div>
					    	</div>
					  	</div>
					</div>';
    	/*DEFINE SMALL MODAL FIN*/
    	
    	/*DEFINE TODOS MODAL INI*/
    		$a_m = $n_m.' '.$l_m.' '.$s_m;
    	/*DEFINE TODOS MODAL FIN*/
    	
    	if($tipo == 1){$htm = $n_m;}
    	if($tipo == 2){$htm = $l_m;}
    	if($tipo == 3){$htm = $s_m;}
    	if($tipo == 4){$htm = $a_m;}
    	
    	return $htm;
    
    	
    }
    public static function getFooter($level)
    {
    	
    	$vuelve=self::getLevel($level);
    	
    	$htm='<footer class="footer">
				<span class="footer-brand">
					<strong class="text-danger" style="color: #15881b;">Biblioteca</strong> de Datos
				</span>
				<p class="no-margin">
					&copy; 2022. Technology Solutions
				</p>	
			</footer>';
    	
    	return $htm;
    }

	// public static function validasesionATM($tiempo)
    // {
	// 		//Tiempo en segundos para dar vida a la sesión.
	// 		$inactivo = 30;//20min en este caso.
	
	// 		//Calculamos tiempo de vida inactivo.
	// 		$vida_session = time() - $tiempo;
	
	// 			//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
	// 			if($vida_session > $inactivo)
	// 			{
	// 				//Removemos sesión.
	// 				session_unset();
	// 				//Destruimos sesión.
	// 				session_destroy();              
	// 			}
	
		
	// 	else{
	// 		$_SESSION['tiempo'] = time();
	// 	}
    	

    // }





}
?>