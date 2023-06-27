<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	session_start();

	//util class
	include ('./util/util.php');
	include ('./util/conexion.php');
	//Factory Class
	include ('./datos/DBFactory.php');
	$db = new Database();
	$con = $db->conectar();
	$goModulo="home";
	
	

	if(isset($_REQUEST["qwerty"]))
	{
		util::decodeParamURL($_REQUEST["qwerty"]);
	}

	if(isset($_REQUEST["pth"]))
	{
		$goModulo=$_REQUEST["pth"];
	}

	$atm_sel = '';
	if(isset($_REQUEST["atm_sel"])) $atm_sel = $_REQUEST["atm_sel"];
	//SI NO HAY VARIABLES DE SESION Y EL MODULO ES EL PRINCIPAL SE  CREAN LAS VARIABLES DE SESION CON EL VALOR DEL ATM SELECCIONADO... SOLO SI VIENE DE LA PAGINA DE SELECCION http://localhost/ATM/
	if( !(isset($_SESSION['atm_sel'])) && $goModulo == 'principal' && (isset($_SERVER['HTTP_REFERER'])) &&  $_SERVER['HTTP_REFERER'] == "http://localhost/ATM/"){
		//declaro variables
		$_SESSION['atm_sel']= $atm_sel;
		$_SESSION['tiempo'] = time();
		$_SESSION['usuario_autenticado']=true;
		//echo "hay sesion";
	}

	//Va a principal en caso de que ya exista una sesion iniciada y se presione home (NO DEBE SELECCIONAR ATM)
	if( isset($_SESSION['atm_sel']) && $goModulo == 'home' ){
		$goModulo='principal';

	}

	// //----------------------------------------------------------------------------------------------------//
	// //DESCONECTAR POR TIEMPO

	$query =$con->prepare("SELECT * FROM atm WHERE ocupado =1");
	$respuesta = $query->execute();
	$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
	if(count($resultado)){
		//$fecha_actual = date("d-m-Y h:i:s");
		date_default_timezone_set("America/Santiago");
		$fecha_actual = date("Y-m-d G:i:s");
		$date2 = new DateTime("now");
		foreach ($resultado as $row) {
			$fecha_actividad = $row['fecha_actividad'];
			$id = $row['id'];
			//Calcula diferencia entre ultimo movimiento de la sesision del atm con la fecha y hora actual
			$datetime1 = date_create($fecha_actual);
  			$datetime2 = date_create($fecha_actividad);
			$diff = date_diff($datetime1, $datetime2);

			if(($diff->y > 0) || ($diff->m >0) || ($diff->d >0) || ($diff->h >0) || $diff->i >3){

				$query =$con->prepare("UPDATE atm SET ocupado = 0, fecha_actividad= NOW() WHERE id = ?");
				$respuesta = $query->execute(array($id));
			}
		
		}
	}
	// //----------------------------------------------------------------------------------------------------//


	//Comprobamos si esta definida la sesión 'tiempo'.
	if(isset($_SESSION['tiempo']) ) {
		//Tiempo en segundos para dar vida a la sesión.
		$inactivo = 200;
		//Calculamos tiempo de vida inactivo.
		$vida_session = time() - $_SESSION['tiempo'];

		//Compraración para redirigir página, si la vida de sesión sea mayor a el tiempo insertado en inactivo.
		if($vida_session > $inactivo){
			//SE LIBERA EL ATM ACTIVO EN LA SESION ANTES DE DESTRUIRLA
			$atm_activo =$_SESSION['atm_sel'];
			$query =$con->prepare("UPDATE atm SET ocupado = 0 WHERE numero = ?");
			$respuesta = $query->execute(array($atm_activo));

			//Removemos sesión.
			session_unset();
			//Destruimos sesión.
			session_destroy();              
			//Redirigimos pagina.
			header('Location: http://localhost/ATM/');
		}
		else{
			//debo updatear ultimo movimiento en base de datos
			$_SESSION['tiempo'] = time();
			$atm_activo =$_SESSION['atm_sel'];
			$query =$con->prepare("UPDATE atm SET fecha_actividad = NOW() WHERE numero = ?");
			$respuesta = $query->execute(array($atm_activo));
		}
	}
	
    //SE ASIGNA VALOR A ATM_SEL PARA QUE APAREZCA EN LA CABACERA
	if( ( isset($_SESSION['atm_sel']))){
		$atm_sel =$_SESSION['atm_sel'];
		//echo $atm_sel;
	}
	else{ // SI NO HAY ATM SEL ES XQ NO HAY SESISION ACTIVA Y SE DEBE IR AL HOME (SELECCION)   ES LO MISMO QUE VALIDAD LA VARIABLE USUARIO autenticado
		//Removemos sesión.
		session_unset();
		//Destruimos sesión.
		session_destroy();     
		$_REQUEST["qwerty"]= '';
		$atm_sel = '';
		$goModulo="home";
	}


?>

<!DOCTYPE html>

<html class="no-js">


<head>
	<title>ATM - Virtual 1.0</title>
	<meta charset="utf-8">
	<meta name="description" content="ATM Virtualizado Banco Falabella">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	<script src="js/util.js"></script>
</head>

<body>
	
	
	<div id="">
		<div id="">

			<header class="page_header header_white toggler_xs_right section_padding_30">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell">
								<a href="./" class="logo top_logo">									
									<span class="logo_text">
										<span class="big" style="color: #219543;">ATM  <?php if(isset($_SESSION['atm_sel'])) echo $atm_sel   ?> </span>
										<span class="small-text">Banco Falabella   <?php echo $atm_sel   ?></span>
									</span>
								</a>
							</div>
							<div class="header_right_buttons display_table_cell"  >			
								<i id="btn_cerrar" class="fa fa-power-off" aria-hidden="true" style="cursor: pointer;" onclick="javascript:cerrar(<?php echo $atm_sel ?>);" ></i>
							</div>
							
						</div>
					</div>
				</div>
			</header>


			<section class="ls section_padding_top_10 section_padding_bottom_100 content">
				<div class="container">

					<?php 	
						
						switch ($goModulo) {
							case "home":
								include './modulos/seleccion.php';						
							break;
							case "principal":
								include './modulos/principal.php';						
							break;
							case "tarjeta_CMR":
								include './modulos/tarjeta_CMR.php';						
							break;								
							default:							
								include './modulos/principal.php';
								negSistema::saveNavegacion("Navegacion","Inicio del Sistema",0);
							break;
						}
						
					
					?>
					
					
				</div>
			</section>

			<section class="ls page_copyright section_padding_15 footer">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p class="small-text small-spacing grey">&copy; ATM Virtual 2023</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		
	</div>



	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>






</body>

</html>


<script type="text/javascript">

function cerrar(sel)
{
		   
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

</script>