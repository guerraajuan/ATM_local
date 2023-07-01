<?php 
session_start();
include ('../negocio/negSistema.php');
include ('../datos/dtSistema.php');
include ('../datos/DBFactory.php');
include ('../util/util.php');
include ('../util/conexion.php');
$db = new Database();
$con = $db->conectar();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);




$acc = "";
if(isset($_REQUEST["acc"]))
{
	$acc = $_REQUEST["acc"];
}


$sel = "";
if(isset($_REQUEST["sel"]))
{
	$sel = $_REQUEST["sel"];
}

// if($acc == "VALUSR")
// {
//     $usuario = $_REQUEST["usuario"];
// 	$clave = $_REQUEST["clave"];
// 	echo  json_encode(negSistema::validaUsuario($usuario,$clave)); 
// }

if($acc == "PERFILACIONRUT")
{
	$rut= $_REQUEST["rut"];
	$dv= $_REQUEST["dv"];
	$from= $_REQUEST["from"];
	//echo $rut;
	if($from == 'DEPOSITO'){
		//$url = 'http://172.20.249.110:8086/cgi-bin/perfilacion?rut='.$rut.'&dv='.$dv.'&pin=1&seguro=1';
		//$url = 'http://172.20.249.243:9080/URL_perfilacion_RUT/perfilacion?rut='.$rut.'&dv=1&pin=1&seguro=1';
		$url ='http://172.20.249.243:9080/perfilacion_RUT_AD?rut='.$rut; //ALTA DISPONIBILIDAD
		$consultaSB =  file_get_contents($url);
		$resp = json_decode($consultaSB);
		$xml = $resp->salida;
		
		if($xml->codigo_error == '0'){
			$respuesta = array(
				"1" => $xml,
				"2" => '1',
			);
			echo json_encode($respuesta);
		}
		else{
			$respuesta = array(
				"1" => $xml,
				"2" => '0',
			);
			echo json_encode($respuesta);
		}
		
	}
	else if($from == 'cliente'){
		//$url = 'http://172.20.249.243:9080/URL_perfilacion_RUT/perfilacion?rut='.$rut.'&dv=1&pin=1&seguro=1';
		//$url = 'http://172.20.249.110:8086/cgi-bin/perfilacion?rut='.$rut.'&dv='.$dv.'&pin=1&seguro=1';
		//$url = 'http://172.20.249.243:9080/Virtual_Perfilacion_Rut';
		$url ='http://172.20.249.243:9080/perfilacion_RUT_AD?rut='.$rut; //ALTA DISPONIBILIDAD
		$consultaSB =  file_get_contents($url);
		//$consultaSB =  file_get_contents($url);
		$resp = json_decode($consultaSB,false);
		$xml = $resp->salida;
	
		//$xml = new  SimpleXMLElement($consultaSB);
		//  $xml = simplexml_load_string($consultaSB);
		//var_dump($xml);
		if($xml->codigo_error == '0'){
			$respuesta = array(
				"1" => $xml,
				"2" => '1',
			);
			echo json_encode($respuesta);
			
		}
		else{
			$respuesta = array(
				"1" => $xml,
				"2" => '0',
			);
			echo json_encode($respuesta);
		}
		
	}
}
else if($acc == 'PERFILACIONRUTHUELLA'){
	$from = $_REQUEST["from"];
	$rut = $_REQUEST["rut"];
	$dv = $_REQUEST["dv"];
    $cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];

	$ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
    $ncta3 = $_REQUEST["ncta3"];

	$tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];
    
	$pth = util::encodeParamURL('pth=cuentas&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&rut='.$rut.'&from='.$from.'&dv='.$dv.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3);
	echo  json_encode($pth); 

}
else if($acc == "PERFIL")
{
    $rut = $_REQUEST["rut_param"];
    $dv = $_REQUEST["dv"];
    $from = $_REQUEST["from"];

    $cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];

	$ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
    $ncta3 = $_REQUEST["ncta3"];

	$tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];



	$pth = util::encodeParamURL('pth=cuentas&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&rut='.$rut.'&from='.$from.'&dv='.$dv.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3);
	echo  json_encode($pth); 
}
else if($acc == "DEPOSITO_EFECTIVO")
{
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta = $_REQUEST["cta"];
    $from = $_REQUEST["from"];
    $co_cta = $_REQUEST["co_cta"];

	$cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];

	$ncta = $_REQUEST["ncta"];
    $ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
    $ncta3 = $_REQUEST["ncta3"];

	$tarjeta = $_REQUEST["tarj"];
    $tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];



    $total = $_REQUEST["total"];
    $cant_1 = $_REQUEST["cant_1"];
    $cant_2 = $_REQUEST["cant_2"];
    $cant_5 = $_REQUEST["cant_5"];
    $cant_10 = $_REQUEST["cant_10"];
    $cant_20 = $_REQUEST["cant_20"];

	$pth = util::encodeParamURL('pth=total_deposito&total='.$total.'&cant_1='.$cant_1.'&cant_2='.$cant_2.'&cant_5='.$cant_5.'&cant_10='.$cant_10.'&cant_20='.$cant_20.'&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta);
	echo  json_encode($pth); 
}
else if($acc == "RUT_HUELLA")
{
    $rut_param = $_REQUEST["rut_param"];
    $dv = $_REQUEST["dv"];
    $from = $_REQUEST["from"];
	$pth = util::encodeParamURL('pth=huella&from='.$from.'&dv='.$dv.'&rut='.$rut_param);
	echo  json_encode($pth); 
}
else if($acc == "CLIENTE_GIRO")
{
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $from = $_REQUEST["from"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    $monto = $_REQUEST["monto"];

	$cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];

	$ncta = $_REQUEST["ncta"];
    $ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
	$ncta3 = $_REQUEST["ncta3"];
     
    $tarjeta = $_REQUEST["tarj"];
    $tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];





	$pth = util::encodeParamURL('pth=cliente_giro_transaccion&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&monto='.$monto.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&ncta='.$ncta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&paso=1');
	echo  json_encode($pth); 
}
else if($acc == "CLIENTE_BANCOFALABELLA")
{
    $from = $_REQUEST["from"];
    $msj = $_REQUEST["msj"];
	$pth = util::encodeParamURL('pth=cliente_banco_falabella&from='.$from.'&msj='.$msj);
	echo  json_encode($pth); 
}
else if($acc == "CAMBIO_CLAVE")
{
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $from = $_REQUEST["from"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    $paso = $_REQUEST["paso"];
    $pass = $_REQUEST["pass"];
	$pass_2 = '';
	$intentos = '0';
	if(isset($_REQUEST["pass_2"])) $pass_2 = $_REQUEST["pass_2"];
	if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];
	if($paso == 1)
		$pth = util::encodeParamURL('pth=espera&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&pass='.$pass.'&paso=1&intentos='.$intentos);
	else if($paso == 2)
		$pth = util::encodeParamURL('pth=cambio_clave_2&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&pass='.$pass.'&paso=2&intentos='.$intentos);
	else if($paso == 3)	
		$pth = util::encodeParamURL('pth=huella&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&pass='.$pass.'&paso=3&pass_2='.$pass_2.'&intentos='.$intentos);
	else if($paso == 4)
		$pth = util::encodeParamURL('pth=espera&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&pass='.$pass.'&paso=4&pass_2='.$pass_2.'&intentos='.$intentos);
	else if($paso == 5)
		$pth = util::encodeParamURL('pth=cambio_clave_3&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&pass='.$pass.'&paso=5');
	else if($paso == 6)
		$pth = util::encodeParamURL('pth=cambio_clave_4&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&intentos='.$intentos);
	else if($paso == 7)
		$pth = util::encodeParamURL('pth=cambio_clave_5&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta);
	echo  json_encode($pth); 
}
else if($acc == "RH_CONSULTA_SALDO")
{
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $from = $_REQUEST["from"];
    $cta = $_REQUEST["cta"];
    $co_cta = $_REQUEST["co_cta"];
    $paso = $_REQUEST["paso"];
    $cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];
    $id_solicitud = $_REQUEST["id_solicitud"];

	$ncta = $_REQUEST["ncta"];
    $ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
	$ncta3 = $_REQUEST["ncta3"];
     
    $tarjeta = $_REQUEST["tarj"];
    $tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];


    $atm_sel = $_REQUEST["atm_sel"];

	if($paso == 1){
		//SE INSERTA SOLICITUD DE TRANSACCION
		$id_solicitud;
		$query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,tarjeta,cuenta,co_cuenta, atm) VALUES (1,0,?,?,?,?,?,?)");
        $respuesta = $query->execute(array($rut,$dv,$tarjeta,$ncta,$co_cta,$atm_sel));
		$id_solicitud = $con->lastInsertId();
		$pth = util::encodeParamURL('pth=rh_consultasaldo_espera&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&paso=2&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&id_solicitud='.$id_solicitud.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta);
	}
	else if($paso == 2){
		// SE RESCATA RESPUESTA DE LA TRANSACCION
		
		$fecha='';
		$fecha_cont='';
		$hora='';
		$cajero='';
		$n_operacion='';
		$ncuenta='';
		$operacion='';
		$max_giro='';
		$disponible='';
		$saldo_total='';
		$car_1='';
		$car_2='';
		$fec_cap='';
		$res ='';
		$estado =0;
		$control =0; // permite no entrar a actualizar el estado ya que se tiene respuesta con error de la transaccion
		$res_erorr ='';
		$codigo_erorr ='';

		$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");

		for($i=0; $i<= 3; $i++){
			$respuesta = $query->execute(array($id_solicitud));
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			if(count($resultado)){

				foreach($resultado as $row){
					$res = $row['resultado']; 
					$res_2 = $row['resultado_2']; 
					$estado = $row['estado'];
				}
				if($estado== 1){
					$datos = explode(chr(14), $res);

					if(array_key_exists(3,  $datos)){
						$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
						$fecha= substr($fecha, -10);
					}
					if(array_key_exists(4,  $datos)){
						$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
					}
					if(array_key_exists(5,  $datos)){
						$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
					}
					if(array_key_exists(6,  $datos)){
						$cajero = trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1)));
					}
					if(array_key_exists(16,  $datos)){
						$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10); 
						$n_operacion = substr($n_operacion, 0,5);
						$n_operacion = substr($n_operacion, 1);
					}
					if(array_key_exists(17,  $datos)){
						$ncuenta =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[17]),1));
						$ncuenta = substr($ncuenta, 0,18);
					}
					if(array_key_exists(17,  $datos)){
						$operacion =  preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17]));
					}
					if(array_key_exists(19,  $datos)){
						$max_giro =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[19]),1)));
					}
					if(array_key_exists(22,  $datos)){
						$disponible =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[22]),1)));
					}
					if(array_key_exists(50,  $datos)){
						$saldo_total =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[50]),1)));
						$saldo_total =  str_replace(chr(12),"",$saldo_total);
					}

					if($co_cta == 'AD'){
						$datos_2 = explode(chr(14), $res_2);

						if(array_key_exists(3,  $datos_2)){
							$car_1 =  preg_replace("/[\r\n|\n|\r]+/", " ",strval($datos_2[3]));
							$car_1_array = explode(' ', $car_1);
							if(array_key_exists(1,  $car_1_array)){
								$car_1 = $car_1_array[1];
							}
							else{
								$car_1 =substr($car_1_array[0], -1);  
							}
							
						}
						if(array_key_exists(5,  $datos_2)){
							$car_2 =  preg_replace("/[\r\n|\n|\r]+/", " ",strval($datos_2[5]));
							$car_2_array = explode(' ', $car_2);
							if(array_key_exists(1,  $car_2_array)){
								$car_2 = $car_2_array[1];
							}
							else{
								$car_2 =substr($car_2_array[0], -1);  
							}
						}
						if(array_key_exists(14,  $datos_2)){
							$fec_cap =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos_2[14]),1));
							$fec_cap = substr($fec_cap, 0, -1);
						}
					}
					$control =1;
				}
				else{
					//hay respuesta con error
					$error_arr = explode(chr(29), $res);
					if(array_key_exists(1,  $error_arr)){
					$res_erorr = $error_arr[1];
					$res_erorr = substr($res_erorr, 67);
					$res_erorr = substr($res_erorr, 0, -90);  
					$codigo_erorr = substr($res_erorr, 0, -20); 
					}
					else{
						$res_erorr = $error_arr[0];
					}
					$control =1;
				}

				break;
			}
			sleep(4);
		}
		if($control ==0){
			$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
            $respuesta = $query->execute(array($id_solicitud));
		}

		$pth = util::encodeParamURL('pth=rh_consultasaldo_espera&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta='.$cta.'&co_cta='.$co_cta.'&paso=3&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&ncuenta='.$ncuenta.'&operacion='.$operacion.'&max_giro='.$max_giro.'&disponible='.$disponible.'&saldo_total='.$saldo_total.'&estado='.$estado.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&car_1='.$car_1.'&car_2='.$car_2.'&fec_cap='.$fec_cap.'&n_operacion='.$n_operacion.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
	}
	else if($paso == 3){
		$pth = util::encodeParamURL('pth=rh_consultasaldo_realizado&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta);
	}

	echo  json_encode($pth); 
}
else if($acc == 'RH_CONSULTA_OTRAOPERACION'){
	$rut = $_REQUEST["rut"];
	$dv = $_REQUEST["dv"];
    $cta1 = $_REQUEST["cta1"];
    $cta2 = $_REQUEST["cta2"];
    $cta3 = $_REQUEST["cta3"];
    $from = $_REQUEST["from"];

	//$ncta = $_REQUEST["ncta"];
    $ncta1 = $_REQUEST["ncta1"];
    $ncta2 = $_REQUEST["ncta2"];
	$ncta3 = $_REQUEST["ncta3"];
     
    //$tarjeta = $_REQUEST["tarj"];
    $tarjeta1 = $_REQUEST["tarj1"];
    $tarjeta2 = $_REQUEST["tarj2"];
    $tarjeta3 = $_REQUEST["tarj3"];

	$pth = util::encodeParamURL('pth=cuentas&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&rut='.$rut.'&from='.$from.'&dv='.$dv.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3);
	echo  json_encode($pth); 

}

