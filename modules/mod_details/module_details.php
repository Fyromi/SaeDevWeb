<?php
include_once 'modele_details.php';
include_once 'vue_details.php';
include_once 'ctrl_details.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModDetails extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlDETAILS(new VueDETAILS(), new ModeleDETAILS());
    }
}

?>