<?php
require_once "modules/mod_creation/controleur_creation.php";

Class ModCreation extends ModuleGenerique {
    public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurCREATION();
	}
}