<?php
require_once "modules/mod_CONNEXION/controleur_CONNEXION.php";

class ModConnexion extends ModuleGenerique{



	public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurConnexion();
	}



}




