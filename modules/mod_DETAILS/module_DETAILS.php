<?php
include_once 'modele_DETAILS.php';
include_once 'vue_DETAILS.php';
include_once 'ctrl_DETAILS.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModDETAILS extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlDETAILS(new VueDETAILS(), new ModeleDETAILS());
    }
}

?>