<?php
include_once 'modele_listProjet.php';
include_once 'vue_listProjet.php';
include_once 'ctrl_listProjet.php';
require_once "modules/mod_connexion/controleur_connexion.php";
//Connexion::connect();

class ModlisteProjets extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlListProjet(new VueListProjet(), new ModeleListProjet());
    }
}

?>