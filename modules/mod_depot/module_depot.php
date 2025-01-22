<?php
include_once 'modele_depot.php';
include_once 'vue_depot.php';
include_once 'ctrl_depot.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModDepot extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlDEPOT(new VueDEPOT(), new ModeleDEPOT());
    }
}

?>