else if($acc == 'CLAVEPERFILACIONPAN'){
	$pan = $_REQUEST["tarjeta"];
	$pan =str_replace(' ', '', $pan);
	$from = $_REQUEST["from"];
	$pth = util::encodeParamURL('pth=tarjeta_forma_ingreso&pan='.$pan.'&from=PERFILACIONPAN');
	echo  json_encode($pth); 
}
else if($acc == "PERFILACIONPAN"){
	if(isset($_REQUEST["pan"])) $pan = $_REQUEST["pan"];
	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
	if($from == 'PERFILACIONPAN'){		
		//$url = 'http://172.20.249.243:9080/URL_perfilacion_PAN/cgi-bin/perfilacion?tarjeta='.$pan.'&pin=1&seguro=1';
		$url = 'http://172.20.249.243:9080/perfilacion_PAN_AD?tarjeta='.$pan.'&pin=1&seguro=1'; //ALTA DISPONIBILIDAD
		
		$consultaSB =  file_get_contents($url);
		$resp = json_decode($consultaSB);
		$xml = $resp->salida;
		//var_dump( $xml);
		//echo $xml->codigo_error;
		//$xml = new SimpleXMLElement($consultaSB);
		//$xml = simplexml_load_string($consultaSB);
		if($xml->codigo_error == '0'){
			$respuesta = array(
				"1" => $xml,
				"2" => '1',
			);
			echo json_encode($respuesta);
		}
		else{
			$respuesta = array(
				"1" => $xml,
				"2" => '0',
			);
			echo json_encode($respuesta);
		}
		
	}
}
else if($acc == "TARJETACUENTAS")
{
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $cta1 = $_REQUEST["cta1"];
    $ncta = $_REQUEST["ncta"];
    $tarjeta = $_REQUEST["pan"];
	$cta2= ''; 
	$cta3= ''; 
	$pth = util::encodeParamURL('pth=cuentas&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&rut='.$rut.'&dv='.$dv.'&from=cliente'.'&tarj1='.$tarjeta.'&ncta1='.$ncta);
	echo  json_encode($pth); 
}
else if($acc == "TARJETACUENTASERROR")
{
	$from = '';
	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
	$pth = util::encodeParamURL('pth=perfilacion_pan_mensaje&from='.$from);
	echo  json_encode($pth); 
}
else if($acc == "TARJETACMR")
{
    $from = $_REQUEST["from"];
    $tarjeta = $_REQUEST["tarjeta"];
	$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&tarjeta='.$tarjeta);
	echo  json_encode($pth); 
}
else if($acc == "ESPERACMR")
{
    $from = $_REQUEST["from"];
	$pth = '';
    $tarjeta = '';
    $rut = '';
    $dv = '';
    $nombre = '';
    //$avance = '';
    //$super = '';
    $monto = '';
    $cuotas = '';
    $fecha = '';
    $valor_cuota = '';
    $pass_actual = '';
    $intentos = 0;
    $pass_1 = '';
    $pass_2 = '';
    $paso = '';
    $id_solicitud = '';
    $seleccion = '';

    $atm_sel = '';

	if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
	if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"];
	// if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"];
	// if(isset($_REQUEST["super"])) $super = $_REQUEST["super"];
	if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];
	if(isset($_REQUEST["cuotas"])) $cuotas = $_REQUEST["cuotas"];
	if(isset($_REQUEST["valorcuota"])) $valor_cuota = $_REQUEST["valorcuota"];
	if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
	if(isset($_REQUEST["pass_actual"])) $pass_actual = $_REQUEST["pass_actual"];
	if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];
	if(isset($_REQUEST["pass_1"])) $pass_1 = $_REQUEST["pass_1"];
	if(isset($_REQUEST["pass_2"])) $pass_2 = $_REQUEST["pass_2"];
	if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
	if(isset($_REQUEST["seleccion"])) $seleccion = $_REQUEST["seleccion"];

	if(isset($_REQUEST["atm_sel"])) $atm_sel = $_REQUEST["atm_sel"];

	if($pass_2 != ''){
		if($pass_1 == $pass_2  ){
			$from = 'CAMBIOCLAVECMR3';
		}
		else{
			$from = 'CAMBIOCLAVECMR5';
			$intentos = intval($intentos) +1;
			if($intentos<4){
				$from = 'CAMBIOCLAVECMR4';
			}
		}
	}

    
	if($from == 'TARJETA_CMR')
		$pth = util::encodeParamURL('pth=tarjeta_forma_ingreso&from='.$from.'&tarjeta='.$tarjeta);
	else if($from == 'SALDOCMR'){
		if($paso == 1){
			//SE INSERTA SOLICITUD DE TRANSACCION
			$sin_info = 'sin_datos';
			$id_solicitud;
			$query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,tarjeta,cuenta,co_cuenta,atm) VALUES (4,0,?,?,?,?,?,?)");
			$respuesta = $query->execute(array($rut,$dv,$tarjeta,$sin_info,$sin_info,$atm_sel));
			$id_solicitud = $con->lastInsertId();

			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=2&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud);
		}
		else if($paso == 2){
			// SE RESCATA RESPUESTA DE LA TRANSACCION
			
			$n_operacion ='';
			$n_tarjeta ='';
			$disp_avance ='';
			$disp_cred_consumo ='';
			$disp_compras ='';
			$estado =0;
			$control =0; // permite no entrar a actualizar el estado ya que se tiene respuesta con error de la transaccion

			$res_erorr ='';
			$codigo_erorr ='';

			$fecha='';
			$fecha_cont='';
			$hora='';
			$cajero='';
			$operacion='';
			$n_cuenta='';
	
			$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");
	
			for($i=0; $i<= 3; $i++){
				$respuesta = $query->execute(array($id_solicitud));
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($resultado)){
	
					foreach($resultado as $row){
						$res = $row['resultado']; 
						$res2 = $row['resultado_2']; 
						$estado = $row['estado'];
					}
					if($estado== 1){
						$datos = explode(chr(14), $res);
						$datos2 = explode(chr(14), $res2);

						if(array_key_exists(3,  $datos)){
							$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
							$fecha= substr($fecha, -10);
						}
						if(array_key_exists(5,  $datos)){
							$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
						}
						if(array_key_exists(4,  $datos)){
							$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
						}
						if(array_key_exists(6,  $datos)){
							$cajero =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1));
						}
						if(array_key_exists(17,  $datos)){
							$operacion = trim(preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17])));
						}
						if(array_key_exists(37,  $datos)){
							$n_cuenta =trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr($datos[37], 2,18)));
						}
						if(array_key_exists(16,  $datos)){
							$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10); 
							$n_operacion = substr($n_operacion, 0,5);
							$n_operacion = substr($n_operacion, 1);
						}
						if(array_key_exists(40,  $datos)){
							$disp_avance=  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[40]),1));
							$disp_avance=trim(str_replace(chr(12), "", $disp_avance));
						}
						if(array_key_exists(6,  $datos2)){
							$disp_cred_consumo=  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[6]),1)));
						}
						if(array_key_exists(8,  $datos2)){
							$disp_compras=  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[8]),1));
							$disp_compras=trim(str_replace(chr(12), "", $disp_compras));
						}
						$control =1;
					}
					else{
						//hay respuesta con error
						$error_arr = explode(chr(29), $res);
						if(array_key_exists(1,  $error_arr)){
						$res_erorr = $error_arr[1];
						$res_erorr = substr($res_erorr, 67);
						$res_erorr = substr($res_erorr, 0, -90);  
						$codigo_erorr = substr($res_erorr, 0, -20); 
						}
						else{
							$res_erorr = $error_arr[0];
						}
						$control =1;
					}
	
					break;
				}
				sleep(4);
			}
			if($control ==0){
				$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
				$respuesta = $query->execute(array($id_solicitud));
			}

			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=3&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud.'&estado='.$estado.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&operacion='.$operacion.'&n_cuenta='.$n_cuenta.'&n_operacion='.$n_operacion.'&disp_avance='.$disp_avance.'&disp_cred_consumo='.$disp_cred_consumo.'&disp_compras='.$disp_compras.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
	
		}
	}
	else if($from == 'AVANCECMR'){
		if($paso == 1){
			//SE INSERTA SOLICITUD DE TRANSACCION
			$id_solicitud;
			$query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,monto_giro,tarjeta,cuenta,co_cuenta, atm) VALUES (5,0,?,?,?,?,?,?,?)");
			$respuesta = $query->execute(array($rut,$dv,$monto,$tarjeta,$nombre,$cuotas, $atm_sel));
			//en cuenta se guarda el nombre del titulñar de la cuenta
			//en co_cuenta se guarda la cantidad de cuotas seleccionadas
			$id_solicitud = $con->lastInsertId();

			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=2&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud.'&monto='.$monto.'&cuotas='.$cuotas.'&nombre='.$nombre);
			//$pth = $nombre;
		}
		else if($paso == 2){
			// SE RESCATA RESPUESTA DE LA TRANSACCION PARA SABER FECHAS Y MONTOS
			
			$fecha_1 ="";
			$monto_1 ="";
			$fecha_2 ="";
			$monto_2 ="";
			$fecha_3 ="";
			$monto_3 ="";
			$fecha_4 ="";
			$monto_4 ="";
			$estado =0;
			$control =0; // permite no entrar a actualizar el estado ya que se tiene respuesta con error de la transaccion

			$res_erorr ='';
			$codigo_erorr ='';
	
			$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");
	
			for($i=0; $i<= 3; $i++){
				$respuesta = $query->execute(array($id_solicitud));
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($resultado)){
	
					foreach($resultado as $row){
						$res = $row['resultado']; 
						$estado = $row['estado'];
					}
					if($estado== 1){
						$respuesta_server = explode(chr(15), $res);
						if(array_key_exists(3,  $respuesta_server)){
							$fecha_1 =substr($respuesta_server[3],2);
						}
						if(array_key_exists(4,  $respuesta_server)){
							$monto_1 = substr($respuesta_server[4],2);
						}
						if(array_key_exists(5,  $respuesta_server)){
							$fecha_2 =substr($respuesta_server[5],2);
						}
						if(array_key_exists(6,  $respuesta_server)){
							$monto_2 = substr($respuesta_server[6],2);
						}
						if(array_key_exists(7,  $respuesta_server)){
							$fecha_3 =substr($respuesta_server[7],2);
						}
						if(array_key_exists(8,  $respuesta_server)){
							$monto_3 = substr($respuesta_server[8],2);
						}
						if(array_key_exists(9,  $respuesta_server)){
							$fecha_4 =substr($respuesta_server[9],2);
						}
						if(array_key_exists(10,  $respuesta_server)){
							$monto_4 = substr($respuesta_server[10],2);
						}	
						$control =1;				
					}
					else{
						//hay respuesta con error
						$error_arr = explode(chr(29), $res);
						if(array_key_exists(1,  $error_arr)){
						$res_erorr = $error_arr[1];
						$res_erorr = substr($res_erorr, 67);
						$res_erorr = substr($res_erorr, 0, -90);  
						$codigo_erorr = substr($res_erorr, 0, -20); 
						}
						else{
							$res_erorr = $error_arr[0];
						}
						$control =1;
					}
	
					break;
				}
				sleep(2);
			}
			if($estado == 0 && $control ==0){
				$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
				$respuesta = $query->execute(array($id_solicitud));
			}
		
			if($estado == 0){
				$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=3&tarjeta='.$tarjeta.'&estado='.$estado.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
			}
			else{
				$pth = util::encodeParamURL('pth=seleccion_avanceCMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=3&tarjeta='.$tarjeta.'&estado='.$estado.'&fecha_1='.$fecha_1.'&fecha_2='.$fecha_2.'&fecha_3='.$fecha_3.'&monto_1='.$monto_1.'&monto_2='.$monto_2.'&monto_3='.$monto_3.'&monto_4='.$monto_4.'&fecha_4='.$fecha_4.'&monto='.$monto.'&cuotas='.$cuotas.'&nombre='.$nombre);
				//$pth = util::encodeParamURL('pth=seleccion_avanceCMR');
			}
		}
		else if($paso == 4){
			//SE INSERTA SOLICITUD DE TRANSACCION PARA ENVIAR CUOTA SELECCIONADA
			
			$id_solicitud;
			$query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,monto_giro,monto_deposito,tarjeta,cuenta,co_cuenta, atm) VALUES (6,0,?,?,?,?,?,?,?,?)");
			$respuesta = $query->execute(array($rut,$dv,$monto,$nombre,$tarjeta,$seleccion,$cuotas,$atm_sel));
			//en co_cuenta se guarda la cantidad de cuotas seleccionadas
			//en cuenta se guarda la selccion de la cuota elegida
			//en monto_deposito  se guarda el nombre del cliente
			$id_solicitud = $con->lastInsertId();
			
			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=5&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud);

		}
		else if($paso == 5){
			// SE RESCATA RESPUESTA DE LA TRANSACCION

			$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");

			$fecha='';
			$fecha_cont='';
			$hora='';
			$cajero='';
			$operacion='';



			$n_operacion='';
			$rut_op='';
			$nombre_op='';
			$n_tarjeta='';
			$monto_op='';
			$cuotas_op='';
			$estado =0;
			$control =0; // permite saber si se obtuvo respuesta del host, en caso de que si se tenga respuesta no de debe hacer update de solicitud
			$res_erorr ='';
			$codigo_erorr ='';

			for($i=0; $i<= 3; $i++){
				$respuesta = $query->execute(array($id_solicitud));
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($resultado)){

					foreach($resultado as $row){
						$res = $row['resultado']; 
						$estado = $row['estado'];
						//$res_2 = $row['resultado_2'];
					}
					if($estado ==1){
						$datos = explode(chr(14), $res);

						if(array_key_exists(3,  $datos)){
							$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
							$fecha= substr($fecha, -10);
						}
						if(array_key_exists(5,  $datos)){
							$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
						}
						if(array_key_exists(4,  $datos)){
							$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
						}
						if(array_key_exists(6,  $datos)){
							$cajero =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1));
						}
						if(array_key_exists(17,  $datos)){
							$operacion = trim(preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17]))); 
						}
						if(array_key_exists(16,  $datos)){
							$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10);
							$n_operacion = substr($n_operacion, 0,5);
							$n_operacion = substr($n_operacion, 1);
							$rut_op = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10);
							$rut_op = substr($rut_op, 5);
						}
						if(array_key_exists(38,  $datos)){
							$nombre_op= preg_replace('/\s+/', ' ', preg_replace('/[^a-zA-Z\s]+/u', '', $datos[38]));
							$nombre_op = trim(substr($nombre_op, 0,-18));
						}
						if(array_key_exists(42,  $datos)){
							$monto_op=  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[42]),1)));
						}
						if(array_key_exists(43,  $datos)){
							$cuotas_op=  preg_replace("/[\r\n|\n|\r]+/", " ",$datos[43]);
							$cuotas_op = substr($cuotas_op,1);
						}
						$control =1;
					}
					else{
						//hay respuesta con error
						$error_arr = explode(chr(29), $res);
						if(array_key_exists(1,  $error_arr)){
						$res_erorr = $error_arr[1];
						$res_erorr = substr($res_erorr, 67);
						$res_erorr = substr($res_erorr, 0, -90);  
						$codigo_erorr = substr($res_erorr, 0, -20); 
						}
						else{
							$res_erorr = $error_arr[0];
						}
						$control =1;
					}

					break;
				}
				sleep(4);
			}
			if($control == 0){
				$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
            	$respuesta = $query->execute(array($id_solicitud));
			}
			if($estado != 0){
				$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=6&estado='.$estado.'&n_operacion='.$n_operacion.'&rut_op='.$rut_op.'&nombre_op='.$nombre_op.'&monto_op='.$monto_op.'&cuotas_op='.$cuotas_op.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&operacion='.$operacion.'&tarjeta='.$tarjeta.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);

			}
			else{
				$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=6&estado='.$estado.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
			}
		
		}

	}
	else if($from == 'AVANCECMRFECHA')
		$pth = util::encodeParamURL('pth=avance_transaccion_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&cuotas='.$cuotas.'&fecha='.$fecha.'&valorcuota='.$valor_cuota);	
	else if($from == 'CAMBIOCLAVECMR')
		$pth = util::encodeParamURL('pth=cambio_clave_2_CMR&from=CAMBIOCLAVECMR2&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos);
	else if($from == 'CAMBIOCLAVECMR2')
		$pth = util::encodeParamURL('pth=cambio_clave_3_CMR&from=CAMBIOCLAVECMR3&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos.'&pass_1='.$pass_1);
	else if($from == 'CAMBIOCLAVECMR3')
		$pth = util::encodeParamURL('pth=cambio_clave_5_CMR&from=CAMBIOCLAVECMROK&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&pass_1='.$pass_1);
	else if($from == 'CAMBIOCLAVECMR4')
		$pth = util::encodeParamURL('pth=cambio_clave_4_CMR&from=CAMBIOCLAVECMR2&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos);
	else if($from == 'CAMBIOCLAVECMR5')
		$pth = util::encodeParamURL('pth=cambio_clave_6_CMR&from=CAMBIOCLAVECMRLIMITE&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv);
	else if($from == 'ERRORSA')
		$pth = util::encodeParamURL('pth=espera_CMR&from=AVANCECMR&rut='.$rut.'&dv='.$dv.'&paso=6&estado=0&tarjeta='.$tarjeta);	
	else if($from == 'SACMR'){
		//INSERTO SOLICITUD
		if($paso == 1){
			//SE INSERTA SOLICITUD DE TRANSACCION SUPER AVANCE
			//monto_giro es el monto del super avance
			//cuenta guarda el Nombre del cliente
			//co_cuenta guarda las cuotas
			$sin_info = 'sin_datos';
			$id_solicitud;
			$query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,monto_giro,tarjeta,cuenta,co_cuenta,atm) VALUES (7,0,?,?,?,?,?,?,?)");
			$respuesta = $query->execute(array($rut,$dv,$monto,$tarjeta,$nombre,$cuotas,$atm_sel));
			$id_solicitud = $con->lastInsertId();

			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=2&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud.'&nombre='.$nombre);	
		}
		else if($paso == 2){
			// SE RESCATA RESPUESTA DE LA TRANSACCION
			
			$n_operacion ='';
			$n_tarjeta ='';
			$estado =0;
			$control =0; // permite no entrar a actualizar el estado ya que se tiene respuesta con error de la transaccion

			$res_erorr ='';
			$codigo_erorr ='';

			$fecha='';
			$fecha_cont='';
			$hora='';
			$cajero='';
			$n_operacion = '';
			$operacion='';
			$monto_op='';
			$cuotas_op='';
			$nombre_op='';
			$rut_op='';
	
			$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");
	
			for($i=0; $i<= 3; $i++){
				$respuesta = $query->execute(array($id_solicitud));
				$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
				if(count($resultado)){
	
					foreach($resultado as $row){
						$res = $row['resultado']; 
						//$res2 = $row['resultado_2']; 
						$estado = $row['estado'];
					}
					if($estado== 1){
						$datos = explode(chr(14), $res);
						//$datos2 = explode(chr(14), $res2);

						if(array_key_exists(3,  $datos)){
							$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
							$fecha= substr($fecha, -10);
						}
						if(array_key_exists(5,  $datos)){
							$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
						}
						if(array_key_exists(4,  $datos)){
							$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
						}
						if(array_key_exists(6,  $datos)){
							$cajero =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1));
						}
						if(array_key_exists(16,  $datos)){
							$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10); 
							$n_operacion = substr($n_operacion, 0,5);
							$n_operacion = substr($n_operacion, 1);
							$nombre_op= preg_replace('/\s+/', ' ', preg_replace('/[^a-zA-Z\s]+/u', '', $datos[16]));
							$nombre_op = substr($nombre_op, 0,-18);
							$rut_op = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10); 
							$rut_op = substr($rut_op, 5);
						}
						if(array_key_exists(17,  $datos)){
							$operacion = trim(preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17]))); 
						}
						if(array_key_exists(20,  $datos)){
							$monto_op = trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[20]),1)));
						}
						if(array_key_exists(21,  $datos)){
							$cuotas_op =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[21]),1)));
						}
						if(array_key_exists(21,  $datos)){
							$cuotas_op =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[21]),1)));
						}
						$control =1;
			
					}
					else{
						//hay respuesta con error
						$error_arr = explode(chr(29), $res);
						if(array_key_exists(1,  $error_arr)){
						$res_erorr = $error_arr[1];
						$res_erorr = substr($res_erorr, 67);
						$res_erorr = substr($res_erorr, 0, -90);  
						$codigo_erorr = substr($res_erorr, 0, -20); 
						}
						else{
							$res_erorr = $error_arr[0];
						}
						$control =1;
					}
	
					break;
				}
				sleep(4);
			}
			if($control ==0){
				$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
				$respuesta = $query->execute(array($id_solicitud));
			}

			$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&rut='.$rut.'&dv='.$dv.'&paso=3&tarjeta='.$tarjeta.'&id_solicitud='.$id_solicitud.'&estado='.$estado.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&operacion='.$operacion.'&monto_op='.$monto_op.'&cuotas_op='.$cuotas_op.'&rut_op='.$rut_op.'&nombre_op='.$nombre_op.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
	
		}
	}
		
							
	echo  json_encode($pth); 
}
else if($acc == "PERFILACIONCMR"){
	if(isset($_REQUEST["tarjeta"])){
		$tarjeta = $_REQUEST["tarjeta"];
		$tarjeta =str_replace(' ', '', $tarjeta);
	}
	$pass = '';
	$pth = '';
    $rut = '';
    $dv = '';
    $avance = '';
    $super = '';
    $nombre = '';
	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
	if(isset($_REQUEST["pass"])) $pass= $_REQUEST["pass"];
	if(isset($_REQUEST["rut"])) $rut= $_REQUEST["rut"];
	if(isset($_REQUEST["dv"])) $dv= $_REQUEST["dv"];
	if(isset($_REQUEST["avance"])) $avance= $_REQUEST["avance"];
	if(isset($_REQUEST["super"])) $super= $_REQUEST["super"];
	if(isset($_REQUEST["nombre"])) $nombre= $_REQUEST["nombre"];



	if($from == 'PERFILACIONCMR'){
		//$url = 'http://172.20.249.110:8086/cgi-bin/perfilacionCMR?tarjeta='.$tarjeta.'&pin='.$pass.'&seguro=1';
		//$url = 'http://172.20.249.243:9080/URL_perfilacion_CMR/cgi-bin/perfilacionCMR?tarjeta='.$tarjeta.'&pin=1&seguro=1';
		$url = 'http://172.20.249.243:9080/perfilacion_CMR_AD?tarjeta='.$tarjeta.'&pin=1&seguro=1'; //ALTA DISPONIBILIDAD
		$consultaSB =  file_get_contents($url);
		$resp = json_decode($consultaSB);
		$xml = $resp->salida;

		// $consultaSB =  file_get_contents($url);
		// //$xml = new SimpleXMLElement($consultaSB);
		// $xml = simplexml_load_string($consultaSB);
		if($xml->codigo_error == '0'){
			$respuesta = array(
				"1" => $xml,
				"2" => '1',
			);
			echo json_encode($respuesta);
		}
		else{
			$respuesta = array(
				"1" => $xml,
				"2" => '0',
			);
			echo json_encode($respuesta);
		}
		
	}
	else if($from == 'PERFILACIONCMROK'){
		$pth = util::encodeParamURL('pth=menu_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&nombre='.$nombre);
		echo  json_encode($pth);
	}
}
else if($acc == "AVANCE_CMR")
{
    $from = $_REQUEST["from"];
    $tarjeta = $_REQUEST["tarjeta"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $avance = $_REQUEST["avance"];
    $super = $_REQUEST["super"];
    $monto = $_REQUEST["monto"];
    $nombre = $_REQUEST["nombre"];
	$pth = util::encodeParamURL('pth=avance_cuotas_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&nombre='.$nombre);
	echo  json_encode($pth); 
}
else if($acc == "AVANCE_CUOTAS_CMR")
{
    $from = $_REQUEST["from"];
    $tarjeta = $_REQUEST["tarjeta"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $avance = $_REQUEST["avance"];
    $super = $_REQUEST["super"];
    $monto = $_REQUEST["monto"];
    $cuotas = $_REQUEST["cuotas"];
    $nombre = $_REQUEST["nombre"];
	$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&tarjeta='.$tarjeta.'&paso=1&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&cuotas='.$cuotas.'&nombre='.$nombre);
	echo  json_encode($pth); 
}
else if($acc == "AVANCE_FECHAS_CMR")
{
    $from ='AVANCECMRFECHA';
    $tarjeta = $_REQUEST["tarjeta"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $avance = $_REQUEST["avance"];
    $super = $_REQUEST["super"];
    $monto = $_REQUEST["monto"];
    $cuotas = $_REQUEST["cuotas"];
    $fecha = $_REQUEST["fecha"];
    $valor_cuota = $_REQUEST["valorcuota"];
	$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&cuotas='.$cuotas.'&valorcuota='.$valor_cuota.'&fecha='.$fecha);
	echo  json_encode($pth); 
}
else if($acc == "CAMBIO_CLAVE_CMR")
{
    $tarjeta = $_REQUEST["tarjeta"];
    $rut = $_REQUEST["rut"];
    $dv = $_REQUEST["dv"];
    $pass_actual = $_REQUEST["pass_actual"];
    $pass_1 = $_REQUEST["pass_1"];
    $pass_2 = $_REQUEST["pass_2"];
    $paso = $_REQUEST["paso"];
    $from = $_REQUEST["from"];
	$intentos=0;
	if(isset($_REQUEST["intentos"])) $intentos = $_REQUEST["intentos"];
	if($paso == '1'){
		$intentos = 1;
		$pth = util::encodeParamURL('pth=espera_CMR&from=CAMBIOCLAVECMR&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos);
	}
	else if($paso == '2')
		$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos.'&pass_1='.$pass_1);
	else if($paso == '3')
		$pth = util::encodeParamURL('pth=espera_CMR&from='.$from.'&tarjeta='.$tarjeta.'&rut='.$rut.'&dv='.$dv.'&pass_actual='.$pass_actual.'&intentos='.$intentos.'&pass_1='.$pass_1.'&pass_2='.$pass_2); 
	echo  json_encode($pth); 

}
else if($acc == "GIRO")
{

	$from ='';
    $rut = '';
    $dv = '';
    $cta = '';
    $co_cta = '';
    $monto = '';
    $paso = '';
    $estado = '';
    $id_solicitud = '';

	$cta1 = '';
    $cta2 = '';
    $cta3 = '';

	$ncta = '';
    $ncta1 ='';
    $ncta2 ='';
	$ncta3 ='';
     
    $tarjeta = '';
    $tarjeta1 ='';
    $tarjeta2 ='';
    $tarjeta3 ='';

	$atm_sel ='';

	$res_erorr ='';
	$codigo_erorr ='';

	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
	if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
    if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];
    if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"];
    if(isset($_REQUEST["estado"])) $estado = $_REQUEST["estado"];
    if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];

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

    if(isset($_REQUEST["atm_sel"])) $atm_sel = $_REQUEST["atm_sel"];
  

	if($paso == 1){
		//SE INSERTA SOLICITUD DE TRANSACCION
		$id_solicitud;
		$query =$con->prepare("INSERT INTO solicitud (solicitud, lista, monto_giro,rut,dv,tarjeta,cuenta,co_cuenta,atm) VALUES (2,0,?,?,?,?,?,?,?)");
        $respuesta = $query->execute(array($monto,$rut, $dv,$tarjeta,$ncta,$co_cta,$atm_sel));
		$id_solicitud = $con->lastInsertId();
		$pth = util::encodeParamURL('pth=cliente_giro_transaccion&from='.$from.'&rut='.$rut.'&dv='.$dv.'&co_cta='.$co_cta.'&paso=2&monto='.$monto.'&id_solicitud='.$id_solicitud.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3);
	}
	else if($paso == 2){
		// SE RESCATA RESPUESTA DE LA TRANSACCION

		$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");
		$fecha='';
		$fecha_cont='';
		$hora='';
		$cajero='';
		$operacion='';
		$saldo_total='';
		$giros_realizados='';
		$intereses='';
		$reajuste='';

		$n_operacion='';
		$n_cuenta='';
		$monto_op='';
		$max_giro='';
		$disponible='';
		
		$estado =0;
		$control =0; // permite saber si se obtuvo respuesta del host, en caso de que si se tenga respuesta no de debe hacer update de solicitud

		for($i=0; $i<= 3; $i++){
			$respuesta = $query->execute(array($id_solicitud));
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			if(count($resultado)){

				foreach($resultado as $row){
					$res = $row['resultado']; 
					$estado = $row['estado'];
					$res_2 = $row['resultado_2'];
				}
				if($estado ==1){

					$datos = explode(chr(14), $res);
					$datos2 = explode(chr(14), $res_2);
					$pos_max_giro =0;

					if($co_cta == 'AB' || $co_cta =='AC'){
						$pos_max_giro = 51;
					 	$pos_disponible = 54;
						if(array_key_exists(6,  $datos2)){
							$saldo_total =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[6]),1));
							$saldo_total= trim($saldo_total= str_replace(chr(12), " ", $saldo_total));
						}	
					}
					else {//CUENTA AHORRO
						$pos_max_giro = 49;
						$pos_disponible = 52;
						if(array_key_exists(3,  $datos2)){
							$saldo_total =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[3]),1));
							$saldo_total= trim($saldo_total= str_replace(chr(12), " ", $saldo_total));
						}
						if(array_key_exists(18,  $datos2)){
							$giros_realizados = trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[18]),1)));
						}
						if(array_key_exists(21,  $datos2)){
							$intereses = trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[21]),1)));
						}
						if(array_key_exists(24,  $datos2)){
							$reajuste = trim( preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos2[24]),1)));
							$reajuste= str_replace(chr(12), " ", $reajuste);
						}
					}

					if(array_key_exists(16,  $datos)){
						$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10);
						$n_operacion = substr($n_operacion, 1);
					}
					if(array_key_exists(17,  $datos)){
						$n_cuenta = substr($datos[17], 1, 18); 
					}
					if(array_key_exists(20,  $datos)){
						$monto_op=  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[20]),1)));
					}
					if(array_key_exists($pos_max_giro,  $datos)){
						$max_giro =  trim(preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[$pos_max_giro]),1)));
					}
					if(array_key_exists($pos_disponible,  $datos)){
						$disponible =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[$pos_disponible]),1));
						$disponible=trim(str_replace(chr(12), " ", $disponible));
					}
					if(array_key_exists(3,  $datos)){
						$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
						$fecha= substr($fecha, -10);
					}
					if(array_key_exists(5,  $datos)){
						$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
					}
					if(array_key_exists(4,  $datos)){
						$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
					}
					if(array_key_exists(6,  $datos)){
						$cajero =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1));
					}
					if(array_key_exists(17,  $datos)){
						$operacion =  preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17]));
					}
					$control =1;
				}
				else{
					//hay respuesta con error
					$error_arr = explode(chr(29), $res);
					if(array_key_exists(1,  $error_arr)){
					$res_erorr = $error_arr[1];
					$res_erorr = substr($res_erorr, 67);
					$res_erorr = substr($res_erorr, 0, -90);  
					$codigo_erorr = substr($res_erorr, 0, -20); 
					}
					else{
						$res_erorr = $error_arr[0];
					}
					$control =1;
				}

				break;
			}
			sleep(4);
		}
		if($control == 0){
			$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
            $respuesta = $query->execute(array($id_solicitud));
		}

		$pth = util::encodeParamURL('pth=cliente_giro_transaccion&from='.$from.'&rut='.$rut.'&dv='.$dv.'&co_cta='.$co_cta.'&paso=3&monto='.$monto.'&id_solicitud='.$id_solicitud.'&estado='.$estado.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&n_operacion='.$n_operacion.'&n_cuenta='.$n_cuenta.'&monto_op='.$monto_op.'&max_giro='.$max_giro.'&disponible='.$disponible.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&operacion='.$operacion.'&saldo_total='.$saldo_total.'&giros_realizados='.$giros_realizados.'&intereses='.$intereses.'&reajuste='.$reajuste.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
	}
	else if($paso == 3){
		$pth = util::encodeParamURL('pth=rh_consultasaldo_realizado&from=cliente&rut='.$rut.'&dv='.$dv.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta);
	}
	echo  json_encode($pth); 
}
else if($acc == "DEPOSITO_TRANSACCION")
{
	$from ='';
    $rut = '';
    $dv = '';
    $cta = '';
    $co_cta = '';

    $paso = '';
    $estado = '';
    $id_solicitud = '';

	$cta1 = '';
    $cta2 = '';
    $cta3 = '';

	$ncta = '';
    $ncta1 ='';
    $ncta2 ='';
	$ncta3 ='';
     
    $tarjeta = '';
    $tarjeta1 ='';
    $tarjeta2 ='';
    $tarjeta3 ='';

	$atm_sel ='';

	$res_erorr ='';
	$codigo_erorr ='';

	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
    if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
    if(isset($_REQUEST["cta"])) $cta = $_REQUEST["cta"];
	if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
 
    if(isset($_REQUEST["paso"])) $paso = $_REQUEST["paso"];
    if(isset($_REQUEST["estado"])) $estado = $_REQUEST["estado"];
    if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];

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

    if(isset($_REQUEST["total"])) $total = $_REQUEST["total"];
    if(isset($_REQUEST["cant_1"])) $cant_1 = $_REQUEST["cant_1"];
    if(isset($_REQUEST["cant_2"])) $cant_2 = $_REQUEST["cant_2"];
    if(isset($_REQUEST["cant_5"])) $cant_5 = $_REQUEST["cant_5"];
    if(isset($_REQUEST["cant_10"])) $cant_10 = $_REQUEST["cant_10"];
    if(isset($_REQUEST["cant_20"])) $cant_20 = $_REQUEST["cant_20"];

    if(isset($_REQUEST["atm_sel"])) $atm_sel = $_REQUEST["atm_sel"];

	if($from == 'DEPOSITO') $from = 'DEPOSITO';
	else $from = 'cliente';


	//VUELVO ATRA LOS CTAX COMO LO REQUIERE cunetas.php con from DEPOSITO
	if($from == 'DEPOSITO' && $paso == 3){

		if($cta1 == 'CUENTA CORRIENTE') $cta1 = 'AB';
    	else if($cta1 == 'CUENTA VISTA') $cta1 = 'AC';
 	   	else if($cta1 == 'CUENTA AHORRO') $cta1 = 'AD'	;

 	   	if($cta2 == 'CUENTA CORRIENTE') $cta2 = 'AB';	
    	else if($cta2 == 'CUENTA VISTA') $cta2 = 'AC';
    	else if($cta2 == 'CUENTA AHORRO') $cta2 = 'AD';
  
    	if($cta3 == 'CUENTA CORRIENTE') $cta3 = 'AB';
    	else if($cta3 == 'CUENTA VISTA') $cta3 = 'AC';
    	else if($cta3 == 'CUENTA AHORRO') $cta3 = 'AD';
	}


	if($paso == 1){
		//SE INSERTA SOLICITUD DE TRANSACCION
		//EN CASO DE QUERER GUARDAR CANTIDAD POR BILLETES SE INSERTA AQUI EN LA SOLICITUD
		$cantidad_billetes = 'w';
		if($cant_5 != 0)  $cantidad_billetes .= '07'.$cant_5;
		if($cant_10 != 0)  $cantidad_billetes .= '08'.$cant_10;
		if($cant_20 != 0)  $cantidad_billetes .= '09'.$cant_20;
		if($cant_2 != 0)  $cantidad_billetes .= '0A'.$cant_2;
		if($cant_1 != 0)  $cantidad_billetes .= '0B'.$cant_1;



		 $id_solicitud;
		 $query =$con->prepare("INSERT INTO solicitud (solicitud, lista,rut,dv,monto_deposito,tarjeta,cuenta,co_cuenta, atm) VALUES (3,0,?,?,?,?,?,?,?)");
         $respuesta = $query->execute(array($rut,$dv,$cantidad_billetes,$tarjeta,$ncta,$co_cta, $atm_sel));
		 $id_solicitud = $con->lastInsertId();

		$pth = util::encodeParamURL('pth=deposito_efectivo&rut='.$rut.'&dv='.$dv.'&from='.$from.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&id_solicitud='.$id_solicitud.'&paso=2');
	
	}
	else if($paso == 2){
		// SE RESCATA RESPUESTA DE LA TRANSACCION

		$n_operacion ='';
		$rut_cliente ='';
		$n_cuenta ='';
		$monto_op ='';
		$estado =0;
		$control =0;

		$fecha='';
		$fecha_cont='';
		$hora='';
		$cajero='';
		$operacion='';
	
		$query =$con->prepare("SELECT * FROM resultado WHERE id_transaccion =?");
		$estado =0;

		for($i=0; $i<= 3; $i++){
			$respuesta = $query->execute(array($id_solicitud));
			$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
			if(count($resultado)){

				foreach($resultado as $row){
					$res = $row['resultado']; 
					$estado = $row['estado'];
					$res_2 = $row['resultado_2'];
				}
				if($estado == 1){
					$datos = explode(chr(14), $res);
					$datos2 = explode(chr(14), $res_2);

					if(array_key_exists(3,  $datos)){
						$fecha =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[3]),1));
						$fecha= substr($fecha, -10);
					}
					if(array_key_exists(5,  $datos)){
						$fecha_cont =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[5]),1));
					}
					if(array_key_exists(4,  $datos)){
						$hora =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[4]),1));
					}
					if(array_key_exists(6,  $datos)){
						$cajero =  preg_replace("/[\r\n|\n|\r]+/", " ",substr(strval($datos[6]),1));
					}
					if(array_key_exists(17,  $datos)){
						$operacion =  preg_replace("/[^a-zA-Z]+/", " ",strval($datos[17]));
						$operacion = substr($operacion, 0, -10); 
						$rut_cliente = substr(preg_replace("/[\r\n|\n|\r]+/", " ", strval($datos[17])),1,12) ; 	
					}
					if(array_key_exists(16,  $datos)){
						$n_operacion = intval(preg_replace('/[^0-9]+/', '', $datos[16]), 10);
						$n_operacion = substr($n_operacion, 1);
					}
					if(array_key_exists(19,  $datos)){
						$n_cuenta = substr($datos[19], 1, 18); 
					}
					if(array_key_exists(42,  $datos)){
						$pos_42 = preg_replace("/[\r\n|\n|\r]+/", " ", strval($datos[42])) ;
						$pos_42=str_replace(chr(12), " ", $pos_42);
						$monto_op=trim(substr($pos_42,2));
					}
					$control =1;	
				}
				else{
					//hay respuesta con error
					$error_arr = explode(chr(29), $res);
					if(array_key_exists(1,  $error_arr)){
					$res_erorr = $error_arr[1];
					$res_erorr = substr($res_erorr, 67);
					$res_erorr = substr($res_erorr, 0, -90);  
					$codigo_erorr = substr($res_erorr, 0, -20); 
					}
					else{
						$res_erorr = $error_arr[0];
					}
					$control =1;
				}

				break;
			}
			sleep(4);
		}
		if($control == 0){
			$query =$con->prepare("UPDATE solicitud SET lista =1 WHERE id = ?  ");
            $respuesta = $query->execute(array($id_solicitud));
		}

	
		
		$pth = util::encodeParamURL('pth=deposito_efectivo&rut='.$rut.'&dv='.$dv.'&from='.$from.'&cta='.$cta.'&co_cta='.$co_cta.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta.'&id_solicitud='.$id_solicitud.'&n_operacion='.$n_operacion.'&rut_cliente='.$rut_cliente.'&n_cuenta='.$n_cuenta.'&monto_op='.$monto_op.'&estado='.$estado.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&operacion='.$operacion.'&paso=3'.'&control='.$control.'&res_erorr='.$res_erorr.'&codigo_erorr='.$codigo_erorr);
	}
	else if($paso == 3){
		$pth = util::encodeParamURL('pth=rh_consultasaldo_realizado&from='.$from.'&rut='.$rut.'&dv='.$dv.'&cta1='.$cta1.'&cta2='.$cta2.'&cta3='.$cta3.'&ncta='.$ncta.'&ncta1='.$ncta1.'&ncta2='.$ncta2.'&ncta3='.$ncta3.'&tarj1='.$tarjeta1.'&tarj2='.$tarjeta2.'&tarj3='.$tarjeta3.'&tarj='.$tarjeta);
	}
	echo  json_encode($pth); 
}
else if($acc == "DESCARGA_CONSULTA")
{
    $rut = '';
    $dv = '';
    $id_solicitud = '';

	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$n_operacion='';
	$ncuenta='';
	$operacion='';
	$max_giro='';
	$disponible='';
	$saldo_total='';
	$car_1='';
    $car_2='';
    $fec_cap='';
    $co_cta='';

	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["ncuenta"])) $ncuenta = $_REQUEST["ncuenta"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
	if(isset($_REQUEST["max_giro"])) $max_giro = $_REQUEST["max_giro"];
    if(isset($_REQUEST["disponible"])) $disponible = $_REQUEST["disponible"];
    if(isset($_REQUEST["saldo_total"])) $saldo_total = $_REQUEST["saldo_total"];
    if(isset($_REQUEST["car_1"])) $car_1 = $_REQUEST["car_1"];
    if(isset($_REQUEST["car_2"])) $car_2 = $_REQUEST["car_2"];
    if(isset($_REQUEST["fec_cap"])) $fec_cap = $_REQUEST["fec_cap"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
 
	$pth =  util::encodeParamURL('pth=comprobantepdf_consulta&rut='.$rut.'&dv='.$dv.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&ncuenta='.$ncuenta.'&operacion='.$operacion.'&max_giro='.$max_giro.'&disponible='.$disponible.'&saldo_total='.$saldo_total.'&car_1='.$car_1.'&car_2='.$car_2.'&fec_cap='.$fec_cap.'&co_cta='.$co_cta);
   
	echo  json_encode($pth); 
}
else if($acc == "DESCARGA_GIRO")
{
    $rut = '';
    $dv = '';
    $id_solicitud = '';

	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$n_operacion='';
	$n_cuenta='';
	$operacion='';

	$monto_op='';
	$max_giro='';
	$disponible='';
	$saldo_total='';
    $giros_realizados='';
    $intereses='';
    $reajuste='';

	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
	if(isset($_REQUEST["max_giro"])) $max_giro = $_REQUEST["max_giro"];
    if(isset($_REQUEST["disponible"])) $disponible = $_REQUEST["disponible"];
    if(isset($_REQUEST["saldo_total"])) $saldo_total = $_REQUEST["saldo_total"];
    if(isset($_REQUEST["giros_realizados"])) $giros_realizados = $_REQUEST["giros_realizados"];
    if(isset($_REQUEST["intereses"])) $intereses = $_REQUEST["intereses"];
    if(isset($_REQUEST["reajuste"])) $reajuste = $_REQUEST["reajuste"];
    if(isset($_REQUEST["co_cta"])) $co_cta = $_REQUEST["co_cta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
 
	$pth =  util::encodeParamURL('pth=comprobantepdf_giro&rut='.$rut.'&dv='.$dv.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&n_cuenta='.$n_cuenta.'&operacion='.$operacion.'&max_giro='.$max_giro.'&disponible='.$disponible.'&saldo_total='.$saldo_total.'&giros_realizados='.$giros_realizados.'&intereses='.$intereses.'&reajuste='.$reajuste.'&monto_op='.$monto_op.'&co_cta='.$co_cta);
   
	echo  json_encode($pth); 
}
else if($acc == "DESCARGA_DEPOSITO")
{
    
    $id_solicitud = '';
	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$operacion='';
	$n_operacion ='';
	$rut_cliente ='';
	$n_cuenta ='';
	$monto_op ='';



    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["rut_cliente"])) $rut_cliente = $_REQUEST["rut_cliente"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
    if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
    if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
 
	$pth =  util::encodeParamURL('pth=comprobantepdf_deposito&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&n_cuenta='.$n_cuenta.'&operacion='.$operacion.'&monto_op='.$monto_op.'&rut_cliente='.$rut_cliente);
   
	echo  json_encode($pth); 
}
else if($acc == "DESCARGA_COMSULTA_CMR")
{
    
    $rut = '';
    $dv = '';
    $id_solicitud = '';
	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$operacion='';
	$n_operacion ='';
	$n_tarjeta ='';
	$n_cuenta ='';
	$disp_avance ='';
    $disp_cred_consumo ='';
    $disp_compras ='';


	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
    if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_tarjeta"])) $n_tarjeta = $_REQUEST["n_tarjeta"];
    if(isset($_REQUEST["n_cuenta"])) $n_cuenta = $_REQUEST["n_cuenta"];

    if(isset($_REQUEST["disp_avance"])) $disp_avance = $_REQUEST["disp_avance"];
    if(isset($_REQUEST["disp_cred_consumo"])) $disp_cred_consumo = $_REQUEST["disp_cred_consumo"];
    if(isset($_REQUEST["disp_compras"])) $disp_compras = $_REQUEST["disp_compras"];

 
	$pth =  util::encodeParamURL('pth=comprobantepdf_consulta_cmr&rut='.$rut.'&dv='.$dv.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&n_cuenta='.$n_cuenta.'&operacion='.$operacion.'&n_tarjeta='.$n_tarjeta.'&disp_avance='.$disp_avance.'&disp_cred_consumo='.$disp_cred_consumo.'&disp_compras='.$disp_compras);
   
	echo  json_encode($pth); 
}
else if($acc == "DESCARGA_AVANCE_CMR")
{
    
    $rut_op = '';
    $id_solicitud = '';
	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$operacion='';
	$n_operacion ='';
	$n_tarjeta ='';

	$monto_op ='';
    $cuotas_op ='';
    $nombre_op ='';



	if(isset($_REQUEST["rut_op"])) $rut_op = $_REQUEST["rut_op"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_tarjeta"])) $n_tarjeta = $_REQUEST["n_tarjeta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
    if(isset($_REQUEST["cuotas_op"])) $cuotas_op = $_REQUEST["cuotas_op"];
    if(isset($_REQUEST["nombre_op"])) $nombre_op = $_REQUEST["nombre_op"];

 
	$pth =  util::encodeParamURL('pth=comprobantepdf_avance_cmr&rut_op='.$rut_op.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&operacion='.$operacion.'&n_tarjeta='.$n_tarjeta.'&monto_op='.$monto_op.'&cuotas_op='.$cuotas_op.'&nombre_op='.$nombre_op);
   
	echo  json_encode($pth); 
}
else if($acc == "GET_ATMS")
{
	$query =$con->prepare("SELECT * FROM atm ");
	$respuesta = $query->execute();
	$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
	$pth=$resultado;
	echo  json_encode($pth); 
}
else if($acc == "GOTO_INICIO")
{
	$atm_sel = '';
	if(isset($_REQUEST["atm_sel"])) $atm_sel = $_REQUEST["atm_sel"];
	$ocupado ='';



	$query =$con->prepare("SELECT * FROM atm WHERE numero =?");
	$respuesta = $query->execute(array($atm_sel));
	$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
	foreach ($resultado as $row) {
		$ocupado = $row['ocupado'];

	}
	
	if($ocupado == 1){
		//Ya esta seleccionado
		$pth =  util::encodeParamURL('pth=home&msj=1');
	}
	else{
		//se puede seleccionar
		$query =$con->prepare("UPDATE atm SET ocupado = 1 WHERE numero = ?");
		$respuesta = $query->execute(array($atm_sel));
		$pth =  util::encodeParamURL('pth=principal&atm_sel='.$atm_sel);
	}
	
	echo  json_encode($pth); 
}
else if($acc == "CIERRE")
{

		//SE LIBERA EL ATM ACTIVO EN LA SESION ANTES DE DESTRUIRLA
		$atm_activo =$_SESSION['atm_sel'];
		$query =$con->prepare("UPDATE atm SET ocupado = 0 WHERE numero = ?");
		$respuesta = $query->execute(array($sel));
		session_unset();
		//Destruimos sesión.
		session_destroy();              
		//Redirigimos pagina.
		$pth=''; 
		echo  json_encode($pth); 

}
else if($acc == "SUPER_AVANCE_CMR")
{
    $monto = $_REQUEST["monto"];
    $tarjeta = $_REQUEST["tarjeta"];

	//$url = 'http://172.20.249.110:8086/cgi-bin/simulacionCMR?tipo=SUPERAVANCE&monto='.$monto.'&tarjeta='.$tarjeta; 
	$url = 'http://172.20.249.243:9080/Super_Avance?tipo=SUPERAVANCE&monto='.$monto.'&tarjeta='.$tarjeta;

	$consultaSB =  file_get_contents($url);
	$resp = json_decode($consultaSB);
	$xml = $resp->transaccion->salida;
		
	// $consultaSB =  file_get_contents($url);
	// //$resp = json_decode($consultaSB);
	// $xml = new SimpleXMLElement($consultaSB);
	// $xml = $xml->salida;

	if($xml->codigo_error == '0'){
		$respuesta = array(
			"1" => $xml,
			"2" => '1',
		);
		echo json_encode($respuesta);
	}
	else{
		$respuesta = array(
			"1" => $xml,
			"2" => '0',
		);
		echo json_encode($respuesta);
	}
	
}
else if($acc == "SUPER_AVANCE_CUOTAS_CMR")
{
	$from = '';
    $rut = '';
    $dv = '';
    $tarjeta = '';
    $nombre = '';
    $avance = '';
    $super = '';
    $monto = '';

    $normal_12 = '';
    $normal_15 = '';
    $normal_18 = '';
    $normal_24 = '';
    $normal_36 = '';
    $normal_48 = '';

	$diferido_12 = '';
    $diferido_15 = '';
    $diferido_18 = '';
    $diferido_24 = '';
    $diferido_36 = '';
    $diferido_48 = '';
   


	if(isset($_REQUEST["from"])) $from = $_REQUEST["from"];
	if(isset($_REQUEST["rut"])) $rut = $_REQUEST["rut"];
	if(isset($_REQUEST["dv"])) $dv = $_REQUEST["dv"];
	if(isset($_REQUEST["tarjeta"])) $tarjeta = $_REQUEST["tarjeta"];
	if(isset($_REQUEST["nombre"])) $nombre = $_REQUEST["nombre"];
	if(isset($_REQUEST["avance"])) $avance = $_REQUEST["avance"];
	if(isset($_REQUEST["super"])) $super = $_REQUEST["super"];
	if(isset($_REQUEST["monto"])) $monto = $_REQUEST["monto"];

	if(isset($_REQUEST["normal_12"])) $normal_12 = $_REQUEST["normal_12"];
	if(isset($_REQUEST["normal_15"])) $normal_15 = $_REQUEST["normal_15"];
	if(isset($_REQUEST["normal_18"])) $normal_18 = $_REQUEST["normal_18"];
	if(isset($_REQUEST["normal_24"])) $normal_24 = $_REQUEST["normal_24"];
	if(isset($_REQUEST["normal_36"])) $normal_36 = $_REQUEST["normal_36"];
	if(isset($_REQUEST["normal_48"])) $normal_48 = $_REQUEST["normal_48"];

	if(isset($_REQUEST["diferido_12"])) $diferido_12 = $_REQUEST["diferido_12"];
	if(isset($_REQUEST["diferido_15"])) $diferido_15 = $_REQUEST["diferido_15"];
	if(isset($_REQUEST["diferido_18"])) $diferido_18 = $_REQUEST["diferido_18"];
	if(isset($_REQUEST["diferido_24"])) $diferido_24 = $_REQUEST["diferido_24"];
	if(isset($_REQUEST["diferido_36"])) $diferido_36 = $_REQUEST["diferido_36"];
	if(isset($_REQUEST["diferido_48"])) $diferido_48 = $_REQUEST["diferido_48"];

	if($from =='MONTOSSA'){
		$pth = util::encodeParamURL('pth=credito_consumo_cuotasCMR&from=normal&rut='.$rut.'&dv='.$dv.'&tarjeta='.$tarjeta.'&nombre='.$nombre.'&avance='.$avance.'&super='.$super.'&monto='.$monto.'&normal_12='.$normal_12.'&normal_15='.$normal_15.'&normal_18='.$normal_18.'&normal_24='.$normal_24.'&normal_36='.$normal_36.'&normal_48='.$normal_48.'&diferido_12='.$diferido_12.'&diferido_15='.$diferido_15.'&diferido_18='.$diferido_18.'&diferido_24='.$diferido_24.'&diferido_36='.$diferido_36.'&diferido_48='.$diferido_48);
	}

	echo  json_encode($pth); 

	
}
else if($acc == "DESCARGA_SUPER_AVANCE_CMR")
{
    
    $rut_op = '';
    $id_solicitud = '';
	$fecha='';
	$fecha_cont='';
	$hora='';
	$cajero='';
	$operacion='';
	$n_operacion ='';
	$n_tarjeta ='';

	$monto_op ='';
    $cuotas_op ='';
    $nombre_op ='';



	if(isset($_REQUEST["rut_op"])) $rut_op = $_REQUEST["rut_op"];
	if(isset($_REQUEST["id_solicitud"])) $id_solicitud = $_REQUEST["id_solicitud"];
    if(isset($_REQUEST["fecha"])) $fecha = $_REQUEST["fecha"];
    if(isset($_REQUEST["fecha_cont"])) $fecha_cont = $_REQUEST["fecha_cont"];
    if(isset($_REQUEST["hora"])) $hora = $_REQUEST["hora"];
	if(isset($_REQUEST["cajero"])) $cajero = $_REQUEST["cajero"];
    if(isset($_REQUEST["operacion"])) $operacion = $_REQUEST["operacion"];
    if(isset($_REQUEST["n_operacion"])) $n_operacion = $_REQUEST["n_operacion"];
    if(isset($_REQUEST["n_tarjeta"])) $n_tarjeta = $_REQUEST["n_tarjeta"];
    if(isset($_REQUEST["monto_op"])) $monto_op = $_REQUEST["monto_op"];
    if(isset($_REQUEST["cuotas_op"])) $cuotas_op = $_REQUEST["cuotas_op"];
    if(isset($_REQUEST["nombre_op"])) $nombre_op = $_REQUEST["nombre_op"];

 
	$pth =  util::encodeParamURL('pth=comprobantepdf_super_avance_cmr&rut_op='.$rut_op.'&id_solicitud='.$id_solicitud.'&fecha='.$fecha.'&fecha_cont='.$fecha_cont.'&hora='.$hora.'&cajero='.$cajero.'&n_operacion='.$n_operacion.'&operacion='.$operacion.'&n_tarjeta='.$n_tarjeta.'&monto_op='.$monto_op.'&cuotas_op='.$cuotas_op.'&nombre_op='.$nombre_op);
   
	echo  json_encode($pth); 
}
///////////////////////////utilizadas Parte II
else if($acc == "PERF_CMR"){
	if (!empty($_REQUEST["tarjeta"])) {

		$tarjeta = str_replace(' ', '', $_REQUEST["tarjeta"]);
		$respuesta =  util::perfilacionCMR($tarjeta);

		echo json_encode($respuesta);

	}


}
else if($acc == "ERROR_PERF")
{
	$from = isset($_REQUEST["from"]) ? $_REQUEST["from"] : '';
	$tipo_error = isset($_REQUEST["tipo_error"]) ? $_REQUEST["tipo_error"] : '';

	$pth = util::encodeParamURL('pth=perfilacion_error&from='.$from).'&tipo_error='.$tipo_error;
	echo  json_encode($pth); 
}











?>