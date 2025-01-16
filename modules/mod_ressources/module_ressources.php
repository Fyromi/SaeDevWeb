<?php
include_once 'modele_RESSOURCES.php';
include_once 'vue_RESSOURCES.php';
include_once 'ctrl_RESSOURCES.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModRESSOURCES extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlRESSOURCES(new VueRESSOURCES(), new ModeleRESSOURCES());
    }
}

?>