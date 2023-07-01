/*
 * Tipo: 
 * 			1= normal
 *			2= largo
 *			3= pequeño 
 * */
function openModal(tipo)
{	
	if(tipo==1)
	{	
		$('#normalModal').modal({
	        show: 'false'	 
        });
	}
	if(tipo==2)
	{	
		$('#largeModal').modal({
	        show: 'false'	 
        });
	}
	if(tipo==3)
	{	
		$('#smallModal').modal({
	        show: 'false'	 
        });
	}
	

}
function alerta(titulo,mensaje,btn)
{
	// LEVANTA MODAL
	 $('#modalMensaje').modal({
	        show: 'false'	 
	     });
	    
	
	var modalTitle = "Mensaje "+titulo;
	var modalBody = "<div style=\"width:100%; text-align: left\"> <strong> "+mensaje+" </strong><br /><br />";
	modalBody +="</div>";
	var modaFooter = ' <button type="button" class="btn btn-default" data-dismiss="modal">Entendido</button>';
	if(btn != "")
	{
		modaFooter = btn;
	}
	
	$("#modalTitle").html(modalTitle);
	$("#modalBody").html(modalBody);
	$("#modaFooter").html(modaFooter);
	

}
function formatLatino(num)
{
	var num = format(num);
	num = replaceAll(num,".","_");
	num = replaceAll(num,",",".");
	num = replaceAll(num,"_",",");
	return num;
	
}

function format(num){
    var n = num.toString(), p = n.indexOf('.');
    return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, function($0, i){
        return p<0 || i<p ? ($0+',') : $0;
    });

    
}
function backW()
{
	window.history.back();
}
function popup(url,ancho,alto)
{
	//console.log("LLEGO:"+url);
    URL=url;
    day = new Date();
    id = day.getTime();
    eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=1,width="+ancho+",height="+alto+",left = 100,top = 30');");

}
function reloadLocal()
{
	location.href = location.href;
}
function goto(url_env)
{
	location.href = url_env;
}
function esImagen(fileIn)
{
	var salida="Debes subir una imagen que tenga los siguientes formatos (png | jpg | gif | tif)";
	str=fileIn.substr(-3);
	str=str.toLowerCase();
	if(str == "png" || str == "jpg" || str == "tif" ||str == "gif" )
	{
		salida="ok";
	}
		
	return(salida);
}
/**
 *RELLENA CON CEROS A LA IZQUIERDA
**/
function lpad (n, length) {
    var  n = n.toString();
    while(n.length < length)
         n = "0" + n;
    return n;
}
/**
 *RELLENA CON CEROS A LA DERECHA
**/
function rpad (n, length) {
    var  n = n.toString();
    while(n.length < length)
         n =  n + "0";
    return n;
}
/**
 * replaceAll( text, busca, reemplaza )
 * [12-01-2016]-DOO: Reemplata todo el texto en base a lo que se solicite retorna el texto reemplazado
 * Version: 1.0
 * Estado: En Operacion
 * text: String que quiere ser reemplazado
 * busca: String dentre del text que se quiere reemplazar
 * reemplaza: String que reeemplazara el texto buscado
 */
function replaceAll( text, busca, reemplaza ){
  while (text.toString().indexOf(busca) != -1)
      text = text.toString().replace(busca,reemplaza);
  return text;
}
function validaNumeroDecimal(valor, decimalSeparator){
	
	if(decimalSeparator == ".")
	{
		valor = replaceAll(valor, ".", ",");
	}
	
	salida = validateDecimal(valor);
	
	console.log("salida:"+salida);
	
	return salida; 
	  
}
function validateDecimal(valor) {
    var RE = /^[0-9]+([,][0-9]+)?$/;
    if (RE.test(valor)) {
        return "OK";
    } else {
        return "ERROR";
    }
}
function validarSiNumero(numero){
    var salida ="OK";
	if (!/^([0-9])*$/.test(numero))
    	{
    		salida ="ERROR";
    	}
	
	return salida;
      
}
function abreDetIcon(id)
{
	$("#"+id).attr('class', 'fa fa-folder-open-o');
}
function cierraDetIcon(id)
{
	$("#"+id).attr('class', 'fa fa-folder-o');
}
function ValidateIPaddress(ipaddress)   
{  
	 if (/^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$/.test(ipaddress))  
	  {  
	    return (true)  
	  }
	return (false)  
}  
function closeOpen(cls1,cls2,cls3,opn1,opn2,opn3)
{
	if(cls1 != "")
	{
		$("#"+cls1).hide("fade",10);
	}
	if(cls2 != "")
	{
		$("#"+cls2).hide("fade",20);		
	}
	if(cls3 != "")
	{
		$("#"+cls3).hide("fade",30);
	}
	if(opn1 != "")
	{
		$("#"+opn1).show("fade",700);
	}
	if(opn2 != "")
	{
		$("#"+opn2).show("fade",800);
	}
	if(opn3 != "")
	{
		$("#"+opn3).show("fade",900);
	}

}
/**
 * getDataJsonSbm(urlIn,formalioID,srv,msjError)
 * [09-01-2016]-DOO: Envia los datos del formulario via AJAX No por URL 
 * NOTA: la variable acc debe estar creada en el formulario
 * Version: 1.0
 * Estado: En Operacion
 * urlIn        : url de la capa de servicio ["../srv/flujo.php"]
 * formalioID   : id del Formulario que se requiere enviar 
 * srv          : Nombre del servicio a llamar ["GETTIPOACTIVIDAD"]
 * msjError     : Definir el mensaje de error a mostras ["No pudimos traer el tipo de Actividad"]
 */
