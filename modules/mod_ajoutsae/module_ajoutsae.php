<?php
require_once "modules/mod_ajoutsae/controleur_ajoutsae.php";

Class ModAjoutSae extends ModuleGenerique {
    public function __construct () {
		parent::__construct();
		$this->controleur = new ControleurAjoutSae();
	}
}