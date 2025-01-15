<?php 
class Connexion {
	protected static $bdd;
	
	public static function init_connexion() {
		self::$bdd = new PDO('mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201657', 'dutinfopw201657', 'qupevuna');
	}

	public static function getBdd(){
		return self::$bdd;
	}



}
