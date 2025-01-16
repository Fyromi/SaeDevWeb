<?php
include_once 'modele_PROJETS.php';
include_once 'vue_PROJETS.php';
include_once 'ctrl_PROJETS.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModPROJETS extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlPROJETS(new VuePROJETS(), new ModelePROJETS());
    }
}

?>