function getDataJsonSbm(urlIn,formalioID,srv,msjError)
{
    $("#acc").val(srv);  
    var devuelve="";
    var url = urlIn; // El script a dónde se realizará la petición.
    $.ajax({
            url: url, 
            type: "POST",             
            data: new FormData($("#"+formalioID)[0]),
            contentType: false,       
            cache: false,             
            processData:false,
            dataType: "json",  
            async: false,
            success: function(getObj)
            {
                if(!(getObj))
                {
                     return false;
                }
                devuelve=getObj;
                 
            },
            error: function (a,b,c) {
            	 console.log("Error Srv: "+srv);
            	 console.log("Error (a):"+a);  
                 console.log("Error (b):"+b); 
                 console.log("Error (c):"+c);
            }
         });
  return devuelve;
}

/**
 * getDataJsonSbmAsync(urlIn,formalioID,srv,msjError)
 * [09-01-2016]-DOO: Envia los datos del formulario via AJAX No por URL 
 * NOTA: la variable acc debe estar creada en el formulario
 * Version: 1.0
 * Estado: En Operacion
 * urlIn        : url de la capa de servicio ["../srv/flujo.php"]
 * formalioID   : id del Formulario que se requiere enviar 
 * srv          : Nombre del servicio a llamar ["GETTIPOACTIVIDAD"]
 * msjError     : Definir el mensaje de error a mostras ["No pudimos traer el tipo de Actividad"]
 */
function getDataJsonSbmAsync(urlIn,formalioID,srv,msjError)
{

    $("#acc").val(srv);    
    var devuelve="";
    var url = urlIn; // El script a dónde se realizará la petición.
    $.ajax({
            url: url, 
            type: "POST",             
            data: new FormData($("#"+formalioID)[0]),
            contentType: false,       
            cache: false,             
            processData:false,
            dataType: "json",  
            async: true,
            success: function(getObj)
            {
                if(!(getObj))
                {
                     return false;
                }
                devuelve=getObj;
                 
            },
            error: function (a,b,c) {
            	console.log("Error Srv: "+srv);
           	 	console.log("Error (a):"+a);  
                console.log("Error (b):"+b); 
                console.log("Error (c):"+c);   
                //mensajeError(msjError);    //Pendiente

            }
         });
  return devuelve;
}

/**
 * getDataJson(urlIn,dataIn,srv,msjError)
 * [07-01-2016]-DOO: Funcion que ejecuta Json sincronicamente Normal
 * Version: 1.0
 * Estado: En Operacion
 * urlIn    : url de la capa de servicio ["../srv/flujo.php"]
 * dataIn   : Datos a enviar formato URL ["acc=GETTIPOACTIVIDAD"] 
 * srv      : Nombre del servicio a llamar ["GETTIPOACTIVIDAD"]
 * msjError : Definir el mensaje de error a mostras ["No pudimos traer el tipo de Actividad"]
 * debug    : Habilia el debug en la consola d Javascript ["SI"] o ["NO"]
 * Ejemplo  : //eg:  getDataJson("../srv/flujo.php","acc=GETTIPOACTIVIDAD","GETTIPOACTIVIDAD","No pudimos traer el tipo de Actividad","SI")
 */
