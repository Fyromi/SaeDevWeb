<?php 
class Connexion {
	protected static $bdd;
	
	public static function init_connexion() {
		self::$bdd = new PDO('mysql:host=localhost;dbname=sae', 'root', '');
	}

	public static function getBdd(){
		return self::$bdd;
	}



}
