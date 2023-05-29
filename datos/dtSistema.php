<?php 
class dtSistema{

	public static function getAplicacionid($goModulo)
	{
		$sql = "call getAplicacionid('".$goModulo."'); ";		
		return DBFactory::ExecuteSQLFirst($sql);
	}
	
	public static function validaUsuario($correo,$clave)
	{
		
		$sql="select mu.*
				from mae_usuario mu
				 where mu.mail='".$correo."'
				  and mu.clave_mae='".$clave."';";
		//echo $sql;
		//return DBFactory::ExecuteSQLFirst($sql);
	}	
	public static function saveBitacoraByOpoeracion($tbl,$id_name,$id,$usuario,$tipo,$detalle,$aplicacionid)
    {
    	$SQLquery="insert into ".$tbl."(".$id_name.", tipo_actividad, usuario_modifica, fecha_modificacion, detalle,aplicacionid)
        values('".$id."','".$tipo."','".$usuario."',now(),'".$detalle."',".$aplicacionid.") ";
    	
    	//DBFactory::ExecuteNonQuery($SQLquery);
    }
    
    public static function getDatosSistemaEmpresa()
    {
    	$sql = "call getDatosSistemaEmpresa();";
    	//return DBFactory::ExecuteSQLFirst($sql);
    	
    }
    
    
}


?>