function getDataJson(urlIn,dataIn,srv,msjError,debug)
{
    if(debug == "SI")
    {
        console.log("ENVIO:["+urlIn+"?"+dataIn+"]");    
    }
    
    var devuelve="";
         $.ajax({
        type: "POST",
        url: urlIn,   
        data: dataIn, 
        dataType: "json", 
        async: false,
        success: function (getSrv) {
            
                if(!(getSrv))
                {
                     return false;
                }
                devuelve=getSrv;
                 
            },
                error: function (a,b,c) {
                    
                //mensajeError(msjError);    
                //console.log("Error GET "+srv+":" + a + b + c);
                
            }
        }); 
    return devuelve;
}
function getDataJsonAsync(urlIn,dataIn,srv,msjError)
{
    
    //console.log(urlIn+"?"+dataIn);
    //eg:  getData("../srv/flujo.php","acc=GETTIPOACTIVIDAD","GETTIPOACTIVIDAD","No pudimos traer el tipo de Actividad")
    var devuelve="";
         $.ajax({
        type: "POST",
        url: urlIn,   //"../srv/flujo.php",
        data: dataIn, //"acc=GETACTARECHAZAR&actividadid="+actividadid+"&flujoid="+$("#flujoid").val(),
        dataType: "json", 
        async: true,
        success: function (getSrv) {
            
                if(!(getSrv))
                {
                     alertaSistemaOnly(msjError);
                     return false;
                }
                devuelve=getSrv;
                 
            },
                error: function (a,b,c) {
                    
               // muestraMensajeTrabjandoNoBloqueo('<img src="../images/faceTriste.png" />',msjError,'');    
                console.log("Error GET "+srv+":" + a + b + c);
                
            }
        }); 
    return devuelve;
}

function isValidDate(day,month,year)
{
    /*
     * Funcion que muestra OK o KO dependiendo de si la fecha es correcta.
     *
     * Tiene que recibir el dia, mes y año
     */

    var dteDate;

    // En javascript, el mes empieza en la posicion 0 y termina en la 11
    // siendo 0 el mes de enero
    // Por esta razon, tenemos que restar 1 al mes
    month=month-1;
    // Establecemos un objeto Data con los valore recibidos
    dteDate=new Date(year,month,day);

    //Si el dia, mes y año concuerdan...
    if ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()))
        return(true);
    else
        return(false);

    //Si deseamos que devuelva true o false...
    //return ((day==dteDate.getDate()) && (month==dteDate.getMonth()) && (year==dteDate.getFullYear()));
}
//
// Validador de Rut
//
function revisarDigito( dvr,inputid )
{	
     err = "";
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		err = "Debe ingresar un digito verificador valido ";		
		$("#"+inputid).focus();		
		$("#"+inputid).select();	
	}	
	return err;
}

function revisarDigito2( crut,inputid )
{	
    err = "";
	largo = crut.length;	
	if ( largo < 2 )	
	{		
		err = "Debe ingresar el rut completo ";		
		$("#"+inputid).focus();		
		$("#"+inputid).select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	error = revisarDigito( dv,inputid );
    if(error != "")
    {
        err += error;
    }	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
	    err = "El rut ingresado es incorrecto ";	
		$("#"+inputid).focus();		
		$("#"+inputid).select();			
	}

	return err;
}

function ValidaRut(texto,inputid)
{	
    valError = "";
	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		valError = "Debe ingresar el rut completo";		
		$("#"+inputid).focus();		
		$("#"+inputid).select();		
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			valError = "El valor ingresado no corresponde a un R.U.T valido ";			
			$("#"+inputid).focus();			
			$("#"+inputid).select();				
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);			

	error = revisarDigito2(texto,inputid)
    if(error == "")
    {
        	$("#"+inputid).val(invertido);	 
    }else{
       	valError = error;
    }
    return valError; 		

}
function justNumbers(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum == 8) || (keynum == 46) || (keynum == 9) || (keynum == 43))
    return true;
             
    return /\d/.test(String.fromCharCode(keynum));
}
function validarEmail(email) 
{
    
    expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    if ( !expr.test(email) )
    {
        //console.log("validarEmail FALSE:["+email+"]");
        return false;   
    }
    else
    {
        //console.log("validarEmail TRUE:["+email+"]");
        return true;
    }
        
}

function crearModulo(nombre,link,parametros,vacio,texto) 
{
	let modulo = '';
	if(vacio == 1){
		modulo = ' <h4 class="poppins hover-color3 text-'+texto+'"><a style="color:white;" href="#">SIN PRODUCTO</a></h4>';
	}
	return modulo;

}











