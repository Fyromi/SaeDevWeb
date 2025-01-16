<?php
require_once "modules/mod_CREATION/controleur_CREATION.php";

Class ModCREATION extends ModuleGenerique {
    public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurCREATION();
	}
}