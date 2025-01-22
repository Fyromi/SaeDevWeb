<?php 
class Connexion {
	protected static $bdd;
	
	public static function init_connexion() {
		
		try {
			self::$bdd = new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201657', 'dutinfopw201657', 'qupevuna');
		} catch (PDOException $erreur) {
			echo "Erreur : " . $erreur->getMessage();
		}
	}

	public static function getBdd(){
		return self::$bdd;
	}



}