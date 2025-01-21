<?php 
class Connexion {
	protected static $bdd;
	
	public static function init_connexion() {
		
		try {
			self::$bdd = new PDO('mysql:host=localhost;dbname=sae', 'root', '');
		} catch (PDOException $erreur) {
			echo "Erreur : " . $erreur->getMessage();
		}
	}

	public static function getBdd(){
		return self::$bdd;
	}



}