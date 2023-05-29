<?php
class negUsuario{
	
	public static function getAppsByPerfil($perfilid)
	{
		return  dtUsuario::getAppsByPerfil($perfilid);
	}
	// public static function validaUsuario($usuario,$password)
    // {
    // 	$usr = dtUsuario::validaUsuario($usuario,$password);
    // 	$salida = 'ERROR';
    // 	if(count($usr)>0)
    // 	{
    // 		$salida = 'OK';
    // 		$perfilObj  = dtUsuario::getAppsByPerfil($usr[0]["perfilid"]);
    // 		$FuncionObj = dtUsuario::getFuncionalidadesByUsuario($usr[0]["usuarioid"]);
    // 		$_SESSION["usuarioid"] = $usr[0]["usuarioid"];
    // 		$_SESSION["IGT-usuarioid"] = $usr[0]["usuarioid"];
    // 		$_SESSION["IGT-perfilid"] = $usr[0]["perfilid"];
    // 		$_SESSION["IGT-mail"] = $usr[0]["mail"];
    // 		$_SESSION["IGT-estado"] = $usr[0]["estado"];
    // 		$_SESSION["IGT-rut_usuario"] = $usr[0]["rut_usuario"];
    // 		$_SESSION["IGT-nombre"] = $usr[0]["nombre"];
    // 		$_SESSION["IGT-apellidos"] = $usr[0]["apellidos"];
    // 		$_SESSION["IGT-telefono"] = $usr[0]["telefono"];
	// 		$_SESSION["IGT-usuario_mae"] = $usr[0]["usuario_mae"];
    // 		$_SESSION["IGT-tipousuarioid"] = $usr[0]["tipousuarioid"];
	// 		$_SESSION["IGT-avatarid"] = $usr[0]["avatarid"];
    // 		$_SESSION["IGT-perfil_obj"] = $perfilObj;
    // 		$_SESSION["IGT-funcion_obj"] = $FuncionObj;
    		
    // 	}else
    // 	{
    // 		// session_unset();
    // 		// session_destroy();
    		
    // 	}
    // 	return $salida;
    // }
    public static function getApps()
    {
    	return  dtUsuario::getApps();
    }
    public static function creaRol($nombre,$descripcion,$apps)
    {
    	
    	$p = dtUsuario::creaRol($nombre,$descripcion);
    	
    	$perfilid = $p["0"]["perfilid"];
    	dtUsuario::limpiaApssCargo($perfilid);
    	if($apps != "")
    	{
    		
    		foreach ($apps as $a)
    		{
    			dtUsuario::addApssCargo($perfilid,$a);
    		}
    	}
    }
    public static function editaRol($nombre,$descripcion,$apps,$perfilid)
    {
    	
    	$p = dtUsuario::editaRol($nombre,$descripcion,$perfilid);
    	dtUsuario::limpiaApssCargo($perfilid);
    	if($apps != "")
    	{	
    		
    		foreach ($apps as $a)
    		{
    			dtUsuario::addApssCargo($perfilid,$a);
    		}
    	}
    }
    public static function creaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea)
    {    
        dtUsuario::creaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea);
        
    }
    
    public static function editaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea,$usuarioid,$apps)
    {
    	dtUsuario::editaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea,$usuarioid);
    	/*
		dtUsuario::limpiaFuncionalidadCargo($usuarioid);
    	if($apps != "")
    	{
    		
    		foreach ($apps as $a)
    		{
    			dtUsuario::addFuncionalidadCargo($usuarioid,$a);
    		}
    	}
		*/
    }
    
    public static function getRoles()
    {	
    	return dtUsuario::getRoles();
    }
    
    public static function getUsuarios()
    {
        return dtUsuario::getUsuarios();
    }
    public static function getUsuarioXid($usuarioid){
        return dtUsuario::getUsuarioXid($usuarioid);
    }
    public static function getrolXperfilid($perfilid){
    	return dtUsuario::getrolXperfilid($perfilid);
    }
    public static function getActividadUsuariosAll(){
    	return dtUsuario::getActividadUsuariosAll();
    }
    public static function getFuncionalidades()
    {
    	return  dtUsuario::getFuncionalidades();
    }
    public static function getFuncionalidadesByUsuario($usuarioid)
    {
    	return  dtUsuario::getFuncionalidadesByUsuario($usuarioid);
    }
    
}
?>
