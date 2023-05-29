<?php 
//session_start();
// session_unset();
// session_destroy();

//util class
//include ('./util/util.php');

//Factory Class
//include ('./datos/DBFactory.php');

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<title>ATM - Virtual 1.0</title>
	<meta charset="utf-8">
	<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<![endif]-->
	<meta name="description" content="ATM Virtualizado Banco Falabella">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/animations.css">
	<link rel="stylesheet" href="css/fonts.css">
	<link rel="stylesheet" href="css/main.css" class="color-switcher-link">
	<script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <script src="js/util.js"></script>

	<!--[if lt IE 9]>
		<script src="js/vendor/html5shiv.min.js"></script>
		<script src="js/vendor/respond.min.js"></script>
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<![endif]-->

</head>

<body>
	
	<!-- wrappers for visual page editor and boxed version of template -->
	<div id="canvas">
		<div id="box_wrapper">

			<header class="page_header header_white toggler_xs_right section_padding_20">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell">
								<a href="./" class="logo top_logo">									
									<span class="logo_text">
										<span class="big" style="color: #219543;">ATM</span>
										<span class="small-text">Banco Falabella</span>
									</span>
								</a>
							</div>

						</div>
					</div>
				</div>
			</header>

			<section class="ls section_padding_top_100 section_padding_bottom_150">
				<div class="container">
					
                    <form name="frm_1" id="frm_1"  class="contact-form row columns_margin_bottom_20" >
                    <input type="hidden" id="acc" name="acc" value="VALUSR" />


						<div class="col-md-12">
							<div class="form-group">
								<label for="pickup-name">Usuario
									<span class="required">*</span>
								</label>
								<i class="fa fa-user highlight2" aria-hidden="true"></i>
								<input type="text" aria-required="true" size="30" value="" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="pickup-phone">Clave
									<span class="required">*</span>
								</label>
								<i class="fa fa-key highlight2" aria-hidden="true"></i>
								<input type="password" aria-required="true" size="30" value="" name="password" id="password" class="form-control" placeholder="Clave">
							</div>
						</div>




						<div class="col-sm-12">

							<div class="contact-form-submit topmargin_20">
								<button id="btn-ingreso" onclick="javascript:doIngreso();" class="theme_button color1">Ingresar</button>
                                <span id="div_work"></span>
							</div>
						</div>


						</form>
				</div>
			</section>

			<section class="ls page_copyright section_padding_15">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<p class="small-text small-spacing grey">&copy; ATM Virtual 2023</p>
						</div>
					</div>
				</div>
			</section>

		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->

	<script src="js/compressed.js"></script>
	<script src="js/main.js"></script>
</body>


<script type="text/javascript">
			function validaNomUsuario()
			{
				
				if($("#usuario").val()=="")
	            {
					$("#div_work").html("Debes indicar tu nombre de usuario!");
		        }else
		        {
		        

		        }
		        
			}
			function validaClave()
			{
				
				if($("#password").val()=="")
	            {
					$("#div_work").html("Debes ingresar tu contraseña!");
		        }else
		        {
		        	

		        }
			}
		    function doIngreso()
		    {       
		    	
			        $("#div_work").html("Accediendo al Sistema ...");
                    $("#btn-ingreso").fadeOut("fast");
                    
				
		        	var contError = 0;
		            
		            if($("#usuario").val()=="")
		            {
		                contError ++;
				         validaNomUsuario();
     
		            }
		            if($("#password").val()=="")
		            {
		                contError ++;
				         validaClave();       

		            }
		            mensajeErr ="";
		            if(contError > 0)
		        	{
		        		
                        $("#btn-ingreso").fadeIn("fast");
		        		
		        	}
		        	else
		        	{
		        		
		        		
		        		msjError = "No pudimos realizar lo solicitado";
		        		urlIn = "./srv/sistema.php";
		        		formalioID = "frm_1";
		        		srv="VALUSR";
		        		var valida = getDataJsonSbm(urlIn,formalioID,srv,msjError);
		                //location.href = urlEnv;
		                if(valida == "OK")
		                {
		                	location.href = './';
	
		                }else
		                {
		                	msg='EL usuario o la clave ingresada no es correcta, por favor intenta nuevamene.';
		                    $("#div_work").html(msg);
                            $("#btn-ingreso").fadeIn("fast");
		                }
		                
		                  
		                
		        	}
		    }
		</script>

</html>