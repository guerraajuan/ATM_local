<?php 
class dtUsuario{
  
	public static function getAppsByPerfil($perfilid)
    {
    	$SQLquery="call getAppsByPerfil('".$perfilid."')";
    	//return DBFactory::ExecuteSQL($SQLquery);
    }
    public static function validaUsuario($usuario,$password)
    {
    	$SQLquery="call validaUsuario('".$usuario."','".$password."')";
    	//return DBFactory::ExecuteSQLFirst($SQLquery);
    }
    public static function getApps()
    {
    	$SQLquery="call getApps()";
    	//return DBFactory::ExecuteSQL($SQLquery);
    }
    public static function editaRol($nombre,$descripcion,$perfilid)
    {
    	$SQLquery="call editaRol('".$nombre."','".$descripcion."',".$perfilid.")";
    	//return DBFactory::ExecuteSQLFirst($SQLquery);
    }
    public static function creaRol($nombre,$descripcion)
    {
    	$SQLquery="call creaRol('".$nombre."','".$descripcion."')";
    	//return DBFactory::ExecuteSQLFirst($SQLquery);
    }
    public static function creaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea)
    {
        $SQLquery="call creaUsuario('".$nombre."','".$email."','".$contraseña."','".$rol."','".$estatus."','".$telefono."','".$usuario_crea."')";        
        //return DBFactory::ExecuteNonQuery($SQLquery);
    }
    
    public static function editaUsuario($nombre,$email,$contraseña,$repeat_contraseña,$rol,$estatus,$telefono,$usuario_crea,$usuarioid)
    {
        $SQLquery="call editaUsuario('".$nombre."','".$email."','".$contraseña."','".$rol."','".$estatus."','".$telefono."','".$usuario_crea."','".$usuarioid."')";
        //return DBFactory::ExecuteNonQuery($SQLquery);
    }
    
   
}
?>