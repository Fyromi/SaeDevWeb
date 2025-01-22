<?php
include_once 'modele_ressources.php';
include_once 'vue_ressources.php';
include_once 'ctrl_ressources.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModRessources extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlRESSOURCES(new VueRESSOURCES(), new ModeleRESSOURCES());
    }
}

?>