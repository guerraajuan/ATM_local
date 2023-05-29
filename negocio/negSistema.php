<?php

class negSistema{
	
	
	public static function getAplicacionid($goModulo)
	{
		$ap =  dtSistema::getAplicacionid($goModulo);		
		return $ap[0]["aplicacionid"];
	}	
	public static function validaUsuario($usuario,$clave)
	{
		$_SESSION["IGT-usuarioid"] = '1';
		return "OK";
	}
	
	public static function saveNavegacion($nota="Navegacion normal",$tipo='navegacion',$aplicacionid=0)
	{
		self::saveBitacoraByOpoeracion("sistema_navegacion", "navegacionidWEB", session_id(), $_SESSION["IGT-usuarioid"], $tipo, $nota,$aplicacionid);
	}
	public static function saveBitacoraByOpoeracion($tbl,$id_name,$id,$usuario,$tipo,$detalle,$aplicacionid)
	{
		dtSistema::saveBitacoraByOpoeracion($tbl,$id_name,$id,$usuario,$tipo,$detalle,$aplicacionid);
	}
    public static function getDatosSistemaEmpresa()
    {
    	return dtSistema::getDatosSistemaEmpresa();
    	
    }
    
}
?>