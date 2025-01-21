<?php
include_once 'modele_DEPOT.php';
include_once 'vue_DEPOT.php';
include_once 'ctrl_DEPOT.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModDEPOT extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlDEPOT(new VueDEPOT(), new ModeleDEPOT());
    }
}

?>