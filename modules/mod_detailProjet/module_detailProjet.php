<?php
include_once 'modele_detailProjet.php';
include_once 'vue_detailProjet.php';
include_once 'ctrl_detailProjet.php';
require_once "modules/mod_connexion/controleur_connexion.php";

class ModdetailProjet extends ModuleGenerique{
    public function __construct () {
		parent::__construct();
		$this->controleur = new CtrlDetailProjet(new VueDetailProjet(), new ModeleDetailProjet());
    }
}

?>