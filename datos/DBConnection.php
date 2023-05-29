<?php

class DBConnection
{
	function Connect(){
		try {
				$mycnx =  new PDO('mysql:host=localhost;port=3306;dbname=catalogo_bd', 'root', 'root'); //MYSQL
				$mycnx->exec("set names utf8");
				return ($mycnx);
			} catch (PDOException $e) {
				print "¡Error!: " . $e->getMessage() . "<br/>";
				die();
			}
	}	
	
}

?>
