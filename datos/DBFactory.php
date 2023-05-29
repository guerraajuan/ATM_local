<?php
include ('DBConnection.php');

class DBFactory {
	
	
	public static function ExecuteSQL($SQLQuery)
	{
		
		$ConexionOBJ = new DBConnection;
		$Conexion=$ConexionOBJ->Connect();
		$salida = $Conexion->query($SQLQuery);
		$arr = array();
		foreach($salida as $fila) {
			
			$arr[] = $fila;
		}
		
		$Conexion=null;		
		return $arr;
	}
	
	public static function ExecuteSQLFirst($SQLQuery)
	{
		
		
		$ConexionOBJ = new DBConnection;
		$Conexion=$ConexionOBJ->Connect();
		$salida = $Conexion->query($SQLQuery);
		$arr = array();
		$cont=0;
		foreach($salida as $fila) {
			$cont++;
			if($cont == 1)
			{
				$arr[] = $fila;
			}
			
		}
		$Conexion=null;
		return ($arr);
	}
	
	public static function ExecuteNonQueryReturnId($SQLQuery,$table)
	{
		
		$ConexionOBJ = new DBConnection;
		$Conexion=$ConexionOBJ->Connect();
		$Conexion->query($SQLQuery);
		$salida = $Conexion->query("SELECT LAST_INSERT_ID() id FROM ".$table.";"); 
		$arr = array();
		
		foreach($salida as $fila) {
				$arr[] = $fila;
			
		}
		$Conexion=null;
		return $arr[0]["id"];
	}
	
	public static function ExecuteNonQuery($SQLQuery)
	{
		$ConexionOBJ = new DBConnection;
		$Conexion=$ConexionOBJ->Connect();
		$Conexion->query($SQLQuery);
		$Conexion=null;
	}
	
	
	
}


?>